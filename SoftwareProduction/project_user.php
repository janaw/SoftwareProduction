﻿<?php

/*
 *  Created on : 01-Apr-2015, 17:34:00
    Author     : Jana Willmann 14075531
    Description:
        - insert the users to the user_project datatable
*/
include('db_connect.php');
session_start();
//echo "ID: ";
//print_r($_SESSION['currentProjetcID']);
$cur_ID_proj = $_SESSION['currentProjetcID'];

//$cur_ID_proj = 1;

$persons = $_POST["persons"]; 
$role_for_person = $_POST["role_for_person"]; 

if(isset($_POST))
{
    foreach($_POST as $inputName => $inputValue)
    {
        //get the role
        if($inputValue != "None"){
            //Found a user that has a role get the ID
            $user_id = $inputName;
            $role = '';
            if($inputValue="Manager"){
                $role = "project manager";
            }
            else if ($inputValue="Developer") { 
                $role = "developer";
            }
            else if($inputValue="Tester"){
                $role = "tester";
            }
            
            //insert to database
            $query = "INSERT INTO user_project(";
            $query .= "userId, projectId, role";
            $query .= ") VALUES (";
            $query .= " '$user_id', '$cur_ID_proj', '$role'";
            $query .= ")";

            
            $result = mysqli_query($connection, $query);
        }
    
    }
    header("Location: main.php" ); 
    
}