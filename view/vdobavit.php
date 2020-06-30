<?php  include(dirname(__DIR__, 1).'/contoller/mdobavit.php'); ?> 
<h1>Добавить задачу</h1>

<div class="alert alert-primary" role="alert">
	<?php echo $resul; ?>
</div>

<form id="form1" class="form-horizontal" action="./?db" method="post">
	<div class="form-group">
		<div class="col-3">
			<label class="control-label" for="name">Пользователь: </label>
		</div>
		<div class="col-8">
			<input class="form-control control-lg" type="text" id="name" name="name" />
		</div>
	</div>


	<div class="form-group">
		<div class="col-3">
			<label class="control-label" for="email">email: </label>
		</div>
		<div class="col-8">
			<input class="form-control control-lg" type="text" id="emaill" name="email" />
		</div>
	</div>



	<div class="form-group">
		<div class="col-3">
			<label class="control-label" for="zadacha">Задача: </label>
		</div>
		<div class="col-8">
			<textarea class="form-control control-lg" id="textl" name="text" ></textarea>
		</div>
	</div>
	<div class="col-8">
		<input type="button" class="btn btn-primary btn-block" onclick="tek();" value="Сохранить" />
	</div>

</form>

<script>

$(document).ready(function() {
    $('#form1').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            email: {
                validators: {
                    emailAddress: {
                        message: 'неправильный адрес электронной почты'
                    }
                }
            }
        }
    });
});


function tek()
{
	
var name=document.getElementById('name').value;
var email=document.getElementById('emaill').value;	
var text=document.getElementById('textl').value;	
if((name.length==0)||(email.length==0)||(text.length==0))
{
 alert("Ошибка!!!      Заполните все поля!");	
}else
{
	document.getElementById('form1').submit();
}
}










</script>