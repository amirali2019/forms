<?php
require("shared/nav.php");
require("connection.php");
$form_id=$_GET['id'];
function answers($options){
    $rr='';
    foreach ($options as $option){
        $rr.='<h6 class="card-text">'.$option.'</h6>';
    }
    return $rr;
}
$query="SELECT DISTINCT user_id FROM answers WHERE form_id='".$form_id."'";
$users=mysqli_query($con,$query);
?>
<div class="row m-2">
<?php while ($result=mysqli_fetch_assoc($users)) {
    $query="SELECT answers.answers,questions.text from questions
            INNER JOIN answers
            ON questions.id=answers.question_id
            WHERE answers.user_id='".$result['user_id']."' and answers.form_id='".$form_id."'";
    $responses=mysqli_query($con,$query);
   echo '<div class="col-lg-6 offset-lg-3 col-sm-12 mt-2">
            <div class="card card-body">';
   while($res=mysqli_fetch_assoc($responses)){
       echo '<h5 class="card-title"><strong>'.$res['text'].'</strong></h5>';
       $ans=gettype(json_decode($res['answers']))=='array'?answers(json_decode($res['answers'])):'<h6 class="card-text">'.$res['answers'].'</h6>';
       echo $ans;
   }

   echo      '</div>
        </div>';
}?>
</div>

