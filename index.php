<?php
session_start();   
$_SESSION['postdata'] = $_POST;
$_SESSION['getdata'] = $_GET;
?>


<!Doctype html>
<html>
	<head>
		<meta id="vp" name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1,user-scalable=no">
						<link rel="stylesheet" href="./css/bootstrap.min.css" />
			<link rel="stylesheet" href="./css/style.css" />
			<script src="./scripts/jquery.min.js" type="text/javascript"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.0.4/popper.js"></script>
			<script src="./scripts/bootstrap.min.js" type="text/javascript"></script>
			<script src="./scripts/bootstrapValidator.min.js" type="text/javascript"></script>

		</head>
		<body>


			<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"/>
				</button>

				<div class="collapse navbar-collapse" id="navbarColor01">
					<ul class="navbar-nav mr-auto">
						<li class="nav-item active">
							<a class="nav-link" href="./?sp">Список задач<span class="sr-only">(current)</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="./?db">Добавить задачу</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="./?vv">админка</a>
						</li>
					</ul>
				</div>
				<div id="adminca">
				<?php if(isset($_SESSION['admin'])){ ?>

				<label class="control-label" id="adminl" style="color:#fff;">
					<?php echo $_SESSION['admin']; ?>&nbsp;&nbsp;</label>
				<a href="./?vv&vyi=1" id="admina">
					<button class="btn btn-outline-danger my-2 my-sm-0" >Выйти</button>
				</a>

				<?php } ?>
		</div>
			</nav>
			<div class="wrapper">
				<?php
		if(isset($_GET['sp']))
		{
		include('./view/vspisok_zadach.php');   
		}else
		if(isset($_GET['db']))
		{
		include('./view/vdobavit.php');   
		}else
		if(isset($_GET['vv']))
		{
		include('./view/vvoiti.php');   
		}else
		include('./view/vspisok_zadach.php');

	?>
			</div>

		</body>
	</html>


	