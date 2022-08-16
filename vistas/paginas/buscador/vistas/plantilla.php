<?php $_GET['norma'] ;?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     
    <title>Buscador Asesoria Letrada</title>

   		<link rel="icon" href="vistas/img/favicon.png">

		<!--=====================================
		PLUGINS DE CSS
		======================================-->

		<link rel="stylesheet" type="text/css" href="vistas/css/custom-bootstrap.min.css" />
		<link href="vistas/css/styleS.css" rel="stylesheet">
		<link href="vistas/css/bootstrap.css" rel="stylesheet">
		<link href="vistas/css/bootstrap.min.css" rel="stylesheet">
		<link href="vistas/css/materialize.css" rel="stylesheet">
		<link href="vistas/css/materialize.min.css" rel="stylesheet">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		
				
		<!--=====================================
		PLUGINS DE JS
		======================================-->
		
		<script src="vistas/js/bootstrap.js" type="text/javascript"></script>
		<script src="vistas/js/bootstrap.min.js" type="text/javascript"></script>
		<script src="vistas/js/materialize.js" type="text/javascript"></script>
		<script src="vistas/js/materialize.min.js" type="text/javascript"></script>
		<script src="vistas/js/complementos.js" type="text/javascript"></script>
		<script src="https://materializecss.com/js/tabs.js" type="text/javascript"></script> 
		<script type="text/javascript" src="vistas/gen/v.js"></script>
        <script type="text/javascript" src="vistas/js/sitio.min.js"></script>
        <script type="text/javascript" src="vistas/js/all.min.js"></script>  
		<!-- <script src="js/tabs.js" type="text/javascript"></script> -->

		
		<!-- =======================================================
	    Theme Name: Asesoria Letrada "Buscador Circulares"
	    Theme URL: asesorialetrada.sanjuan.gob.ar
		Author: Wingeyer Marcelo
		============================================================ -->
		
</head>

<body>

	<?php
	
	    include "paginas/modulos/menu.php";
		include "paginas/modulos/cabecera.php";
		include "paginas/modulos/buscador.php";
		if($_GET['norma'] == 0){		
			include "paginas/modulos/layoutCir.php";
		}else{
			include "paginas/modulos/layoutDic.php";
		};
		include "paginas/modulos/footer.php";
     
     ?>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

</body>
</html>
