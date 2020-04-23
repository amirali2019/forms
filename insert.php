<?php
require("connection.php");

mysqli_error($con);
    $title=$_POST["title"];
    $desc=$_POST["description"];
    $questions=$_POST["questions"];
    $query="INSERT INTO forms(title,description,user_id) values('$title','$desc','0')";
    mysqli_query($con,$query);
    $form_id=mysqli_insert_id($con);
    foreach ($questions as $question){
        $options=isset($question['options'])?json_encode($question['options']):"";
        $type=$question["type"];
        $text=$question['text'];
        $query="INSERT INTO questions(text,form_id,type_id,options) values('$text','$form_id','$type','$options')";
        mysqli_query($con,$query);
    }

?>