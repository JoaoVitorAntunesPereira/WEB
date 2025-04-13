package br.edu.ifpr.foz.aula_3.models;

import java.time.LocalDateTime;

public class Task {
    
    private Long id;
    private String name;
    private LocalDateTime dateTime;
    
    public Task() {
    
    }
    public Task(Long id, String name, LocalDateTime dateTime) {
        this.id = id;
        this.name = name;
        this.dateTime = dateTime;
    }

    public Long getId() {
        return id;
    }
    public void setId(Long id) {
        this.id = id;
    }
    public String getName() {
        return name;
    }
    public void setName(String name) {
        this.name = name;
    }
    public LocalDateTime getDateTime() {
        return dateTime;
    }
    public void setDateTime(LocalDateTime dateTime) {
        this.dateTime = dateTime;
    }
    

    

}
