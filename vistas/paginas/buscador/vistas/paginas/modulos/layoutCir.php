<?php
    date_default_timezone_set('America/Argentina/San_Juan');
    $urldominio = "http://10.2.132.73:8085/ol/";
    $urllic = "https://sanjuan.gob.ar/ol/?or=8BC9FE18CD734FA4B60CFA24736EC529";
    $ch2 = curl_init();
    $options = [
        CURLOPT_FAILONERROR => true,
        CURLOPT_HTTPHEADER => array('Content-Type:application/json'),
        CURLOPT_RETURNTRANSFER => true
    ];
    $ch2 = curl_init($urllic);
    curl_setopt_array($ch2, $options);
    $datosjson = curl_exec($ch2);    
    $res = json_decode($datosjson);  
    $datos=json_decode(file_get_contents('https://sanjuan.gob.ar/ol/?or=8BC9FE18CD734FA4B60CFA24736EC529'),true);
    $id="";
?>


<!-- LAYOUT -->
<div class="row">
     
  <!-- Columna de busqueda -->
  <div class="col-lg-3 columanIzquierda"> 
    <div class="col-lg-12">
    	<h3>Filtrar por:</h3>
	    <div class="row col-lg-12">
				<label><i class="material-icons tiny">date_range</i>Ordenado Por:</label>
				<select class="browser-default">
				   	<option value="1">Más recientes</option>
				   	<option value="2">Más antiguas</option>
				</select>
			</div>
	   </div>
	  </div>

	  <!-- Columna de Encontrados -->
	  <div class="col-lg-8 card"> 

	  	 <?php
         $cantidad=count($datos['res']['recordset']);
         for($i=0;$i<$cantidad;$i++){

          $nombre=$datos['res']['recordset'][$i]['Nombre'];	
          $asiento=$datos['res']['recordset'][$i]['Asiento'];
          $tema=$datos['res']['recordset'][$i]['TemaGeneral'];
          $fecha=$datos['res']['recordset'][$i]['FechaCarga'];
          $urlpdf=$datos['res']['recordset'][$i]['Url'];
          $idInstitucional = $datos['res']['recordset'][$i]['IdentInstitucional'];
          $voz = $datos['res']['recordset'][$i]['Voz'];
          $p_claves = $datos['res']['recordset'][$i]['PalabrasClaves'];

          $fechaCarga = date('Y-m-d');
          $id = $i;
					
							if ($nombre == 'Circular') {

								echo '
									  	<div class="col-lg-12 card p-2">
											<hr aria-hidden="true" style="min-height: 0.1rem!important; background: url(https://d1pucn86e4upao.cloudfront.net/templates/g5_hydrogen/custom/images/borde-colores.svg)!important;">
											<h4>'.$asiento.'</h4>
											<p class="container">'.$tema.'</p>
											<div class="row col-lg-2 float-right">
												<button data-toggle="modal" data-target="#verCircular" type="button" class="btn border-0 text-white flex right" style="background: #B71C1C">Ver</button>
											</div>
											<div class="fecha">'.$fecha.'</div>
										</div>

									';
							}
						}
						?>
								</div>

<!-- Fin LAYOUT-->


<!-- 
<div class="col-lg-12 row">
<div class="col-lg-6">
<p>Mostrando  para la búsqueda</p>
</div>
<div class="col-lg-6 ">
<ul class="pagination right">
<li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
<li class="active"><a href="#!">1</a></li>
<li class="waves-effect"><a href="#!">2</a></li>
<li class="waves-effect"><a href="#!">3</a></li>
<li class="waves-effect"><a href="#!">4</a></li>
<li class="waves-effect"><a href="#!">5</a></li>
<li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
</ul>			
</div>
</div>
</div>
 -->


<!--=============================================
Ver Circular
=============================================-->
<div class="modal" id="verCircular">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="" method="post" enctype="multipart/form-data">
				<div class="modal-header bg-info text-white">
					<h4 class="modal-title">Ver Circular</h4>
					<button type="button" class="close text-white" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<div class="input-group mb-3">
						<h3>CIR-1-2021</h3>
						<hr>
						<p class="my-2 my-lg-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore, minus magni ipsam nisi accusantium ipsa! Incidunt neque ad, iure omnis saepe est.</p>
					</div> 
				</div>
				<div class="modal-footer d-flex justify-content-between">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
					<div>
						<button type="submit" class="btn btn-primary">Imprimir</button>
						<button type="submit" class="btn btn-primary">Descargar</button>
					</div>
				</div>
			</form>
			
		</div>
	</div>
</div>
<!--=============================================-->

