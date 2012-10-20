<!DOCTYPE html>
<html>
	<head>
		<title> Validator </title>
		<meta charset="UTF-8">
	</head>
	<body>
		<?php
			if(isset($_GET['termina']) && $_GET['termina'] == 1){
				session_destroy();
				header("location: ../index.php?termina=1");
				return;
			}
			
			$conexao = mysql_connect("mysql-shared-02.phpfog.com","root","") or die("Usuário ou senha inválidos!!");
			mysql_select_db("monitoria_phpfogapp_com",$conexao) or die("DB Inexistente");
			
			if(isset($_POST['login']) && isset($_POST['password'])){
				$login = $_POST['login'];
				$senha = md5($_POST['password']);
			}
			else{
				session_start();
				$_SESSION['start'] = 0;
				$_SESSION['erro'] = 0;
				mysql_close($conexao);
				header("location: ../index.php?erro=0");
				return;
			}
			
			$sql = "SELECT * FROM `user`";
			
			$resultado = mysql_query($sql);
			
			//echo $login.",".$senha."<br>";
			
			if(!empty($login) && !empty($senha)){
				while($linha = mysql_fetch_array($resultado)){
					//echo $linha['login'].",".$linha['password']."<br>";
					if($login == $linha['login'] && $senha == $linha['password']){
						if(isset($_GET['prox'])){
							session_start();
							$_SESSION['start'] = 1;
							$_SESSION['user'] = $login;
							//$prox = $_GET['prox'];
							mysql_close($conexao);
							//header("location: pagina". $prox .".php");
							return;
						}
						else{
							session_start();
							$_SESSION['start'] = 1;
							$_SESSION['user'] = $login;
							mysql_close($conexao);
							header("location: ../index.php");
							return;
						}
					}
				}
				session_start();
				$_SESSION['start'] = 0;
				mysql_close($conexao);
				header("location: ../index.php?erro=1");
				return;
			}
			else{
				session_start();
				$_SESSION['start'] = 0;
				mysql_close($conexao);
				header("location: ../index.php?erro=0");
				return;
			}
		?>
	</body>
</html>

