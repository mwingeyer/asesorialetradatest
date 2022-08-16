<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Asesoria Juridica y de control de Legalidad de Gobierno</title>
        
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Sitio Oficial de Asesoria Juridica y de control de Legalidad de Gobierno de la Provincia de San Juan, Argentina">
        <meta name="keywords" content="control,legalidad,asesoria juridica,asesoria,letrada,sanjuan,sanjuan.gov.ar,Portal de San Juan">
        <meta name="author" content="Gobierno de la Provincia de San Juan">
        
        <link rel="stylesheet" type="text/css" href="vistas/css/custom-bootstrap.min.css" />
        <link type="text/css" rel="stylesheet" href="vistas/css/patron.css">
        <link type="text/css" rel="stylesheet" href="vistas/css/patron-iconos.css">
        <link rel="stylesheet" type="text/css" href="vistas/css/style.css"/>
        <link rel="shortcut icon" type="image/png" href="vistas/img/favicon.png"/>

        <script type="text/javascript" src="vistas/gen/v.js"></script>
        <script type="text/javascript" src="vistas/js/sitio.min.js"></script>
        <script type="text/javascript" src="vistas/js/all.min.js"></script>   
       

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
        include "paginas/modulos/linkaccesos.php";
		include "paginas/modulos/circulares.php";
        //include "paginas/modulos/notas.php";
        include "paginas/modulos/accesos.php";
		include "paginas/modulos/organizacion.php";
		include "paginas/modulos/footer.php";


	?>

    <script>
        function openCity(evt, cityName) {
            var i, x, tablinks;
            x = document.getElementsByClassName("city");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }

            tablinks = document.getElementsByClassName("tablink");
            for (i = 0; i < x.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" w3-border-red", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.firstElementChild.className += " w3-border-red";
        }
    </script>

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