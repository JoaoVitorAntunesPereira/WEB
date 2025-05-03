package br.edu.ifpr.foz.to_do_list.controllers;

import java.lang.reflect.Array;
import java.time.LocalDate;
import java.util.ArrayList;
import java.util.Arrays;
import java.util.List;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;

import br.edu.ifpr.foz.to_do_list.models.Task;

import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.ModelAttribute;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestBody;


@Controller
@RequestMapping
public class TaskController {

   private List<Task> tasks = new ArrayList<>();

   @GetMapping({ "", "/", "/tasks"})
   public String listTask(Model model) {

      model.addAttribute("tasks", tasks);

      return "task-list";
   }

   @GetMapping("/create")
   public String createTask(){
       
       
      return "task-create";
   }
   
   @PostMapping("/savetask")
   public String saveTask(Task task){

      task.setId(Long.valueOf(tasks.size()+1));

      tasks.add(task);

      return "redirect:/tasks";
   }

   @GetMapping("/edit/{id}")
   public String edit(@PathVariable Long id, Model model){
   
      //boolean encontrado = Arrays.stream(tasks.ge).anyMatch(task.getId -> task.getId == id)

         for (Task task : tasks) {
            if(task.getId() == id){
               model.addAttribute("task", task);
               
               return "task-edit";
            }
         }

      return "redirect:/tasks";
   }


}
