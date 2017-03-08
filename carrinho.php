<?php
 @$idProduto = strip_tags(filter_input(INPUT_POST, "id_produto"));   
 @$preco     = strip_tags(filter_input(INPUT_POST, "txt_preco"));   
 @$qtd      = strip_tags(filter_input(INPUT_POST, "txt_qtde"));   
 $data      = date("y-m-d");
 $id_cliente = "";
 
 
 if(($idProduto !="")||($idProduto !=0)){
     if(($idPedido =="") ||($idPedido ==0)){
         $dados = array("data_pedido" => $data, "id_cliente" => $id_cliente);
         $idPedido = inserir("pedido", $dados, true);
         
         if ($idPedido) {
            $_SESSION["LJPEDIDO"] = $idPedido;
        }
    }   // verifica-se o produto já existe no carrinho de compra
    $existe = consultar("carrinho"," id_produto = $idProduto and id_pedido = $idPedido ");
    if($existe){
        //
    }else{
        inserir("carrinho", array("id_produto" => $idProduto, "id_pedido" => $idPedido, "valor" => $preco, "qtde" => 1));
    }
 }
 
 if($idPedido){
     $lst_carrinho = consultar(" carrinho c, produto p"," c.id_produto = c.id_produto and id_pedido = $idPedido");
     
 }
   
 
?>



<div class="conteudo">
<?php include"menu-lateral.php"?>
<div class="lado-dir">
	<h1 class="migalha">Lista de Produtos do seu Carrinho</h1>
		<div class="base-carrinho">
			<div class="prog1"></div>
			<p>&nbsp;</p>


<div class="caixa-carrinho">			
<form action="index.php?link=8" method="post">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<thead>
	  <tr>
		<th width="50%" align="center">Produto</th>
		<th width="14%" align="center">Quantidade</th>
		<th width="18%" align="center">Valor unitario</th>
		<th width="18%" align="center">Valor total</th>
	  </tr>
	  </thead>
        
          
	  <tbody>
              <?php 
              foreach($lst_carrinho as $carrinho){
                ?>
             
	  	  <tr>
		<td rowspan="2"><img src="<?php echo URL_BASE ?>produtos/<?php echo $carrinho["imagem"] ?>" title="<?php echo $carrinho["produto"] ?>"><?php echo $carrinho["produto"] ?>"</td>
		<td rowspan="2" align="center"><input type="Number" name="textfield" id="textfield" value="1" class="cont"/></td>
		<td rowspan="2" align="center"><h3>R$ <?php echo $carrinho["valor"] ?></h3></td>
		<td align="center"><h3>R$ 9000</h3></td>
		</tr>
            <?php } ?>
	  <tr>
	    <td align="center"><a href="" class="atualizar">Atualizar </a><a href="" class="excluir">Excluir</a></td>
	    </tr>
	  	  </tbody>
</table>

<h3 class="total">Valor Total: R$ 9000</h3>
	
<div class="limpar"></div>
<div class="base-btns">
	<a href="<?php echo URL_BASE ?>" class="produtos">ESCOLHER MAIS PRODUTOS</a>
	<div class="botoes">
	<a href="<?php echo URL_BASE ?>pagamento" class="comprar">Finalizar Compra</a>
	</div>
	
</div>


	</form>	
</div>
</div>

<!--Recomendados para você-->	
		<div class="recomendamos">
						
		<div class="cx-base-home">
			<h1><span>Recomendados para você</span></h1>
			<div class="caixa-prod-home quatro-colunas">
					<div class="cx-img">
						<a href="<?php echo URL_BASE ?>produto/&p=15"><img src="<?php echo URL_BASE ?>produtos/epson_printer.jpg"></a>
					</div>
				<div class="limpar"></div>	
					<h2><a href="<?php echo URL_BASE ?>produto/&p=15">Impressora Multifuncional Epson EcoTank c/ Wi-Fi - L565</a></h2>
						<div class="prc-ant">De <small>R$ 10346.94</small>&nbsp; Por</div>
							<h3>R$ 3900.00</h3>
										
					<div class="cx-botoes">
						<form id="form1" name="frmcarrinho" method="post" action="<?php echo URL_BASE ?>carrinho">
							<input name="txt_preco" 	type="hidden" id="txt_preco" value = "3900.00" />
							<input name="txt_qtde" 		type="hidden" id="txt_qtde" value = "1" />
							<input type="hidden" 		name="id_produto" value = "15"/>
							<input type="submit" 		name="imageField" class="bot-comprar" value="Comprar"  />
						</form>
						<div class="cx-frete"><b class="frete">FRETE</b><b class="val-frete">GRÁTIS</b></div>
					</div>
			</div>	
			
			<div class="caixa-prod-home quatro-colunas">
					<div class="cx-img">
						<a href="<?php echo URL_BASE ?>produto/&p=20"><img src="<?php echo URL_BASE ?>produtos/canon01.jpg"></a>
					</div>
				<div class="limpar"></div>	
					<h2><a href="<?php echo URL_BASE ?>produto/&p=20">Câmera Digital Canon PowerShot SX520HS, 16.1MP, Zoom Óptic...</a></h2>
						<div class="prc-ant">De <small>R$ 11046.94</small>&nbsp; Por</div>
							<h3>R$ 9100.00</h3>
										
					<div class="cx-botoes">
						<form id="form1" name="frmcarrinho" method="post" action="<?php echo URL_BASE ?>carrinho">
							<input name="txt_preco" 	type="hidden" id="txt_preco" value = "9100.00" />
							<input name="txt_qtde" 		type="hidden" id="txt_qtde" value = "1" />
							<input type="hidden" 		name="id_produto" value = "20"/>
							<input type="submit" 		name="imageField" class="bot-comprar" value="Comprar"  />
						</form>
						<div class="cx-frete"><b class="frete">FRETE</b><b class="val-frete">GRÁTIS</b></div>
					</div>
			</div>	
			
			<div class="caixa-prod-home quatro-colunas">
					<div class="cx-img">
						<a href="<?php echo URL_BASE ?>produto/&p=23"><img src="<?php echo URL_BASE ?>produtos/kindle.jpg"></a>
					</div>
				<div class="limpar"></div>	
					<h2><a href="<?php echo URL_BASE ?>produto/&p=23">E-Reader Kindle Paperwhite, Wi-Fi, 4 GB<br><br><br><br></a></h2>
						<div class="prc-ant">De <small>R$ 10146.94</small>&nbsp; Por</div>
							<h3>R$ 9100.00</h3>
										
					<div class="cx-botoes">
						<form id="form1" name="frmcarrinho" method="post" action="<?php echo URL_BASE ?>carrinho">
							<input name="txt_preco" 	type="hidden" id="txt_preco" value = "9100.00" />
							<input name="txt_qtde" 		type="hidden" id="txt_qtde" value = "1" />
							<input type="hidden" 		name="id_produto" value = "23"/>
							<input type="submit" 		name="imageField" class="bot-comprar" value="Comprar"  />
						</form>
						<div class="cx-frete"><b class="frete">FRETE</b><b class="val-frete">GRÁTIS</b></div>
					</div>			
			</div>				
			<div class="caixa-prod-home quatro-colunas">
					<div class="cx-img">
						<a href="<?php echo URL_BASE ?>produto/&p=19"><img src="<?php echo URL_BASE ?>produtos/cam_sony01.jpg"></a>
					</div>
				<div class="limpar"></div>	
					<h2><a href="<?php echo URL_BASE ?>produto/&p=19">Câmera Digital Sony WX200 Rosa 18.2 MP, LCD de 2,7</a></h2>
						<div class="prc-ant">De <small>R$ 11046.94</small>&nbsp; Por</div>
							<h3>R$ 9100.00</h3>
										
					<div class="cx-botoes">
						<form id="form1" name="frmcarrinho" method="post" action="<?php echo URL_BASE ?>carrinho">
							<input name="txt_preco" 	type="hidden" id="txt_preco" value = "9100.00" />
							<input name="txt_qtde" 		type="hidden" id="txt_qtde" value = "1" />
							<input type="hidden" 		name="id_produto" value = "19"/>
							<input type="submit" 		name="imageField" class="bot-comprar" value="Comprar"  />
						</form>
						<div class="cx-frete"><b class="frete">FRETE</b><b class="val-frete">GRÁTIS</b></div>
					</div>
			</div>	
			
			<div class="caixa-prod-home quatro-colunas">
					<div class="cx-img">
						<a href="<?php echo URL_BASE ?>produto/&p=29"><img src="<?php echo URL_BASE ?>produtos/mesa_genius.jpg"></a>
					</div>
				<div class="limpar"></div>	
					<h2><a href="<?php echo URL_BASE ?>produto/&p=29">Mesa Digitalizadora Genius I608X GT100006 MousePen USB
Mouse...</a></h2>
						<div class="prc-ant">De <small>R$ 11046.94</small>&nbsp; Por</div>
							<h3>R$ 9100.00</h3>
										
					<div class="cx-botoes">
						<form id="form1" name="frmcarrinho" method="post" action="<?php echo URL_BASE ?>carrinho">
							<input name="txt_preco" 	type="hidden" id="txt_preco" value = "9100.00" />
							<input name="txt_qtde" 		type="hidden" id="txt_qtde" value = "1" />
							<input type="hidden" 		name="id_produto" value = "29"/>
							<input type="submit" 		name="imageField" class="bot-comprar" value="Comprar"  />
						</form>
						<div class="cx-frete"><b class="frete">FRETE</b><b class="val-frete">GRÁTIS</b></div>
					</div>
			</div>	
			
			<div class="caixa-prod-home quatro-colunas">
					<div class="cx-img">
						<a href="<?php echo URL_BASE ?>produto/&p=3"><img src="<?php echo URL_BASE ?>produtos/zenfone.jpg"></a>
					</div>
				<div class="limpar"></div>	
					<h2><a href="<?php echo URL_BASE ?>produto/&p=3">Smartphone ASUS ZenFone Selfie Dual Chip Desbloqueado Androi...</a></h2>
						<div class="prc-ant">De <small>R$ 10460.94</small>&nbsp; Por</div>
							<h3>R$ 9000.00</h3>
										
					<div class="cx-botoes">
						<form id="form1" name="frmcarrinho" method="post" action="<?php echo URL_BASE ?>carrinho">
							<input name="txt_preco" 	type="hidden" id="txt_preco" value = "9000.00" />
							<input name="txt_qtde" 		type="hidden" id="txt_qtde" value = "1" />
							<input type="hidden" 		name="id_produto" value = "3"/>
							<input type="submit" 		name="imageField" class="bot-comprar" value="Comprar"  />
						</form>
						<div class="cx-frete"><b class="frete">FRETE</b><b class="val-frete">GRÁTIS</b></div>
					</div>
			</div>				
			<div class="caixa-prod-home quatro-colunas">
					<div class="cx-img">
						<a href="<?php echo URL_BASE ?>produto/&p=27"><img src="<?php echo URL_BASE ?>produtos/webcam_multi.jpg"></a>
					</div>
				<div class="limpar"></div>	
					<h2><a href="<?php echo URL_BASE ?>produto/&p=27">WebCam Multilaser USB c/ Microfone Preta WC040</a></h2>
						<div class="prc-ant">De <small>R$ 10246.94</small>&nbsp; Por</div>
							<h3>R$ 9200.00</h3>
										
					<div class="cx-botoes">
						<form id="form1" name="frmcarrinho" method="post" action="<?php echo URL_BASE ?>carrinho">
							<input name="txt_preco" 	type="hidden" id="txt_preco" value = "9200.00" />
							<input name="txt_qtde" 		type="hidden" id="txt_qtde" value = "1" />
							<input type="hidden" 		name="id_produto" value = "27"/>
							<input type="submit" 		name="imageField" class="bot-comprar" value="Comprar"  />
						</form>
						<div class="cx-frete"><b class="frete">FRETE</b><b class="val-frete">GRÁTIS</b></div>
					</div>
			</div>				
			<div class="caixa-prod-home quatro-colunas">
					<div class="cx-img">
						<a href="<?php echo URL_BASE ?>produto/&p=25"><img src="<?php echo URL_BASE ?>produtos/tablet_asus.jpg"></a>
					</div>
				<div class="limpar"></div>	
					<h2><a href="<?php echo URL_BASE ?>produto/&p=25">Tablet Asus Fonepad 7 8GB Wi Fi 3G Tela 7´ Android 4.4 Proc...</a></h2>
						<div class="prc-ant">De <small>R$ 5046.94</small>&nbsp; Por</div>
							<h3>R$ 9500.00</h3>
										
					<div class="cx-botoes">
						<form id="form1" name="frmcarrinho" method="post" action="<?php echo URL_BASE ?>carrinho">
							<input name="txt_preco" 	type="hidden" id="txt_preco" value = "9500.00" />
							<input name="txt_qtde" 		type="hidden" id="txt_qtde" value = "1" />
							<input type="hidden" 		name="id_produto" value = "25"/>
							<input type="submit" 		name="imageField" class="bot-comprar" value="Comprar"  />
						</form>
						<div class="cx-frete"><b class="frete">FRETE</b><b class="val-frete">GRÁTIS</b></div>
					</div>
			</div>				
		</div>
		</div>
		
</div>
</div>