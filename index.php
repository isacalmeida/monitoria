<?PHP
	session_start();
	if(!isset($_SESSION['start']) || $_SESSION['start'] == 0){
		session_destroy();
	}
	if(isset($_GET['termina']) && $_GET['termina'] == 1){
		session_destroy();
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Extensão</title>
		<meta charset="UTF-8">
		<style type="text/css">
		<!--

/* Site structure */
		
#background{
	height: 500px;
	width: 1023px;
	margin: 0 auto;
	border: 0px solid;
	border-radius: 5px;
}

hr{
	position: relative;
	top: -20px;
}

/* End Site structure */
/* Banner */

#banner{
	height: 150px;
	width: 1023px;
	border: 0px solid;
}

#banner img{
	height: 140px;
	width: 135px;
	position: relative;
	float: left;
	left: -5px;
	top: -20px;
}

#banner h1{
	position: relative;
	top: 55px;
	<?PHP
		if(isset($_GET['erro'])){
			if($_GET['erro'] == 0){
				echo "left: -90px;";
			}
			else{
				if($_GET['erro'] == 1){
					echo "left: -88px;";
				}
			}
		}
		else{
			if(isset($_SESSION['start']) && $_SESSION['start'] == 1){
				echo "left: -176px;";
			}
			else{
				echo "left: 10px;";
			}
		}
	?>
	text-align: center;
}

#banner h4{
	position: relative;
	float: right;
	top: 10px;
	<?PHP
		if(isset($_GET['erro'])){
			if($_GET['erro'] == 0){
				echo "left: 290px;";
			}
			else{
				if($_GET['erro'] == 1){
					echo "left: 295px;";
				}
			}
		}
		else{
			if(isset($_SESSION['start']) && $_SESSION['start'] == 1){
				echo "left: 118px;";
			}
			else{
				echo "left: 490px;";
			}
		}
	?>
	text-align: right;
}

#banner h5{
	position: relative;
	top: -20px;
	font-size: 110%;
	float: right;
}

/* End Banner */
/* Menu */

#menu{
	position: relative;
	top: -20px;
	left: -30px;
	border: 0px solid;
	margin: 0 auto;
	text-align: center;
	list-style:none; 
}

#menu li a{
	font-size: 26px;
	margin: 15px;
	text-decoration: none;
	color: blue;
}

/* End Menu */

/* Páginas Iframe */

#col_iframe{
	position: relative;
	top: -20px;
	height: 640px;
	border: 0px solid;
}

/* End Iframe */

/* End */

#end{
	position: relative;
	top: -20px;
}

/* End End*/

		-->
		</style>
		<a name='topo'></a>
	</head>
	<body>
		<div id="background">
			<div id="banner">
				<img src="images/uffs.png">
				<?PHP
					if(isset($_SESSION['start']) && $_SESSION['start'] == 1){
						if(isset($_GET['termina']) && $_GET['termina'] == 1){
							header("location: index.php");
						}
						else{
							echo "<h5>Olá ". $_SESSION['user'] ." <a href='php/validator.php?termina=1'><button type='button'> Sair </button></a></h5>";
						}
					}
					else{
						if(isset($_GET['erro'])){
							if($_GET['erro'] == 0){
								echo "<h5> Informe o Login e Password! <a href='index.php'><button type='button'> Continuar </button></a></h5>";
								//session_destroy();
							}
							else{
								if($_GET['erro'] == 1){
									echo "<h5> Login ou Password Inválidos! <a href='index.php'><button type='button'> Continuar </button></a></h5>";
								}
							}
						}
						else{
							echo "<form action='php/validator.php' method='post' enctype='multipart/form-data'>";
							echo "<h5>Login: <input type='textfield' name='login'> Password: <input type='password' name='password'> <input type='submit'></h5>";
							echo "</form>";
						}
					}
				?>
				<h1>Bem Vindo!</h1>
				<h4>Desenvolvido por: Isac Haran de Almeida<br>Contato: isac.almeida@uffs.edu.br</h4>
			</div>
			<hr>
			<ul id="menu">
				<li>
					<a href="paginas/redirecionador.php?pagina=0" target="meio"> Home </a>
					<a href="paginas/redirecionador.php?pagina=1" target="meio"> Algoritmos e Programação </a>
					<a href="paginas/redirecionador.php?pagina=2" target="meio"> Circuitos Digitais </a>
					<a href="paginas/redirecionador.php?pagina=3" target="meio"> Sistemas Digitais </a>
				</li>
			</ul>
			<hr>
			<div id='col_iframe'>
				<?PHP
					if(isset($_GET['pagina'])){
						switch($_GET['pagina']){
							case 0:{
								echo "<iframe src='paginas/principal.php' name='meio' marginwidth='0' marginheight='0' frameborder='0' scrolling='no'></iframe>";
								break;
							}
							case 1:{
								echo "<iframe src='paginas/algoritmos.php' name='meio' marginwidth='0' marginheight='0' frameborder='0' scrolling='no'></iframe>";
								break;
							}
							case 2:{
								echo "<iframe src='paginas/circuitos.php' name='meio' marginwidth='0' marginheight='0' frameborder='0' scrolling='no'></iframe>";
								break;
							}
							case 3:{
								echo "<iframe src='paginas/sistemas.php' name='meio' marginwidth='0' marginheight='0' frameborder='0' scrolling='no'></iframe>";
								break;
							}
							default:{
								echo "<iframe src='paginas/principal.php' name='meio' marginwidth='0' marginheight='0' frameborder='0' scrolling='no'></iframe>";
							}
						}
					}
					else{
						echo "<iframe src='paginas/principal.php' name='meio' marginwidth='0' marginheight='0' frameborder='0' scrolling='no'></iframe>";
					}
				?>
			</div>
			<hr>
			<a id='end' href="#topo">Retornar ao topo</a>
			<hr>
			<a name='end'></a>
		</div>
	</body>
</html>
