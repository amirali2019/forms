<?php
require("shared/nav.php");
?>

<!-- Modal -->
<div class="modal fade" id="msgModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Success</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h4>Form Created Successfully</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<form id="form">

<div class="col-6 offset-3 p-3">
    <div id="alert">

    </div>
	<div class="card">
		<div class="card-title">
			<div class="bg-primary" style="height: 10px;width: 100%"></div>
		</div>
	<div class="card-body">
		<div class="card-title">
			<div class="md-form">
				<input type="text" name="form_title" value="Untitled Form" class="form-control" style="font-size: 30px;">
			</div>
		</div>
		<div class="card-text">
			<div class="md-form">
				<input type="text" class="form-control" name="form_description" value="Form Description" style="font-size: 15px;color: #999" />
			</div>
		</div>
		<button type="submit" class="btn btn-primary" id="create">Create Form</button>
        <button type="button" class="btn btn-info" id="add_question">Add Question</button>
	</div>
	</div>
</div>

<div class="col-6 offset-3 p-3" id="questions">


</div>

</form>

<?php
require("shared/footer.php");
?>
<script>

    function addQuestion(id){
        <?php
        require("connection.php");
        $query="SELECT * from types";
        $res=mysqli_query($con,$query);
        ?>
        var card='<div class="card mt-3" id='+`card${id}`+'>\n' +
            '\t<div class="card-title">\n' +
            '\t\t<div class="bg-primary" style="height: 10px;width: 100%"></div>\n' +
            '\t</div>\n' +
            '\n' +
            '\t<div class="card-body">\n' +
            '<a class="btn-floating btn-sm btn-info remove" data-id="'+id+'"><i class="fas fa-trash text-white"></i></a>'+
            '\t\t<div class="row">\n' +
            '\t\t\t\n' +
            '\t\t\t\t<div class="col-12">\n' +
            '\t\t\t\t\t<div class="md-form">\n' +
            '\t\t\t\t\t\t<label for="name">Enter Question</label>\n' +
            '\t\t\t\t\t\t<input id="name" type="text" name='+`q${id}`+' class="form-control" />\n' +
            '\t\t\t\t\t</div>\n' +
            '\t\t\t\t</div>\n' +
            '\t\t\t\t<div class="col-12">\n' +
            '\t\t\t\t\t<select class="form-control" name="type'+id+'" id="'+id+'">\n' +
            '\t\t\t\t\t  <option value="" disabled selected>Select Question Type</option>\n' +
            '\t\t\t\t\t<?php while ($row=mysqli_fetch_array($res)){$type=ucwords($row[1]);echo "<option value=$row[0]>$type</option>";} ?>\n'+
            '\t\t\t\t\t</select>\n' +
            '\t\t\t\t\t<div class="col-12">\n'+
                '<form id="form'+id+'"> \n'+
                '</form>'+
            '\t\t\t\t\t</div> \n'+
            '\t\t\t\t</div>\n' +
            '\t\t\t\n' +
            '\t\t</div>\n' +
            '\t</div>\n' +
            '\n' +
            '</div>';
        return card;
    }
    //





    $(document).ready(function(){
        var id=0;
        var opt_id=1;
        $("#questions").append(addQuestion(id++));


        $("#add_question").click(function () {
            $("#questions").append(addQuestion(id++));
        });


        function addInput(id,type){
            var form;
            if (type==2){
                form=
                    '                <div class="md-form input-group mb-0">\n' +
                    '                    <div class="input-group-prepend">\n' +
                    '                        <div class="input-group-text md-addon">\n' +
                    '                            <input class="form-check-input disabled" type="checkbox" >\n' +
                    '                            <label class="form-check-label">\n' +
                    '                        </div>\n' +
                    '                    </div>\n' +
                    '                    <input type="text" name='+`op${opt_id}`+' class="form-control" aria-label="Text input with radio button">\n' +
                    '                </div>\n';
            }

            else if (type==3){
                form=
                    '                <div class="md-form input-group mb-0">\n' +
                    '                    <div class="input-group-prepend">\n' +
                    '                        <div class="input-group-text md-addon">\n' +
                    '                            <input class="form-check-input disabled" type="radio">\n' +
                    '                            <label class="form-check-label" >\n' +
                    '                        </div>\n' +
                    '                    </div>\n' +
                    '                    <input type="text" name='+`op${opt_id}`+' class="form-control" aria-label="Text input with radio button">\n' +
                    '                </div>\n';
            }

            if (type==4){
                form=
                    '                <div class="md-form mb-0">\n' +
                    '                  <input type="text" name='+`op${opt_id}`+' class="form-control" aria-label="Text input with radio button">\n' +
                    '                </div>\n';
            }

            $(`#form${id}`).prepend(form);

        }



        $(document).on("change","select",function () {
            var id=$(this).attr("id");
            var value=$(`#${id}`).val();
            $(`#form${id}`).empty();
            var form;
            if(parseInt(value)==2){
                form=
                '                <div class="md-form input-group mb-0">\n' +
                '                    <div class="input-group-prepend">\n' +
                '                        <div class="input-group-text md-addon">\n' +
                '                            <input class="form-check-input disabled" type="checkbox" value="option">\n' +
                '                            <label class="form-check-label" for="exampleRadios111">\n' +
                '                        </div>\n' +
                '                    </div>\n' +
                '                    <input type="text" name='+`op0`+' class="form-control" aria-label="Text input with radio button">\n' +
                '                </div>\n' +
                '<br/> <button type="button" class="btn btn-danger add" id="'+id+'" data-type="'+value+'">Add+</button>\n';

            }else if(parseInt(value)==3){

                form=
                    '                <div class="md-form input-group mb-0">\n' +
                    '                    <div class="input-group-prepend">\n' +
                    '                        <div class="input-group-text md-addon">\n' +
                    '                            <input class="form-check-input disabled" type="radio" value="option">\n' +
                    '                            <label class="form-check-label">\n' +
                    '                        </div>\n' +
                    '                    </div>\n' +
                    '                    <input type="text" name='+`op0`+' class="form-control" aria-label="Text input with radio button">\n' +
                    '                </div>\n' +
                    '<br/> <button type="button" class="btn btn-danger add" id="'+id+'" data-type="'+value+'">Add+</button>\n';

            }else if(parseInt(value)==4){

                form=
                    '                <div class="md-form  mb-0">\n' +
                    '                    <input type="text" name='+`op0`+' class="form-control" aria-label="Text input with radio button">\n' +
                    '                </div>\n' +
                    '<br/> <button type="button" class="btn btn-danger add" id="'+id+'" data-type="'+value+'">Add+</button>\n';

            }
            $(`#form${id}`).append(form);
        });


        $(document).on('click','.add',function () {
            addInput($(this).attr("id"),$(this).attr("data-type"));
        });

        $(document).on('click','.remove',function () {
            let id=$(this).attr("data-id");
            $(`#card${id}`).remove();
        });


        $("#form").submit(function (e) {
            e.preventDefault();
           var data=$("#form").serializeArray();
           let index=0;
           var value=[];
           data.forEach(function (item) {
               if(item.name==`q${index}`){
                   var options=[];
                   $(`#form${index}`).serializeArray()?$(`#form${index}`).serializeArray().forEach((item)=>{
                       options.push(item.value);
                   }):"";
                   value.push({text:item.value,type:$(`[name=type${index}]`).val(),options:options});
                   index++;
               }
           });
           $.ajax({
               url:'insert.php',
               type: "POST",
               data:{title:data[0].value,description:data[1].value,questions:value},
               success:function (data) {
                   $("#msgModal").modal('show');
               },
               error:function (err) {
                    //console.log(err);
               }
           });
        });

        $("#msgModal").on('hidden.bs.modal', function(){
           window.location.reload();
        });

    });
</script>


</body>

</html>
