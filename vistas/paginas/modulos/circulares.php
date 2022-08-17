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


<!-- CIRCULARES  -->
 <section>
            <hr class="divisor-seccion border-secondary" aria-hidden="true">
            <h2 class="text-center text-secondary">Circulares</h2>

        <br>
        <div class="row col-12 intro-padre">

			<!-- COLUMNA IZQUIERDA -->
				<div class=" col-lg-8 intro">

			
					
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

								if($id <= 1){
								
									echo '<div class="col-lg-12">
										  <hr aria-hidden="true" style="min-height: 0.1rem!important; background: url(https://d1pucn86e4upao.cloudfront.net/templates/g5_hydrogen/custom/images/borde-colores.svg)!important;">
										  <h4 class="d-lg-block">'.$asiento.'</h4>
										  <p class="my-2 my-lg-5">'.$tema.'</p>
										  <div class="row col-lg-2 float-right">
												<button data-toggle="modal" data-target="#verCircular" type="button" class="btn border-0 text-white flex right" style="background: #B71C1C" value="'.$id.'">Ver</button>
										  </div>
										  <div class="fecha">'.$fechaCarga.'</div> 
										  </div>

											<br>
											<br>';

										$identificador =$id;

									}							 

							}	
						}					
                     ?>
				
				</div>
					

				<!-- COLUMNA DERECHA -->
				<div class="col-lg-4" id="sectorTabla">
					<table id="tablaSuscriptores" class="table table-striped dt-responsive nowrap">
						<thead>
					    <tr>
					 	    <th><h4>Circulares Mas Antiguas</h4></th>   
					 	    <th><h4>Ver</h4></th>
						</tr>
						</thead>
						
						<tr>
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

										if($id >= 2){
											echo'
									        <td><h6>'.$asiento.'</h6></td>
									        <td>
									        	<button data-toggle="modal" data-target="#verCircular" type="button" class="btn border-0 text-white flex right"
									        	    value="'.$id.'" style="background: #B71C1C">
									        		<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
				  									<path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
				  									<path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
													</svg>
												</button>
												
								
									        </td>
									        <td></td>

									    </tr>
									   <tr>';
									}
								}
							}
							?>
									  
					</table>		
				</div>
				
</section>


<!--=============================================
Ver Circular
=============================================-->
<?php
			
			echo '<div class="modal" id="verCircular">
							<div class="modal-dialog">				
								<div class="modal-content">
									<form action="" method="post" enctype="multipart/form-data">
										<div class="modal-header bg-info text-white">
											<h4 class="modal-title">Ver Circular</h4>
											<button type="button" class="close text-white" data-dismiss="modal">&times;</button>
										</div>
										<div class="modal-body">
											<div class="input-group mb-3">
												<h3>'.$asiento.'</h3>
												<h4 class="d-lg-block">'.$id.'</h>
												<hr>
												<p class="my-2 my-lg-5">'.$tema.'</p>
											</div> 
										</div>
										<div class="modal-footer d-flex justify-content-between">
											<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
											<div>
												<button type="submit" class="btn btn-primary"><a class="text-white" target="_blank" href ="'.$urlpdf.'">Descargar</button>
											</div>
										</div>
									</form>
									
								</div>
								

							</div>
						</div>';

					
		

	    
		
	
	?>
		
<!--=============================================-->


