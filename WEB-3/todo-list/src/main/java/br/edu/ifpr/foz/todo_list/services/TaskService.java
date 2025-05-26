package br.edu.ifpr.foz.todo_list.services;

import java.util.ArrayList;
import java.util.List;
import java.util.Optional;

import br.edu.ifpr.foz.todo_list.exceptions.TaskException;
import br.edu.ifpr.foz.todo_list.models.Status;
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
            task.setStatus(Status.EM_ANDAMENTO);
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

    public Optional<Task> buscarPorId(Long id) {
        return tasks.stream()
                    .filter(task -> task.getId().equals(id))
                    .findFirst();
    }

    public boolean excluir(Optional<Task> taskOptional) {
        try {
            if (taskOptional.isPresent()) {
                return tasks.remove(taskOptional.get());
            }
            return false;
        } catch (Exception e) {
            throw new TaskException("Erro ao excluir task");
        }
    }


    public int buscarIndex(Optional<Task> task){
        int i = 0;
        try {
            if(task.isPresent()){
                for (Task t : tasks) {
                    if(t.equals(task.get())){
                        break;
                    }
                    i++;
                }
            }
            
        } catch (Exception e) {
            throw new TaskException("Erro ao buscar index de task");
        }

        return i;
    }

    public boolean editar(Task task){
        
        try {
            tasks.set(buscarIndex(buscarPorId(task.getId())), task);
            return true;
        } catch (Exception e) {
            throw new TaskException("Erro ao editar a task");
        }
    }

    public Status mapearStatus(String statusText){
            if(statusText.toUpperCase().replace(' ', '_').equals(Status.EM_ANDAMENTO.name())){
                return Status.EM_ANDAMENTO;
            }else if(statusText.toUpperCase().replace(' ', '_').equals(Status.CONCLUIDA.name())){
                return Status.CONCLUIDA;
            }else{
                return Status.CANCELADA;
            }
    }


}
