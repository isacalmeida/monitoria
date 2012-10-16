<?PHP
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title> Sistemas </title>
		<meta charset="UTF-8">
		<style type="text/css">
		<!--
		
		
		-->
		</style>
	</head>
	<body>
		<?PHP
			if(isset($_SESSION['start']) && $_SESSION['start'] == 1){
				echo "Sistemas";
			}
			else{
				echo "Você não está autorizado a acessar essa página, por favor, efetue o login!";
			}
		?>
	</body>
</html>
