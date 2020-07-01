<div class="alert alert-danger" id="loginer"  role="alert">
	<?= $aderr; ?>
</div>
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
		<input type="button" class="btn btn-primary btn-block" id="voyti" value="Войти" />
	</div>

</form>
