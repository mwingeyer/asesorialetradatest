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

<!-- CIRCULARES  -->
 <section>
    <hr class="divisor-seccion border-secondary" aria-hidden="true">
    <h2 class="text-center text-secondary">Circulares</h2>

     <br>
     <div class="row col-12 intro-padre">

      <!-- COLUMNA IZQUIERDA -->
        <div class=" col-lg-8 intro">
          <?php
            $n =0;
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
             
              if ($nombre == 'Circular'){
            
                $n=$n+1;              

                if ($n <=2){
                
                  echo '<hr aria-hidden="true" style="min-height: 0.1rem!important; background: url(https://d1pucn86e4upao.cloudfront.net/templates/g5_hydrogen/custom/images/borde-colores.svg)!important;">
                        <ol id="'.$id.'">
                          <div>
                            <h3 class="d-lg-block">CIR-'.$numNor.'-'.$acro.'-'.$anio.'</h3>
                            <h5>'.$tema.'</h5> 
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
                              <h3 class="modal-title">CIR-'.$numNor.'-'.$acro.'-'.$anio.'</h3>
                            </div>
                            <div class="modal-body" style="border:1px solid #eee">
                              <p class="">'.$tema.'</p>
                            </div>
                            <div class="modal-footer d-flex justify-content-between">
                              <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                              <button type="submit" class="btn btn-primary float-right"><a class="text-white"target="_blank" href ="'.$urlpdf.'">Descargar</a></button>
                            
                            </div>  
                          </div>
                        </div>';
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
                $n =0;
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

                    $n=$n+1;                

                    if ($n > 2 and $n < 12){
                      
                      echo' <td><h6>CIR-'.$numNor.'-'.$acro.'-'.$anio.'</h6></td>
                            <td>
                              <span class="text-right">
                                <a href="#verCircular'.$id.'" data-toggle="modal">                          
                                  <i class="btn btn-danger verCircular">Ver</i>
                                </a>
                              </span>
                            </td>
                            <td></td>
                            <tr>
                            
                            <div id="verCircular'.$id.'" class="modal fade">
                              <div class="modal-dialog modal-content">
                               <div class="modal-header" style="border:1px solid #eee">
                                 <h3 style="text-black" >CIR-'.$numNor.'-'.$acro.'-'.$anio.'</h3>
                               </div>
                               <div class="modal-body" style="border:1px solid #eee">
                                  <p class="parrafoContenido">'.$tema.'</p>
                               </div>
                               <div class="modal-footer d-flex justify-content-between">
                                 <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                                 <button type="submit" class="btn btn-primary float-right"><a class="text-white" target="_blank" href ="'.$urlpdf.'">Descargar</a></button>
                               </div>  
                              </div>
                            </div>';
                       }
                     } 
                }
              
              ?>
                    
          </table>    
        </div>
      </div>
        
</section>
