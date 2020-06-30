<?php  include(dirname(__DIR__, 1).'/contoller/mvoiti.php'); ?>

<div class="alert alert-primary" role="alert">
	<?php echo $aderr; ?>
</div>
<?php if(!isset($_SESSION['admin'])){ ?>
<form id="form2" class="form-horizontal" action="./?vv" method="post">
	<div class="form-group">
		<div class="col-3">
			<label class="control-label" for="adname">Пользователь: </label>
		</div>
		<div class="col-8">
			<input class="form-control control-lg" type="text" id="adname" name="adname" />
		</div>
	</div>


	<div class="form-group">
		<div class="col-3">
			<label class="control-label" for="adpass">Пароль: </label>
		</div>
		<div class="col-8">
			<input class="form-control control-lg" type="password" id="adpass" name="adpass" />
		</div>
	</div>

	<div class="col-8">
		<input type="button" class="btn btn-primary btn-block" onclick="voity();" value="Войти" />
	</div>

</form>

<script>
function voity()
{
var name=document.getElementById('adname').value;
var pass=document.getElementById('adpass').value;	
if((name.length==0)||(pass.length==0))
{
 alert("Ошибка!!!      Заполните все поля!");	
}else
{
	document.getElementById('form2').submit();
}
	
	
}

</script>
<!--
<br>
<div class="col-8">
<input type="submit" class="btn btn-secondary btn-block" value="Регистрация" />
</div>
-->
<?php } ?>


<?php if(isset($_SESSION['admin'])){ ?>








<h1>Список задач</h1>

<div class="row">
	<div class="col-1">
страница:
	</div>
	<div class="col-4">
		<nav aria-label="навигация">
			<ul class="pagination">
				<?php if(((int)$pg-1)>0){ ?>
				<li class="page-item">
					<a class="page-link" href="./?sp&page=<?php echo (int)$pg-1; ?>" aria-label="Previous">
						<span aria-hidden="true">&laquo;</span>
						<span class="sr-only">Previous</span>
					</a>
				</li>
				<?php }?>
				<li class="page-item">
					<a class="page-link" href="./?sp&page=1">1</a>
				</li>


				<?php if($spisok_c>1){ ?>
				<li class="page-item">.....</li>
				<?php //for($i=1;$i<=$spisok_c;$i++){ ?>
				<li class="page-item">
					<a class="page-link" href="#">
						<?php echo $pg; ?>
					</a>
				</li>
				<?php //} ?>
				<li class="page-item">.....</li>
				<li class="page-item">
					<a class="page-link" href="./?sp&page=<?php echo $spisok_c; ?>">
						<?php echo $spisok_c; ?>
					</a>
				</li>

				<?php } ?>

				<?php if($spisok_c>((int)$pg)){ ?>
				<li class="page-item">
					<a class="page-link" href="./?sp&page=<?php echo ((int)$pg)+1 ?>" aria-label="Next">
						<span aria-hidden="true">&raquo;</span>
						<span class="sr-only">Next</span>
					</a>
				</li>
				<?php } ?>
			</ul>
		</nav>
	</div>

	<div class="col-4">

		<div class="dropdown">
			<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Сортировать:
			</button>
			<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
				<a class="dropdown-item" href="./?sp&sort=0&page=<?php echo $pg ?>">по имени</a>
				<a class="dropdown-item" href="./?sp&sort=1&page=<?php echo $pg ?>">по e-mail адресу</a>
				<a class="dropdown-item" href="./?sp&sort=2&page=<?php echo $pg ?>">по статусу</a>
				<a class="dropdown-item" href="./?sp&sort=3&page=<?php echo $pg ?>">по имени по убыванию</a>
				<a class="dropdown-item" href="./?sp&sort=4&page=<?php echo $pg ?>">по e-mail адресу по убыванию</a>
				<a class="dropdown-item" href="./?sp&sort=5&page=<?php echo $pg ?>">по статусу по убыванию</a>
			</div>
		</div>

	</div> 

</div>


<?php foreach($spisok as $sp){ ?>
<hr>
	<div class="row">
		<div class="col-12">

			<div class="row">

				<div class="col-3">
					<div class="row">
						<div class="col-4">
Пользователь: 
						</div>
						<div class="col-8">
							<?php echo $sp[1]; ?>
						</div>
					</div>
				</div>

				<div class="col-3">
					<div class="row">
						<div class="col-4">
e-mail: 
						</div>
						<div class="col-8">
							<?php echo $sp[2]; ?>
						</div>
					</div>
				</div>

				<div class="col-3">
					<div class="row">
						<div class="col-2">
статус: 
						</div>
						<div class="col-6">

							<div class="form-check form-check-inline">
								<?php if($sp[4]=='0'){ ?>
								<input class="form-check-input" type="checkbox" name="setch" id="setch<?php echo $sp[0]; ?>"  onclick="setstat(<?php echo $sp[0]; ?>);" value="<?php echo $sp[0]; ?>">
									<label class="form-check-label" id="setchl<?php echo $sp[0]; ?>" >еще не выполнено</label>
									<?php } ?> 
									<?php if($sp[4]=='1'){ ?>
									<input class="form-check-input" type="checkbox" name="setch" checked id="setch<?php echo $sp[0]; ?>" onclick="setstat(<?php echo $sp[0]; ?>);" value="<?php echo $sp[0]; ?>">
										<label class="form-check-label" id="setchl<?php echo $sp[0]; ?>" >выполнено</label>
										<?php } ?> 
									</div>
								</div>
								<div class="col-4" id="red<?php echo $sp[0]; ?>">
									<?php if($sp[5]==1){ ?>
отредактировано администратором
									<?php } ?>
								</div>

							</div>
						</div>
						<div class="col-3">
							<button class="btn btn-primary btn-block" onclick="edid(<?php echo $sp[0]; ?>);" id="b<?php echo $sp[0]; ?>" str="r" >Редактировать</button>
						</div>
					</div>


					<hr>
						<div class="row">
							<div class="col-12">
Задача: 
							</div>
							<div class="col-12 mytextarea" id="ta<?php echo $sp[0]; ?>">
								<?php echo $sp[3]; ?>
							</div>

						</div>

					</div>
				</div>
				<hr>
					<?php } ?>





					<script>

 function setstat(id)
 {
	 ch=document.getElementById("setch"+id);
	 chl=document.getElementById("setchl"+id);
	if(ch.checked==true)
	{
		chl.innerHTML='выполнено';		
	}
	else
	{
		chl.innerHTML='еще не выполнено';		
	}

    var form_data = new FormData();
    form_data.append('setch', id);
    $.ajax({
                url: './?vv',
                dataType: 'text',
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function(data){

                }
     });

 }


function edid(id)
{
	 bb=document.getElementById("b"+id);
	 ta=document.getElementById("ta"+id);
	 if(bb.getAttribute("str")=='r')
	 {
		bb.setAttribute("str", "s");
		bb.innerHTML="Сохранить";
		ta.setAttribute("contenteditable", "true");
	 }else
	 if(bb.getAttribute("str")=='s')
	 {
		bb.setAttribute("str", "r");
		bb.innerHTML="Редактировать";
		document.getElementById("red"+id).innerHTML="отредактировано администратором";
		ta.setAttribute("contenteditable", "false");

	text=ta.innerHTML;

    var form_data = new FormData();
    form_data.append('setid', id);
	form_data.append('settext', text);
    $.ajax({
                url: './?vv',
                dataType: 'text',
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function(data){
					if(data){
						str = '<input type="hidden" id="res" value="ok"/>';
						k=data.search(str);
						if(k>0){
						alert("Сохранено!");
						}else{
							document.getElementById("adminl").remove();
							document.getElementById("admina").remove();
							alert("Произошла ошибка, войдите чтобы продолжить!");
							location.href="./?vv";
						}
					}
                }
     });		



	 }	 

}


</script>






					<?php } ?>