<?php
        if(@$idCliente){
        $txtLogin = "Logoff";
        $urlLogin = URL_BASE. "logoff.php";
        $nomeCliente = $_SESSION["LJCLIENTE"]["cliente"];
    }else{
         $txtLogin = "Login";
        $urlLogin = URL_BASE. "nao-logado";
        $nomeCliente = "Visitante";
    }
    
            ?>
<div class="mn-topo">
	<div class="conteudo">
		<div class="contato-topo">
				<h1>TELEFONE &nbsp;<strong>11 99690-8432</strong></h1>
				<h1>E-MAIL &nbsp;<strong>leonardogmaran9@gmail.com</strong></h1>
				<ul class="menu-topo">
					<li><a href="<?php echo URL_BASE ?>">HOME	</a></li>
					<li><a href="<?php echo URL_BASE ?>/cadastro">cadastrar	</a></li>
                                        <?php echo"<li><a href= $urlLogin>$txtLogin</a></li>"; ?>   
									</ul>
				<a href="<?php echo URL_BASE."cadastro"?>" title="usuario" class="usuario"><img src="<?php echo URL_BASE ?>/imagens/ico-usuario-topo.png"><p><?php echo @$nomeCliente ?> </p></a>
		</div>
	</div>
</div>
<div class="base-topo">

	<div class="conteudo">
		<a href="<?php echo URL_BASE ?>" title="logo loja virtual" class="logo"><img src="<?php echo URL_BASE ?>/imagens/logo-topo.png"></a>
		<div class="carrinho-topo">
		<ul>

				<li><a href="<?php echo URL_BASE ?>carrinho/"><i class="ico-carrinho"></i> <span>Produtos</span><i class="ico-arrow"></i></a>
					<ul>
						<li>
							<div class="prod-carrinho">
							 								
							<a href="<?php echo URL_BASE ?>/carrinho" class='comprar'>Ir para o carrinho</a>

							</div>
						</li>
					</ul>
				</li>
		</ul>
		</div>
		
	</div>
</div>
<div class="limpar"></div>

<nav class="navmenu">
<a href="#" class="mobmenu">menu</a>
<div class="cor">
	<div class="conteudo">
		<ul>
				<!-- mostrar mobile -->
					<li class="mostra"><a href="<?php echo URL_BASE ?>"><i class="ico-home"></i>Home	</a></li>
					<li class="mostra"><a href="<?php echo URL_BASE ?>login"><i class="ico-logar"></i>Login</a></li>
					<li class="mostra"><a href="<?php echo URL_BASE ?>cadastro"><i class="ico-cad"></i>Cadastrar	</a></li>

			<?php
                        $menu_categorias = consultar("categoria","ativo_categoria='S' limit 7");
                        foreach ($menu_categorias as $menu_categoria){
                        $id_menu_cat= $menu_categoria["id_categoria"];
                        ?>
			<li><a href="<?php echo URL_BASE."categoria/&c=$id_menu_cat"?>"><span><img src="<?php echo URL_BASE ?>imagens/ico-mb.png"></span><?php echo $menu_categoria["categoria"]?></a>



                            <ul>
                                <?php

                                $menu_subcategorias = consultar("subcategoria"," ativo_subcategoria = 'S' and id_categoria = $id_menu_cat ");
                                foreach($menu_subcategorias as $menu_subcategoria){
                                  $url_sub = URL_BASE . "subcategorias/&s=".$menu_subcategoria["id_subcategoria"];
                                echo "<li><a href=$url_sub title= Sub Produto 1>$menu_subcategoria[subcategoria]</a> </li>";

				 } ?>
                            </ul>

			</li>
                        <?php } ?>





		</ul>
	</div>
</div>
</nav>