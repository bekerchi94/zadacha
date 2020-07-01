<h1>Добавить задачу</h1>

<div class="alert alert-danger" id="verr" role="alert">
	<?= $resul; ?>
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
		<input type="button" class="btn btn-primary btn-block" id="sohr"  value="Сохранить" />
	</div>

</form>

