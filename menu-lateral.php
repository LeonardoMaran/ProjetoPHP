
	<div class="lado-esq">
	<h1>Categorias</h1>
        <?php
            $categorias = consultar("categoria","ativo_categoria='s'");
            foreach($categorias as $categoria){
                $idcat = $categoria["id_categoria"];
        ?>
		
	<ul>
            <h2><a href="<?php echo URL_BASE ."categoria/&c=$idcat" ?>"><?php echo $categoria["categoria"]?></a></h2>
                <?php
                 $subcategorias = consultar("subcategoria"," ativo_subcategoria = 's' and id_categoria = $idcat ");
                 if($subcategorias){
                     foreach ($subcategorias as $subcategoria){
                         $urlsub = URL_BASE . "subcategorias/&s=".$subcategoria["id_subcategoria"];
                         echo "<li><a href=$urlsub >$subcategoria[subcategoria]</a></li>";
                     }
                 }
                ?>		  			  
	</ul>
	 <?php } ?>	
			
	
	</div>