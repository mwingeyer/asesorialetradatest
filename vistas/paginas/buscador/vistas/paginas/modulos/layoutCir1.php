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
    $totalRegistros="";
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
<div class="card-body col-lg-8">
    <table class="table table-striped dt-responsive nowrap" width="100%" >
      <thead>
        <tr>
          <th>Título</th>
          <th>Reseña</th>
          <th></th>
        </tr>
      </thead>
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
                 

                 echo '<tbody>
                        <tr>
                        <td class="col-lg-3"><h5 class="d-lg-block">CIR-'.$numNor.'-'.$acro.'-'.$anio.'</h5></td>
                       <td><p class="my-2 my-lg-3">'.$tema.'</p></td>
                       <td><span><a href="#verCircular'.$id.'" data-toggle="modal"><i class="btn btn-danger verCircular">Ver</i></a></span></td>
                       </tr>
                       </tbody>

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
      
    </table>
  </div>