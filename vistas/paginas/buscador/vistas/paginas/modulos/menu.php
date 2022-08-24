<?php $_GET['norma']?>

<!-- Menu Superior-->
	<header>
		<div class="navbar-fixed">
			<nav>
				<div class="navar"></div>
			    <div class="nav-wrapper white">
				    <div class="row col s12">
			    	<div class ="col s2">
					    <a href="http://www.sanjuan.gob.ar" class="navbar-brand" target="_blank">
			                <img src="vistas/img/logogobierno.png" width="75%!important">
			            </a>
		        	</div>
		        	<div class ="col s2">
		            <a href="../../../index.php" class="navbar-brand">
		                <img src="vistas/img/asesoriaLetrada.png" width="150">
		            </a>
		            </div>
		            <div class ="col s2 ">
		            <a href="" class="navbar-brand">
		            	<?php if ($_GET['norma'] == 0): ?>
				    		<img src="vistas/img/buscadorCircular.png" width="150">
				    	<?php endif ?>
				    	<?php if ($_GET['norma'] == 1): ?>
				    		<img src="vistas/img/buscadordictamenes.png" width="150">
				    	<?php endif ?>
		                
		            </a>
		            </div>
		        	</div>
				    <!-- <ul class="right hide-on-med-and-down">
				    	<li><a href="#"><i class="material-icons">search</i></a></li>
				        <li><a href="#"><i class="material-icons">view_module</i></a></li>
				        <li><a href="#"><i class="material-icons">refresh</i></a></li>
				        <li><a href="#"><i class="material-icons">more_vert</i></a></li>
				    </ul> -->
			    </div>
			</nav>
			
		</div>			
    </header>
    <!-- Fin Menu superior-->