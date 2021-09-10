<?php 
     //connect to db
     $conn = mysqli_connect('localhost','Lahiru','pethum013','burger');

     //check conn
     if(!$conn){
         echo 'Connection error: '.mysqli_connect_error();
     }
?>