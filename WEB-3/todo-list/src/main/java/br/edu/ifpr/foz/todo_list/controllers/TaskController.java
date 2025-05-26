package br.edu.ifpr.foz.todo_list.controllers;

import java.io.IOException;
import java.time.LocalDate;
import java.util.Optional;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.validation.BindingResult;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.servlet.mvc.support.RedirectAttributes;

import br.edu.ifpr.foz.todo_list.models.Task;
import br.edu.ifpr.foz.todo_list.services.TaskService;
import jakarta.validation.Valid;

@Controller
@RequestMapping("/tasks")
public class TaskController {

    TaskService taskService = new TaskService();

    public TaskController() {
        Task t1 = new Task("Task1", "Desc T1", LocalDate.now());
        Task t2 = new Task("Task2", "Desc T2", LocalDate.now());
        Task t3 = new Task("Task3", "Desc T3", LocalDate.now());

        taskService.criarTask(t1);
        taskService.criarTask(t2);
        taskService.criarTask(t3);
    }

    @GetMapping({ "", "/", "/tasks" })
    public String listTask(Model model) {
        model.addAttribute("tasks", taskService.listarTasks());

        return "task-list";
    }

    @GetMapping("/create")
    public String createTask(Model model) {
        model.addAttribute("task", new Task());
        return "task-create";
    }

    @PostMapping("/create")
    public String createTaskValidator(@Valid Task task, BindingResult fields, Model model,
            RedirectAttributes redirectAttributes) throws IOException {

        if (fields.hasErrors()) {
            model.addAttribute("task", task);
            return "task-create";
        }

        taskService.criarTask(task);

        redirectAttributes.addFlashAttribute("task", task);

        return "sucesso";
    }

    @GetMapping("/delete/{id}")
    public String excluirTask(@PathVariable Long id) {

        Optional<Task> task = taskService.buscarPorId(id);

        taskService.excluir(task);

        return "redirect:/tasks";
    }

    @GetMapping("/edit/{id}")
    public String editarTask(@PathVariable Long id, Model model) {
        Optional<Task> optionalTask = taskService.buscarPorId(id);
    
        if (optionalTask.isPresent()) {
            Task task = optionalTask.get();
            model.addAttribute("task", task);
            return "task-create";
        } else {
            return "redirect:/tasks"; 
        }
    }

    @PostMapping("/edit/{id}")
    public String salvarEdicao(@PathVariable Long id, @Valid Task task, BindingResult fields, Model model, RedirectAttributes redirectAttributes) {
    
        if (fields.hasErrors()) {
            model.addAttribute("task", task);
            return "task-create";
        }
    
        taskService.editar(task);
    
        redirectAttributes.addFlashAttribute("mensagem", "Tarefa atualizada com sucesso!");
        return "redirect:/tasks";
    }

    @GetMapping("/description/{id}")
    public String exibirTask(@PathVariable Long id, Model model){
        Optional<Task> optionalTask = taskService.buscarPorId(id);
    
        if (optionalTask.isPresent()) {
            Task task = optionalTask.get();
            model.addAttribute("task", task);
            return "task-description";
        } else {
            return "redirect:/tasks"; 
        }

    }

}
