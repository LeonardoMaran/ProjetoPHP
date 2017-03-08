<?php
    if((@$idCliente =="") || (is_null(@$idCliente))){
        $url = URL_BASE."nao-logado";
        echo "<script languague='javaScript'> window.location='$url'</script>";
        
    }
    
if(@$idPedido !=""){
?>
<div class="conteudo margin-topo">
	<!-- menu lateral-->
	<?php include"menu-lateral.php"?>
	
	<div class="lado-dir">
	<title class="migalha">Confirme seu pedido</title>
	<div class="base-cadastro dados-cliente">
		
		<form action="op_cliente.php" method="post">
		<h1><span>Dados para Entrega</span></h1>	
		
<div class="caixa-carrinho clientes">			
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<thead>
	  <tr>
		<th align="center">Nome</th>
		<th align="center">Email</th>
		<th align="center">Endereço</th>
		<th align="center">Bairro</th>
		<th align="center">CEP</th>
		<th align="center">Cidade</th>
		<th align="center">Telefone</th>
		<th align="center">UF</th>
	  </tr>
	  </thead>
	  <tbody>
	  <tr>
		<td><?php echo @$_SESSION["LJCLIENTE"]["cliente"] ?></td>
		<td><?php echo @$_SESSION["LJCLIENTE"]["email"] ?></td>
		<td><?php echo @$_SESSION["LJCLIENTE"]["endereco"] ?></td>
		<td><?php echo @$_SESSION["LJCLIENTE"]["bairro"] ?></td>
		<td><?php echo @$_SESSION["LJCLIENTE"]["cep"] ?></td>
		<td><?php echo @$_SESSION["LJCLIENTE"]["cidade"] ?></td>
		<td><?php echo @$_SESSION["LJCLIENTE"]["fone1"] ?></td>
		<td><?php echo @$_SESSION["LJCLIENTE"]["uf"] ?></td>
	  </tr>
	  <tr>
	    <td colspan="8" align="right"><a href="<?php echo URL_BASE ?>cadastro" class="botao">Alterar dados</a></td>
	    </tr>
	  </tbody>
</table>
</div>			
			
	</form>
	</div>	
	<div class="limpar"></div>
<title class="migalha">Lista de Produtos do seu Carrinho</title>
<div class="base-carrinho lista-carrinho">
			<p>&nbsp;</p>

<div class="caixa-carrinho lista">			
<form action="index.php?link=8" method="post">

<div class="caixa-carrinho">
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
                $somaTotal = 0;
                $i=0;
                $lst_carinhho = consultar("carrinho c, produto p "," c.id_produto = p.id_produto and  id_pedido = $idPedido ");
                foreach ($lst_carinhho as $carrinho){
                    $subTotal  = $carrinho['valor'] * $carrinho['qtde'];                   
                    $somaTotal = $somaTotal + $subTotal;                  
                    
                ?>
	 	  <tr>
		<td><img src="<?php echo URL_BASE ?>produtos/<?php echo $carrinho["imagem"] ?>" title="<?php echo $carrinho["produto"] ?>" ><?php echo $carrinho["produto"] ?></td>
		<td ><input type="Number" name="textfield" id="textfield"   class="cont"/></td>
		<td> <h3>R$ <?php echo $carrinho['valor']?> </h3></td>
		<td><h3>R$ <?php echo $carrinho['valor'] * $carrinho['qtde'] ?></h3></td>
		</tr>
	  	<?php }?> 
	  	
	</tbody>
</table>
 

    <h3 class="total">Valor Total:  R$ <span id="valorcompra"> <?php echo $somaTotal ?></span></h3>
	<h3 class="total" >
            <form>
                Tipo
                <select id="tipoServico">
                    <option value="40010">SEDEX </option>
                    <option value="41106">PAC </option>
                    <option value="40045">SEDEX a Cobrar </option>
                    <option value="40215">SEDEX 10 </option>
                    <option value="40290">SEDEX Hoje </option>
                </select>
                Cep: <input type="text" id="cep" value="<?php echo @$_SESSION["LJCLIENTE"]["cep"] ?>">
                <input type="button" value="calcular" id="btnfrete"> 
            </form>
            Frete:  <span id="valorfrete">R$ 0,00</span></h3>
            <h3 class="total" >Soma Total:  <span id="valortotal"> <?php echo "R$ " .$somaTotal ?></span></h3>
	
</form>	
</div>
		
<div class="forma-pagamento lista">
<title class="migalha">Formas de pagamento</title>
<div id="caixa">
			<p id="abas">
				<a href="#aba1" class="selected">Transferência/Depósito</a>
				<a href="#aba2">Pagseguro</a>
								
			</p>

			<ul id="conteudos" class="descricao">	
                            
                            <li id="aba1">
					<strong>DEPÓSITO BANCÁRIO</strong>
					<small>Escolha uma das nossas contas abaixo para realizar o deposito.</small>
					<div class="contas">
						<figure>
							<img src="imagens/img-bb.png">
							<strong>BANCO DO BRASIL</strong> 
							<span>Agência: xxxxx </span> 
							<span>Conta: xxxxx </span> 
							<span>Leonardo Gustavo Maran</span>
						</figure>
						<figure>
							<img src="imagens/img-bi.png">
							<strong>BANCO ITAÚ  </strong> 
							<span>Agência: xxxxx </span> 
							<span>Conta: xxxxx </span>  
							<span>Leonardo Gustavo Maran</span> 
						</figure>
						<figure>
							<img src="imagens/img-bc.png">
							<strong>CAIXA ECONÔMICA </strong>
							<span>Operação: 013 </span> 
							<span>Agência: xxxxx</span> 
							<span>Poupança: xxxxx </span>  
							<span>Leonardo Gustavo Maran</span>  
						</figure>
						<figure>
							<img src="imagens/img-bbd.png">
							<strong>BANCO BRADESCO </strong>
							<span>Agência: xxxxx </span> 
							<span>Conta: xxxxx </span> 
							<span>Leonardo Gustavo Maran</span>
						</figure>
					</div>
					<a href="<?php echo URL_BASE ."transferencia" ?>" class="paypal">Finalizar Pedido</a>
				</li>
				<li id="aba2">
					<strong>COMPRAR PELO PAGSEGURO</strong>
					<small>Ao clicar no botão abaixo você será redirecionado ao site do pagseguro para realizar o pagamento.</small>
					<a href="<?php echo URL_BASE."pagseguro.php?idCli=$idCliente&idPed=$idPedido" ?>" class="paypal">Finalizar compra pelo PAGSEGURO</a>
					<div class="bandeiras"></div>
				</li>
				
				
				
			</ul>
		</div>
</div>
	</div>
	</div>
</div>
<?php } else {  ?>
        
        <div class="conteudo margin-topo">
	<!-- menu lateral-->
	<?php include"menu-lateral.php"?>
	
	<div class="lado-dir">
	<title class="migalha">Carrinho/ vazio</title>
			
		<!---- carrinho vazio-------->
		<div class="base-carrinho">
			<div class="vazio">
			<img src="<?php echo URL_BASE ."imagens/img-carrinho-vazio.png" ?>">
			<span>
			<h2>Seu carrinho está vazio</h2>
			<a href="<?php echo URL_BASE ?>">Voltar para página inicial</a>
			</span>
			</div>
		</div>
		
</div>
		
</div>
<?php } ?>
</div>

