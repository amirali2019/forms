<?php
require("connection.php");
if(isset($_POST)){
    $form_id=$_POST["form_id"];
    $user_id=$_POST["user_id"];
     foreach ($_POST as $id=>$value){
         if($id=="form_id" || $id=="user_id"){
             continue;
         }
         $value=gettype($value)==="array"?json_encode($value):$value;
         $query="INSERT INTO answers(question_id,answers,form_id,user_id) VALUES('$id','$value','$form_id','$user_id')";
         mysqli_query($con,$query);
     }
     echo "Created Successfully";

}
?>