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

<!-- COLUMNA DERECHA -->
<div class="col-lg-4" id="">
          <table id="tabla" class="table table-striped dt-responsive nowrap">
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
                      
                      echo' <td><h6>CIR-'.$numNor.'-'.$acro.'-'.$anio.'</h6></td>
                            <td><div>
                                <span class="text-right">
                                  <a href="#verCircular'.$id.'" data-toggle="modal">                        
                                    <i class="btn btn-danger verCircular" >Ver</i>
                                  </a></div>
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
                                 <button type="submit" class="btn btn-primary float-right"><a class="text-white" target="_blank" href ="'.$urlpdf.'">Descargar</button>
                               </div>  
                              </div>
                            </div>
                            ';
                       }
                     
                }
              
              ?>
                    
          </table>    
        </div>




        