package br.edu.ifpr.foz.todo_list.services;

import java.util.ArrayList;
import java.util.List;

import br.edu.ifpr.foz.todo_list.exceptions.TaskException;
import br.edu.ifpr.foz.todo_list.models.Task;

public class TaskService {
    
    public static List<Task> tasks = new ArrayList<>();


    public Task criarTask(Task task){
        try {
            task.setId(definirId());
            
        } catch (Exception e) {
            throw new TaskException("Erro ao definir Id");
        }

        try {
            tasks.add(task);
        } catch (Exception e) {
            throw new TaskException("Erro ao adicionar nova task");
        }

        return task;

    }

    public Long definirId(){
        int tamanho = tasks.size();
        if(tamanho == 0){
            return 1L;
        }
        return tasks.get(tamanho-1).getId()+1;
    }

    public List<Task> listarTasks(){
        return tasks;
    }


}
