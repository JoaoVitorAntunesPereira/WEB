package com.example.camada_persistencia_aula.connection;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;

import com.example.camada_persistencia_aula.exceptions.DatabaseException;

public class ConnectionFactory {
   
    public static Connection connection = null;
    
    public static Connection getConnection(){
        
        String url = "jdbc:mysql://localhost/ifpr_store";
        String user = "root";
        String pass = "admin";

        try {
        
            if (connection == null || connection.isClosed()) {
                connection = DriverManager.getConnection(url, user, pass);
            } 

            return connection;
        
        } catch (SQLException e) {
            throw new RuntimeException(e);
        }

    }

    public static void closeStatament(Statement statement){

        try {
            statement.close();
        } catch (SQLException e) {
            throw new DatabaseException("Problemas ao fechar Statement");
        }
    }

    public static void closeSResultSet(ResultSet resultSet){

        try {
            if (resultSet != null) {
                resultSet.close();
            }
        } catch (SQLException e) {
            throw new DatabaseException("Problemas ao fechar ResultSet");
        }
    }



}
