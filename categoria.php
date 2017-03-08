<!DOCTYPE html>

<?php 

$idcat = (int)$_GET["c"];
$cat_selecionada = selecionar("select * from subcategoria where id_subcategoria in"."(select id_subcategoria from produto) and id_categoria =$idcat and ativo_subcategoria = 's' ");

?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>




<div class="conteudo">
    <?php include "menu-lateral.php" ?>


    <div class="lado-dir">
        <div class="base-home">
            <!-- com tres produtos-->	

            <div class="cx-base-home categoria">
                   <?php
                        foreach ($cat_selecionada as $listaCategoria){ 
                       ?>
                <h1><span><?php echo $listaCategoria["subcategoria"]?></span></h1>
                            <?php
                                $idsubcategoria = $listaCategoria["id_subcategoria"];
                                $lstprodutos = consultar( "produto", "id_subcategoria = $idsubcategoria and ativo_produto = 'S'");
                                 foreach($lstprodutos as $lstproduto){   
                                
                            ?>
              
                <div class="quatro-colunas-cat">
                    <div class="cx-img">	
                        <a href="<?php echo URL_BASE ."produto/&p=". $lstproduto["id_produto"]?>"><img src="<?php echo URL_BASE ?>produtos/<?php echo $lstproduto["imagem"]?>" title="<?php echo $lstproduto["produto"]?>"></a>
                    </div>						
                    <h2><a href="<?php echo URL_BASE ."produto/&p=". $lstproduto["id_produto"]?>"><?php echo limita_caracteres( $lstproduto["produto"],40)?></a></h2>
                    <div class="prc-ant"><small>De R$ <?php echo $lstproduto["preco_alto"]?></small> <font>Por</font></div>
                    <h3> R$ <?php echo $lstproduto["preco"]?></h3>

                    <div class="cx-botoes">
                        <form id="form1" name="frmcarrinho" method="post" action="<?php echo URL_BASE ?>carrinho">
                            <input name="txt_preco" 	type="hidden" id="txt_preco" value = "<?php echo $lstproduto["preco"]?>" />
                            <input name="txt_qtde" 		type="hidden" id="txt_qtde" value = "1" />
                            <input type="hidden" 		name="id_produto" value = "<?php echo $lstproduto["id_produto"]?>"/>
                            <input type="submit" 		name="imageField" class="bot-comprar" value="Comprar"  />
                        </form>

                        <a href="<?php echo URL_BASE ?>produto/&p=1" class="bot-detalhe">Detalhes</a>
                        <div class="cx-frete"><b class="frete">FRETE</b><b class="val-frete">GRÁTIS</b></div>
                        <div class="bandeiras none"><font>Em até <b>10x</b> nos cartões</font><img src="<?php echo URL_BASE ?>imagens/bandeiras2.png"></div>			
                    </div>
                </div>
                                 <?php } ?>  
                <div class="limpar"></div>
                        <?php } ?>       
            </div>


        </div>		


        <!--sidebar-->
        
    </div>	
</div>
        
          </body>
</html>
