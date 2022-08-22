<?php
    date_default_timezone_set('America/Argentina/San_Juan');
    $urldominio = "http://10.2.132.73:8085/ol/";
    $options = [
        CURLOPT_FAILONERROR => true,
        CURLOPT_HTTPHEADER => array('Content-Type:application/json'),
        CURLOPT_RETURNTRANSFER => true
    ];
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

              $id=$datos['res']['recordset'][$i]['Id'];
              $feSancion=$datos['res']['recordset'][$i]['FechaSancion'];
              $anio=$datos['res']['recordset'][$i]['Anio'];
              $numNor=$datos['res']['recordset'][$i]['NumeroNorma'];
              $nombre=$datos['res']['recordset'][$i]['Nombre'];   
              $tema=$datos['res']['recordset'][$i]['TemaGeneral'];
              $urlpdf=$datos['res']['recordset'][$i]['Url'];
              $asiento=$datos['res']['recordset'][$i]['Asiento'];
              $feCarga=$datos['res']['recordset'][$i]['FechaCarga'];
              $idInstitucional = $datos['res']['recordset'][$i]['IdentInstitucional'];
              $voz = $datos['res']['recordset'][$i]['Voz'];
              $p_claves = $datos['res']['recordset'][$i]['PalabrasClaves'];  
              if($anio < "2022"){
                     $acro = "ALG";
                   }else{
                     $acro = "AJYLG";
              }
					
							if ($nombre == 'Circular') {

								
								 echo '<hr aria-hidden="true" style="min-height: 0.1rem!important; background: url(https://d1pucn86e4upao.cloudfront.net/templates/g5_hydrogen/custom/images/borde-colores.svg)!important;">
                        <ol id="'.$id.'">
                          <div class="col-lg-12 card">
                            <h3 class="d-lg-block">CIR-'.$numNor.'-'.$acro.'-'.$anio.'</h3>
                            <h5 class="my-2 my-lg-3">'.$tema.'</h5>
                          </div>
                        <span>
                        <a href="#verCircular'.$id.'" data-toggle="modal">                          
                        	<i class="btn btn-danger verCircular">Ver</i>
                        </a>
                        </span>
                        </ol>
                        
                        <div id="verCircular'.$id.'" class="modal fade">
                          <div class="modal-dialog modal-content">
                            <div class="modal-header" style="border:1px solid #eee">
                              <h4 class="modal-title">CIR-'.$numNor.'-'.$acro.'-'.$anio.'</h4>
                            </div>
                            <div class="modal-body" style="border:1px solid #eee">
                              <p class="">'.$tema.'</p>
                            </div>
                            <div class="modal-footer d-flex justify-content-between">
                              <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                              <button type="submit" class="btn btn-primary float-right"><a class="text-white" target="_blank" href ="'.$urlpdf.'">Descargar</a></button>
                            </div>  
                          </div>
                        </div>';
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


