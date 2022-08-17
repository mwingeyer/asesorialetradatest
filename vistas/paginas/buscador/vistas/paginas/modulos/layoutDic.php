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

    /*CONEXION API NORMA*/
    $ch2 = curl_init($urllic);
    curl_setopt_array($ch2, $options);
    $datosjson = curl_exec($ch2);    
    $res = json_decode($datosjson);  
    $datosNormas=json_decode(file_get_contents('https://sanjuan.gob.ar/ol/?or=8BC9FE18CD734FA4B60CFA24736EC529'),true);
    $id="";

    /*CONEXION API ORGANISMO*/
    $ch2 = curl_init($urllic);
    curl_setopt_array($ch2, $options);
    $datosjson = curl_exec($ch2);    
    $res = json_decode($datosjson);  
    $datosOrganismos=json_decode(file_get_contents('https://sanjuan.gob.ar/ol/?or=8BC9FE18CD734FA4B60CFA24736EC527'),true);
    var_dump($datosOrganismos);
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
					   	<option value="2">Más antiguos</option>
					</select>
				</div>
				<hr>
				
				<div class="row col-lg-12">
					<label><i class="material-icons tiny">business</i>Organismos</label>
						<select class="browser-default">
							<?php
					         $cantidad=count($datosOrganismos['res']['recordset']);
					         for($i=0;$i<$cantidad;$i++){

					          $nombre=$datosOrganismos['res']['recordset'][$i]['Nombre'];	
					          $asiento=$datosOrganismos['res']['recordset'][$i]['Asiento'];
					          $tema=$datosOrganismos['res']['recordset'][$i]['TemaGeneral'];
					          $fecha=$datosOrganismos['res']['recordset'][$i]['FechaCarga'];
					          $urlpdf=$datosOrganismos['res']['recordset'][$i]['Url'];
					          $idInstitucional = $datosOrganismos['res']['recordset'][$i]['IdentInstitucional'];
					          $voz = $datosOrganismos['res']['recordset'][$i]['Voz'];
					          $p_claves = $datosOrganismos['res']['recordset'][$i]['PalabrasClaves'];

					          $fechaCarga = date('Y-m-d');
					          $id = $i;
					          
					     	 }
					        ?>
							<option value="" disabled selected>Seleccione un Organismo</option>
							

							   	<option id="organismos" value="">Ministerio</option>
							
							
						

						</select>
				</div>
				<hr>
				<div class="row col-lg-12">
					<label><i class="material-icons tiny">business</i>Voces</label>
						<select class="browser-default">
							<option value="" disabled selected>Seleccione las Voces</option>
							

							   	<option value=""></option>
							
							

						</select>
				</div>
				<hr>
			</div>
		</div>



	  <!-- Columna de Encontrados -->
	  <div class="col-lg-8 card"> 
		<?php
         $cantidad=count($datosNormas['res']['recordset']);
         for($i=0;$i<$cantidad;$i++){

          $nombre=$datosNormas['res']['recordset'][$i]['Nombre'];	
          $asiento=$datosNormas['res']['recordset'][$i]['Asiento'];
          $tema=$datosNormas['res']['recordset'][$i]['TemaGeneral'];
          $fecha=$datosNormas['res']['recordset'][$i]['FechaCarga'];
          $urlpdf=$datosNormas['res']['recordset'][$i]['Url'];
          $idInstitucional = $datosNormas['res']['recordset'][$i]['IdentInstitucional'];
          $voz = $datosNormas['res']['recordset'][$i]['Voz'];
          $p_claves = $datosNormas['res']['recordset'][$i]['PalabrasClaves'];

          $fechaCarga = date('Y-m-d');
          $id = $i;
					
			if ($nombre == 'Dictamen') {

				echo '
			  		<div class="card col-lg-12 card">					    
					    <div class="card-content p-2">
					    	<hr aria-hidden="true" style="min-height: 0.1rem!important; background: url(https://d1pucn86e4upao.cloudfront.net/templates/g5_hydrogen/custom/images/borde-colores.svg)!important;">
					    	
							<h4>'.$asiento.'</h4>
					      	<p>'.$tema.'</p>
					      	<hr>
					      	<h5>Leyes de refernecia</h5>
					      	<p>A 1598 - E 388</p>
					    	<div class="fecha">'.$fecha.'</div>
					    </div>
					    <div class="row col-lg-12 text-center">
					    	<div class="col-lg-5 col-sm-12 text-center p-2">
							    <a href="https://digestosanjuan.gob.ar/home" target="_blank" class="waves-effect waves-light btn-small right" style="background: #B71C1C">Ver Digesto</a>
							</div>
							<div class="col-lg-5 col-sm-12 offset-1 text-center p-2">					
							   <a class="waves-effect waves-light btn-small right" style="background: #B71C1C">Ver Dictamen</a>
							</div>
						</div>	 
					 </div>
			  	
					
			
			     ';
			    }
			   }
			 ?>

			
		</div>
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
 -->




    <!--  Modal -->
    <!--=============================================
	Ver Dictamenes
	=============================================-->
	  
<!-- 	<div class="modal" id="verDictamenes">
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
	             
	                </div> 

	                <div class="input-group mb-3">
	                	<p class="my-2 my-lg-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore, minus magni ipsam nisi accusantium ipsa! Incidunt neque ad, iure omnis saepe est.</p>
	                
	                </div> 


	                <div class="form-group my-2 text-center">
	                    <div class="btn btn-default btn-file">
	                      <i class="fas fa-paperclip"></i> Adjuntar Imagen de la Categoría
	                      <input type="file" name="img_categoria">
	                    </div>
	                    <img src="" class="previsualizarImg_img_categoria img-fluid py-2">
	                    <input type="hidden" value="" name="imagen_actual">
	                    <p class="help-block small">Dimensiones: 1024px * 250px | Peso Max. 2MB | Formato: JPG o PNG</p>
	                </div>
	              </div>

	              <div class="modal-footer d-flex justify-content-between">
	                <div>
	                  <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
	                </div>
	                <div>
	                  <button type="submit" class="btn btn-primary">Imprimir</button>
	                  <button type="submit" class="btn btn-primary">Descargar</button>
	                </div>
	              </div>
	            </form>
	          </div>
	        </div>
	      </div> -->
