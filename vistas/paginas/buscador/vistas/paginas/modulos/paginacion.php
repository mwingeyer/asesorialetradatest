 <?php
   $NUM_ITEMS_BY_PAGE=5;
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
    $n=0;

           
   $cantidad=count($datos['res']['recordset']);  
      for($i=0;$i<$cantidad;$i++){

        $nombre=$datos['res']['recordset'][$i]['Nombre'];
               
               if ($nombre == 'Circular') {
                  $n = $n+1;
               }
            }
   
   $num_total_rows = $n;


if ($num_total_rows > 0) {
    $page = false;
 
    //examino la pagina a mostrar y el inicio del registro a mostrar
    if (isset($_POST["page"])) {
        $page = $_POST["page"];
    }
 
    if (!$page) {
        $start = 0;
        $page = 1;
    } else {
        $start = ($page - 1) * $NUM_ITEMS_BY_PAGE;
    }

    //calculo el total de paginas
    $total_pages = ceil($num_total_rows / $NUM_ITEMS_BY_PAGE);
    $result = $num_total_rows;
    
 
    echo '<div class="col-12">
            <div class="col-4">
               <div class="right">
               <div class="right"> 
               ';
    


    echo '<ul class="pagination">';
 
    if ($total_pages > 1) {
        if ($page != 1) {
            echo '<li class="page-item"><a class="page-link" href="index.php?page='.($page-1).'"><span aria-hidden="true">&laquo;</span></a></li>';
        }
 
        for ($i=1;$i<=$total_pages;$i++) {
            if ($page == $i) {
                echo '<li class="page-item active"><a class="page-link" href="#">'.$page.'</a></li>';
            } else {
                echo '<li class="page-item"><a class="page-link" href="index.php?page='.$i.'">'.$i.'</a></li>';
            }
        }
 
        if ($page != $total_pages) {
            echo '<li class="page-item"><a class="page-link" href="index.php?page='.($page+1).'"><span aria-hidden="true">&raquo;</span></a></li>';
        }
    }
    echo '</ul>';
    echo '</div>';
}
?>