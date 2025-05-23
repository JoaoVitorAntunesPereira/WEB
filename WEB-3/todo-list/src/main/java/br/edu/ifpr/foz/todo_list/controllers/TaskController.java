package br.edu.ifpr.foz.todo_list.controllers;

import java.io.IOException;
import java.time.LocalDate;
import java.util.ArrayList;
import java.util.List;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.validation.BindingResult;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.servlet.mvc.support.RedirectAttributes;

import br.edu.ifpr.foz.todo_list.models.Task;
import jakarta.validation.Valid;

@Controller
@RequestMapping("/tasks")
public class TaskController {
    private List<Task> tasks = new ArrayList<>();


    public TaskController(){
        Task t1 = new Task(1L, "Task1", "Desc T1", LocalDate.now());
        Task t2 = new Task(2L, "Task2", "Desc T2", LocalDate.now());
        Task t3 = new Task(3L, "Task3", "Desc T3", LocalDate.now());

        tasks.add(t1);
        tasks.add(t2);
        tasks.add(t3);
    }

    @GetMapping({"", "/", "/tasks"})
    public String listTask(Model model){
        model.addAttribute("tasks", tasks);
        
        return "task-list";
    }

    @GetMapping("/create")
    public String createTask(Model model) {
        model.addAttribute("task", new Task());
        return "task-create";
    }
    
    @PostMapping("/create")
    public String createTaskValidator(@Valid Task task, BindingResult fields, Model model, RedirectAttributes redirectAttributes) throws IOException {
        
        if (fields.hasErrors()) {
            model.addAttribute("task", task);
            return "task-create";
        }

        
        redirectAttributes.addFlashAttribute("task", task);

        return "sucesso";
    }
}
