<?php
session_start();
        if(isset($_POST['Username'],$_POST['Password'])){
				//connection
                  include("connection.php");
				//รับค่า user & password
                  $Username = $_POST['Username'];
                  $Password = $_POST['Password'];
				//query 
                  $sql="SELECT * FROM login Where Username='".$Username."' and Password='".$Password."' ";
 
                  $result = mysqli_query($con,$sql);
                  
                  Header("Location: newtable.php");
 
        }else{
 
 
             Header("Location: index.php"); //user & password incorrect back to login again
 
        }
?>
