<?PHP
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title> Circuitos </title>
		<meta charset="UTF-8">
		<style type="text/css">
		<!--
		
		
		-->
		</style>
	</head>
	<body>
		<?PHP
			if(isset($_SESSION['start']) && $_SESSION['start'] == 1){
				echo "Circuitos";
			}
			else{
				echo "Você não está autorizado a acessar essa página, por favor, efetue o login!";
			}
		?>
	</body>
</html>
