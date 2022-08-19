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
             
              if ($nombre == 'Circular') {
            
                if($i <= 1){  
                
                  echo '<hr aria-hidden="true" style="min-height: 0.1rem!important; background: url(https://d1pucn86e4upao.cloudfront.net/templates/g5_hydrogen/custom/images/borde-colores.svg)!important;">
                        <ol id="'.$i.'">
                          <div class="col-lg-12">
                            <h3 class="d-lg-block">'.$asiento.'</h3>
                            <h4 class="my-2 my-lg-5">'.$tema.'</h4>
                            <div class="fecha">'.$fechaCarga.'</div> 
                          </div>
                        <span>
                        <a href="#verCircular'.$i.'" data-toggle="modal">                          
                        	<i class="btn btn-danger verCircular">Ver</i>
                        </a>
                        </span>
                        </ol>
                        
                        <div id="verCircular'.$i.'" class="modal fade">
                          <div class="modal-dialog modal-content">
                            <div class="modal-header" style="border:1px solid #eee">
                              <h3 class="modal-title">'.$asiento.'</h3>
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
                  

                  
                  if ($nombre == 'Circular') {
                    
                    if($i >= 2 and $i< 8){
                      
                      echo' <td><h6>'.$asiento.'</h6></td>
                            <td>
                              <span class="text-right">
                                <a href="#verCircular'.$i.'" data-toggle="modal">                          
                                  <i class="bi bi-eye btn btn-danger verCircular">Ver</i>
                                </a>
                              </span>
                            </td>
                            <td></td>
                            <tr>
                            
                            <div id="verCircular'.$i.'" class="modal fade">
                              <div class="modal-dialog modal-content">
                               <div class="modal-header" style="border:1px solid #eee">
                                 <h3 style="text-black" class="modal-title">'.$asiento.'</h3>
                               </div>
                               <div class="modal-body" style="border:1px solid #eee">
                                  <p class="parrafoContenido">'.$tema.'</p>
                               </div>
                               <div class="modal-footer d-flex justify-content-between">
                                 <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                                 <button type="submit" class="btn btn-primary float-right"><a class="text-white" target="_blank" href ="'.$urlpdf.'">Descargar</button>
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
