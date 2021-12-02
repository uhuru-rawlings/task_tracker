<?php
  $connection = mysqli_connect("127.0.0.1","root","","todoitems");
  if($connection){
     if(isset($_POST['submit'])){
         $todoitem = mysqli_real_escape_string($connection,$_POST['todoitem']);
         $postid = "TD_".rand(0,100000);
         $statuses = "Pending";
         $sql = "SELECT * FROM addeditems WHERE todoitem='{$todoitem}'";
         $execute = mysqli_query($connection, $sql);
         if($rows = mysqli_num_rows($execute) < 1){
            $sql = "INSERT INTO addeditems(itemid,todoitem,statuses)
                VALUES('$postid','$todoitem','$statuses')";
            $query = mysqli_query($connection, $sql);
            if($query){
                echo("Added,<a href='http://127.0.0.1:8000/Projectidears/'>Go Back</a>");
            }else{
                echo("Error adding $todoitem,<a href='http://127.0.0.1:8000/Projectidears/'>Go Back</a>");
            }
         }else{
             echo("$todoitem already exist,<a href='http://127.0.0.1:8000/Projectidears/'>Go Back</a>");
         }
     }
  }else{
      echo("<script>alert('cannot connect to the server')</script>");
  }
?>