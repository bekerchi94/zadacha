﻿<?php  include('./contoller/mspisok_zadach.php'); ?> 
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
				<div class="col-4">
					<div class="row">
						<div class="col-4">
Пользователь: 
						</div>
						<div class="col-8">
							<?php echo $sp[1]; ?>
						</div>
					</div>
				</div>
				<div class="col-4">

					<div class="row">
						<div class="col-4">
e-mail: 
						</div>
						<div class="col-8">
							<?php echo $sp[2]; ?>
						</div>
					</div>

				</div>
				<div class="col-4">

					<div class="row">
						<div class="col-2">
статус: 
						</div>
						<div class="col-6">
							<?php if($sp[4]=='0'){echo "еще не выполнено"?>
							<img width="20px" height="20px" src="./nep.png" />
							<?php } ?>
							<?php if($sp[4]=='1'){echo "выполнено"?>
							<img width="20px" height="20px" src="./vyp.png" />
							<?php } ?>
						</div>
						<div class="col-4">
							<?php if($sp[5]==1){ ?>
отредактировано администратором
							<?php } ?>
						</div>


					</div>



				</div>

			</div>


			<hr>
				<div class="row">
					<div class="col-12">
Задача: 
					</div>
					<div class="col-12">
						<?php echo $sp[3]; ?>
					</div>

				</div>

			</div>
		</div>
		<hr>
			<?php } ?>

			