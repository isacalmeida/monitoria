<!DOCTYPE html>
<html>
	<head>
		<title> Redirecionador </title>
		<meta charset="UTF-8">
		<style type="text/css">
		<!--
		
		
		-->
		</style>
	</head>
	<body>
		<?PHP
			if(isset($_GET['pagina'])){
				header("location: ../index.php?pagina=".$_GET['pagina']."#end");
			}
			else{
				header("location: ../index.php?pagina=0&height=0");
			}
			return;
		?>
	</body>
</html>
