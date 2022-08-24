<?php
    date_default_timezone_set('America/Argentina/San_Juan');
    $urldominio = "http://10.2.132.73:8085/ol/";
    //$urllic = "https://sanjuan.gob.ar/ol/?or=8BC9FE18CD734FA4B60CFA24736EC529";
    //$ch2 = curl_init();
    $options = [
        CURLOPT_FAILONERROR => true,
        CURLOPT_HTTPHEADER => array('Content-Type:application/json'),
        CURLOPT_RETURNTRANSFER => true
    ];
    //$ch2 = curl_init($urllic);
    //curl_setopt_array($ch2, $options);
    //$datosjson = curl_exec($ch2);    
    //$res = json_decode($datosjson);  
    $datos=json_decode(file_get_contents('https://sanjuan.gob.ar/ol/?or=8BC9FE18CD734FA4B60CFA24736EC529'),true);

?>

<!-- CIRCULARES  -->
 <section>
    <hr class="divisor-seccion border-secondary" aria-hidden="true">
    <h2 class="text-center text-secondary">Circulares</h2>

     <br>
     <div class="row col-12 intro-padre">

      <!-- COLUMNA IZQUIERDA -->
        <div class=" col-lg-12 intro">
          
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

               if($nombre == 'Circular') { 
                      
                    echo '<div class=" col-lg-12 intro">
                            <div class="col-lg-4">
                              <ol id="'.$id.'">
                              <hr aria-hidden="true" style="min-height: 0.1rem!important; background: url(https://d1pucn86e4upao.cloudfront.net/templates/g5_hydrogen/custom/images/borde-colores.svg)!important;">
                                                      
                                    <h3 class="d-lg-block">CIR-'.$numNor.'-'.$acro.'-'.$anio.'</h3>
                                    <p class="my-2 my-lg-5">'.$tema.'</p>
                                  
                                  <span>
                                    <a href="#verCircular" data-toggle="modal">                          
                                      <i class="btn btn-danger verCircular">Ver</i>
                                    </a>
                                  </span>
                                </ol> 
                              </div>
                            </div>                       
                         
                          
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
                                <button type="submit" class="btn btn-primary float-right"><a class="text-white" target="_blank" href ="'.$urlpdf.'">Descargar</a></button>
                              </div>  
                            </div>
                          </div>';
                        }
                      }
                                            
                 
            ?>
         
        </div>
  </section>
            
