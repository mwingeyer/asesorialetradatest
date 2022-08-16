<hr class="divisor-seccion border-secondary" aria-hidden="true">
<h2 class="text-center text-secondary">Buscadores</h2>

<br>
    <!-- ICONOS Circulares y Dictamenes-->        
    <section class="accesos text-center mb-2">
        <div class="container" >
            <div class="row d-flex justify-content-between justify-content-md-around align-items-baseline">    
                <div class="col">
                    <div class="icono-acceso">
                        <i class="icono-expediente"></i>
                    </div>
                    <?php
                        $tipoNorma = '0';
                    ?>
                    <h2 class="h4">
                        <a class="stretched-link" href="vistas/paginas/buscador/index.php?norma=<?php echo $tipoNorma?>" target="_blank">Circulares</a>
                        
                    </h2>
                </div>

                <div class="col">
                    <div class="icono-acceso">
                        <i class="icono-tramites"></i>
                    </div>
                    <?php
                          $tipoNorma = '1';
                    ?>
                    <h2 class="h4">
                        <a class="stretched-link" href="vistas/paginas/buscador/index.php?norma=<?php echo $tipoNorma?>" target="_blank">Dictamenes</a>
                         
                    </h2>
                </div>
 
        </div>
    </section>
    <!-- FIN ICONOS Circulares y Dictamenes--> 