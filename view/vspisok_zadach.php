﻿<h1>Список задач</h1>

<div class="row">
	<div class="col-1">
страница:
	</div>
	<div class="col-4">
		<nav aria-label="навигация">
			<ul class="pagination">
				<? if(((int)$pg-1)>0){ ?>
				<li class="page-item">
					<a class="page-link" href="./?sp&page=<?= (int)$pg-1; ?>" aria-label="Previous">
						<span aria-hidden="true">&laquo;</span>
						<span class="sr-only">Previous</span>
					</a>
				</li>
				<? }?>
				<li class="page-item">
					<a class="page-link" href="./?sp&page=1">1</a>
				</li>


				<? if($spisok_c>1){ ?>
				<li class="page-item">.....</li>
				<li class="page-item">
					<a class="page-link" href="#">
						<?= $pg; ?>
					</a>
				</li>
				<li class="page-item">.....</li>
				<li class="page-item">
					<a class="page-link" href="./?sp&page=<?= $spisok_c; ?>">
						<?= $spisok_c; ?>
					</a>
				</li>

				<? } ?>

				<? if($spisok_c>((int)$pg)){ ?>
				<li class="page-item">
					<a class="page-link" href="./?sp&page=<?= ((int)$pg)+1 ?>" aria-label="Next">
						<span aria-hidden="true">&raquo;</span>
						<span class="sr-only">Next</span>
					</a>
				</li>
				<? } ?>
			</ul>
		</nav>
	</div>

	<div class="col-4">

		<div class="dropdown">
			<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Сортировать:
			</button>
			<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
				<a class="dropdown-item" href="./?sp&sort=0&page=<?= $pg ?>">по имени</a>
				<a class="dropdown-item" href="./?sp&sort=1&page=<?= $pg ?>">по e-mail адресу</a>
				<a class="dropdown-item" href="./?sp&sort=2&page=<?= $pg ?>">по статусу</a>
				<a class="dropdown-item" href="./?sp&sort=3&page=<?= $pg ?>">по имени по убыванию</a>
				<a class="dropdown-item" href="./?sp&sort=4&page=<?= $pg ?>">по e-mail адресу по убыванию</a>
				<a class="dropdown-item" href="./?sp&sort=5&page=<?= $pg ?>">по статусу по убыванию</a>
			</div>
		</div>

	</div> 

</div>


<? foreach($spisok as $sp){ ?>
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
							<?= $sp[1]; ?>
						</div>
					</div>
				</div>
				<div class="col-4">

					<div class="row">
						<div class="col-4">
e-mail: 
						</div>
						<div class="col-8">
							<?= $sp[2]; ?>
						</div>
					</div>

				</div>
				<div class="col-4">

					<div class="row">
						<div class="col-2">
статус: 
						</div>
						<div class="col-6">
							<? if($sp[4]=='0'){echo "еще не выполнено"?>
							<img width="20px" height="20px" src="./nep.png" />
							<? } ?>
							<? if($sp[4]=='1'){echo "выполнено"?>
							<img width="20px" height="20px" src="./vyp.png" />
							<? } ?>
						</div>
						<div class="col-4">
							<? if($sp[5]==1){ ?>
отредактировано администратором
							<? } ?>
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
						<?= $sp[3]; ?>
					</div>

				</div>

			</div>
		</div>
		<hr>
			<? } ?>

			