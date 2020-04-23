<?php
require("shared/nav.php");
require("connection.php");

function checks($id,$options)
{
    $checks='';
    foreach ($options as $option) {
        $checks.='<div class="form-check form-check-inline">
                  <input type="checkbox" class="form-check-input" value="'.$option.'" name="'.$id.'[]">
                  <label class="form-check-label">'.$option.'</label>
                </div>';
    }
    return $checks;
}
function radios($id,$options)
{
    $radios='';
    foreach ($options as $option) {
        $radios.='<div class="form-check form-check-inline">
                  <input type="radio" class="form-check-input" value="'.$option.'" name="'.$id.'">
                  <label class="form-check-label">'.$option.'</label>
                </div>';
    }
    return $radios;
}

function select($options)
{
    $menu='';
    foreach ($options as $option) {
        $menu.='<option value="'.$option.'">'.$option.'</option>';
    }
    return $menu;
}


$id=$_GET["form_id"];
$form_query="SELECT * FROM forms WHERE id='$id'";
$query="SELECT * FROM questions WHERE form_id='$id'";
$res_forms=mysqli_query($con,$form_query);
$res=mysqli_query($con,$query); ?>

<div class="col-lg-6 offset-lg-3 col-sm-12 mt-2">
<div class="card">
    <div class="card-title">
        <div class="bg-primary" style="height: 10px;width: 100%"></div>
    </div>
    <?php while ($row=mysqli_fetch_assoc($res_forms)){?>
        <div class="card-body">
        <p style="font-size: 30px;"><?php echo $row["title"];?></p>
        <p style="font-size: 15px;color: #999"><?php echo $row["description"];?></p>
    </div>
    <?php }?>
</div>
</div>

<form id="response"  action="response.php" method="post">
    <input type="hidden" value="<?php echo $id ?>" name="form_id" />
    <input type="hidden" value="5" name="user_id" />
    <?php
while($row=mysqli_fetch_assoc($res)) {
    $textField='<div class="md-form">
                              <input type="text" name="'.$row['id'].'" class="form-control">
                              <label >Your Answer</label>
                            </div>';

    echo '<div class="col-lg-6 offset-lg-3 col-sm-12 mt-2">
    <div class="card">
        <div class="card-body">
        <h4 class="card-title">'.$row["text"].'</h4>';
    if($row['type_id']==1) {
        echo $textField;
    }elseif ($row["type_id"]==2){
        echo checks($row['id'],json_decode($row['options']));
    }elseif ($row["type_id"]==3){
        echo radios($row['id'],json_decode($row['options']));
    }elseif ($row["type_id"]==4){
        $dropdown='<select name="'.$row["id"].'" class="custom-select">'.
                 select(json_decode($row['options']))
            .'</select>';
        echo $dropdown;
    }

     echo '</div>
    </div>
</div>';

}?>
<div class="col-lg-6 offset-lg-3 col-sm-12 mt-2">
    <div class="card card-body">
        <button type="submit" class="btn btn-primary">Submit Response</button>
    </div>
</div>
</form>



<?php
require("shared/footer.php");
?>
<!--<script>-->
<!--    $(document).ready(function () {-->
<!---->
<!--        $("#response").submit(function (e) {-->
<!--            e.preventDefault();-->
<!--            var data=$(this).serializeArray();-->
<!--            let value=[];-->
<!--            var options=[];-->
<!--            data.forEach((item)=>{-->
<!--                options.push()-->
<!--            });-->
<!--        });-->
<!---->
<!--    });-->
<!--</script>-->

</body>

</html>
