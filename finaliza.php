<?php 
	session_start();
if ($_SESSION[cliente][NOME]== null){
  	echo "<META HTTP-EQUIV=REFRESH CONTENT= '0;URL=index.php?link=4&pagina=13'>";}
	
	$sql = mysql_query ("SELECT * FROM configuracao");
	$linha = mysql_fetch_array($sql); 
	
	$nome 		= $linha[Nome_empresa];
	$endereco 	= $linha[endereco];
	$bairro 	= $linha[Bairro];
	$cidade 	= $linha[cidade];
	$cep 		= $linha[CEP];
	$uf 		= $linha[UF];
	$fone 		= $linha[Fone];
	$cnpj 		= $linha[CNPJ];
	$titulo 	= $linha[Titulo_site];
	$email 		= $linha[email_site];




?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style type="text/css">
<!--
.style4 {font-size: 18px}
.style5 {
	color: #FFFFFF;
	font-weight: bold;
}
.style6 {	color: #003366;
	font-weight: bold;
}
.style7 {
	color: #FF0000;
	font-size: 18px;
	font-style: italic;
}
.style8 {
	color: #FF0000;
	font-weight: bold;
	font-style: italic;
}
.style10 {font-size: 12px}
.style11 {
	color: #333333;
	font-weight: bold;
}
.style13 {color: #FF0000; font-size: 18px; font-style: italic; font-weight: bold; }
.style14 {
	font-size: 16px;
	font-weight: bold;
}
-->
</style>
</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td colspan="7"><img src="imagens/img_carrinho3.jpg" width="580" height="30" /></td>
        <tr>
        <td colspan="7"><img src="imagens/barra.gif" width="100%" height="5" /></td>
        <tr>
        <td colspan="5">&nbsp;</td>
        <td colspan="2">&nbsp;</td>
      <tr>
        <td colspan="3">Compra de:
          <?php  echo $_SESSION[cliente][NOME]; ?></td>
        <td>&nbsp;</td>
        <td colspan="3"><div align="right"><span class="style10">Data</span>:          
          <?php  echo inteiro_data($data); ?>
        </div></td>
        <tr>
        <td colspan="7"><img src="imagens/barra.gif" width="100%" height="5" /></td>
      </tr>
      <tr>
        <td class="fundo" colspan="7"><table width="100%" border="0" cellspacing="2" cellpadding="2">
          <tr>
            <td colspan="5"><span class="style6">DADOS PARA ENTREGA </span></td>
          </tr>
          <tr>
            <td width="9%">Endere&ccedil;o: </td>
            <td width="51%" class="lado2"><?php  echo $_SESSION[cliente][ENDERECO]; ?></td>
            <td width="2%">&nbsp;</td>
            <td width="8%">Cep: </td>
            <td width="30%" class="lado2"><?php  echo $_SESSION[cliente][CEP]; ?></td>
          </tr>
          <tr>
            <td>Bairro: </td>
            <td class="lado2"><?php  echo $_SESSION[cliente][BAIRRO]; ?></td>
            <td>&nbsp;</td>
            <td>Telefone: </td>
            <td class="lado2"><?php  echo $_SESSION[cliente][FONE]; ?></td>
          </tr>
          <tr>
            <td>Cidade: </td>
            <td class="lado2"><?php  echo $_SESSION[cliente][CIDADE]; ?></td>
            <td>&nbsp;</td>
            <td>UF: </td>
            <td class="lado2"><?php  echo $_SESSION[cliente][UF]; ?></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td colspan="7"><img src="imagens/barra.gif" width="100%" height="5" /></td>
      </tr>
      <tr>
        <td colspan="7"><br />
          <img src="imagens/dados_compra.jpg" height="38" /></td>
      </tr>
      <tr>
        <td class="lado1" colspan="7"><table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
          <tr class="bold">
            <td width="62%" bordercolor="#000000">Produto</td>
            <td width="9%">Qtde</td>
            <td width="12%">Valor</td>
            <td width="17%">Subtotal</td>
          </tr>
          <?php  
		  
		  	$sql = mysql_query("select p.*, c.* from produtos p, carrinho c where p.id_produto = c.id_produto and c.id_pedido ='".$_SESSION["id_pedido"]."'");
			  $total= 0;
			  $i=0;
			  while ($coluna = mysql_fetch_array($sql)) { 
			  $i++;
			  	$subtotal 	 = $coluna[preco]* $coluna[qtde] ;
				$total 		 = $total + $subtotal;
				$codprod[$i] = $coluna[id_produto];
					

			  ?>
          <tr>
            <td class="linha"><?php  echo $coluna[produto]; ?></td>
            <td class="linha"><?php  echo $coluna[qtde]; ?></td>
            <td class="linha">R$
              <?php  echo number_format($coluna[preco],2,',','.'); ?></td>
            <td class="linha">R$
              <?php  echo number_format($subtotal,2,',','.'); ?></td>
          </tr>
          <?php  } ?>
        </table></td>
      </tr>
      <tr>
        <td colspan="4">&nbsp;</td>
        <td width="18%"><div align="left">Total a pagar </div></td>
        <td colspan="2"><span class="style7">R$ 
          <?php  echo number_format($total,2,',','.'); ?>
        </span></td>
      </tr>
      <tr>
        <td colspan="4">&nbsp;</td>
        <td>&nbsp;</td>
        <td colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="7" bgcolor="#FFFFFF"><div align="center" class="style5" >
          <div align="left"><img src="imagens/formapagamento.jpg" /></div>
        </div></td>
        </tr>
      <tr>
        <td colspan="7" class="lado2"><span class="style11">1 - <span class="style4">Deposito ou transfer&ecirc;ncia banc&aacute;ria(10% de desconto) </span></span></td>
        </tr>
      <tr>
        <td colspan="7">&nbsp;</td>
        </tr>
      <tr>
        <td width="33%"><img src="imagens/depositos.jpg" width="200" height="150" /></td>
        <td colspan="2"><img src="imagens/bb.jpg" width="50" height="50" /></td>
        <td width="14%"><img src="imagens/banco_itau.jpg" width="55" height="52" /></td>
        <td align="center"><img src="imagens/bradesco.jpg" width="67" height="55" /></td>
        <td colspan="2"><img src="imagens/bb.jpg" width="50" height="50" /></td>
      </tr>
      <tr>
        <td colspan="7"><img src="imagens/barra.gif" width="100%" height="5" /></td>
        </tr>
      <tr>
        <td><span class="style10">Total</span>:  <span class="style13">R$
            <?php  echo number_format($total,2,',','.'); ?>
        </span></td>
        <td width="5%"><span class="style10">Desconto</span></td>
        <td width="13%"><span class="style13">R$
            <?php  echo number_format($total*0.1 ,2,',','.'); ?>
                </span></td>
        <td colspan="2"><div align="right"><span class="style10">Valor a depositar/transferir </span></div></td>
        <td width="3%">&nbsp;</td>
        <td width="14%"><span class="style8">R$ <span class="style4">
        <?php  echo number_format($total-$total*0.1 ,2,',','.'); ?>
        </span></span></td>
      </tr>
      <tr>
        <td colspan="7"><img src="imagens/barra.gif" width="100%" height="5" /></td>
      </tr>
      <tr>
        <td class="fundo"colspan="7"><table width="100%" border="0" cellspacing="2" cellpadding="0">
          <tr>
            <td width="24%" class="texto"><p><strong>BANCO DO BRASIL </strong></p>
                <p><strong>Ag&ecirc;ncia</strong>: 1613-6 <br />
                    <strong>Conta</strong>: xxxxxx <br />
                  Leonardo Gustavo Maran</p></td>
            <td width="22%" class="texto"><p><strong>BANCO DO BRASIL </strong></p>
                <p><strong>Ag&ecirc;ncia</strong>:xxxxxx<br />
                    <strong>Conta</strong>: xxxxxxxx <br />
                  Intelimax comercio Ltda </p></td>
            <td width="25%" class="texto"><p><strong>BANCO ITA&Uacute; </strong></p>
                <p><strong>Ag&ecirc;ncia</strong>: 0365 <br />
                    <strong>Conta</strong>: 77201-1 <br />
                 Leonardo Gustavo Maran</p></td>
            <td width="29%" class="texto"><p><strong>BANCO BRADESCO </strong></p>
                <p><strong>Ag&ecirc;ncia</strong>: xxxxxx<br />
                    <strong>Conta</strong>: xxxxxx<br />
                  Leonardo Gustavo Maran</p></td>
          </tr>
          <tr>
            <td colspan="4">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="4" align="center" class="linha"><strong>PROCEDIMENTO PARA COMPRA</strong></td>
          </tr>
          <tr>
            <td colspan="4" align="center" class="c_linha">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="4" class="c_linha"> </td>
          </tr>
        </table></td>
        </tr>
      <tr>
        <td colspan="7"><div align="center"><a href="index.php?link=15&id_pedido=<?php echo $_SESSION["id_pedido"] ?>"><img src="imagens/finaliza.gif" width="300" height="26" border="0" /></a></div></td>
        </tr>
      <tr>
        <td colspan="7"><div align="center"></div></td>
        </tr>
      <tr>
        <td colspan="7">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="7"><strong></strong></td>
      </tr>
      <tr>
        <td colspan="7">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="7">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="7"><form id="form1" name="form1" method="post" action="boleto.php?banco=brasil">
          <input type="image" name="imageField" src="imagens/boleto.jpg" />
          <input name="cliente" type="hidden" id="cliente" value="<?php  echo $_SESSION[cliente][NOME]; ?>" />
          <input name="valor" type="hidden" id="valor" value="<?php  echo number_format($total,2,',','.'); ?>" />
          <input name="endereco" type="hidden" id="endereco" value="<?php  echo $_SESSION[cliente][ENDERECO]; ?>" />
          <input name="cidade" type="hidden" id="cidade" value="<?php  echo $_SESSION[cliente][CIDADE]; ?>" />
        </form>          <a href="boleto.php?banco=brasil"></a></td>
      </tr>
      <tr>
        <td colspan="7">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="7">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="7" class="lado2"><span class="style14">2 - Cart&atilde;o de Cr&eacute;dito ou Boleto Banc&aacute;ria - Pagseguro (sem desconto) </span></td>
      </tr>
      <tr>
        <td colspan="7" class="lado2"><p align="justify">.</p>
          <p align="justify">.</p></td>
      </tr>
      <tr>
        <td colspan="7">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="7"><div align="justify">
		
		
<form target="PagSeguro" action=method="post" />
<input type="hidden" name="email_cobranca" value="mjailton@gmail.com" />
<input type="hidden" name="tipo" value="CP" />
<input type="hidden" name="moeda" value="BRL" />

<?php  
		  
		  	$sql = mysql_query("select p.*, c.* from produtos p, carrinho c where p.id_produto = c.id_produto and c.id_pedido ='".$_SESSION["id_pedido"]."'");			  
			  $cod=0;
			  while ($coluna = mysql_fetch_array($sql)) {
				  
$cod++; 
$item_id	= "item_id_".$cod;
$item_descr	= "item_descr_".$cod;
$item_quant	= "item_quant_".$cod;
$item_valor	= "item_valor_".$cod;
$item_frete	= "item_frete_".$cod;
$item_peso	= "item_peso_".$cod;
 
		  ?>  		  
  
 
<input type="hidden" name="<?php echo $item_id;  ?>" value="<?php    echo $coluna[id_produto];  ?>" />
<input type="hidden" name="<?php echo $item_descr; ?>" value="<?php  echo $coluna[produto];  ?>" />
<input type="hidden" name="<?php echo $item_quant; ?>" value="<?php  echo $coluna[qtde];  ?>" />
<input type="hidden" name="<?php echo $item_valor; ?>" value="<?php  echo $coluna[preco]*100; ?>" />
<input type="hidden" name="<?php echo $item_frete; ?>" value="0" />
<input type="hidden" name="<?php echo $item_peso; ?>" value="0" />
<?php  } ?>
<input type="hidden" name="tipo_frete" value="EN" />

<input type="hidden" name="cliente_nome" value="<?php  echo $_SESSION[cliente][NOME]; ?>" />
<input type="hidden" name="cliente_cep" value="<?php  echo $_SESSION[cliente][CEP]; ?>" />
<input type="hidden" name="cliente_end" value="<?php  echo $_SESSION[cliente][ENDERECO]; ?>" />
<input type="hidden" name="cliente_num" value="" />
<input type="hidden" name="cliente_compl" value="" />
<input type="hidden" name="cliente_bairro" value="<?php  echo $_SESSION[cliente][BAIRRO]; ?>" />
<input type="hidden" name="cliente_cidade" value="<?php  echo $_SESSION[cliente][CIDADE]; ?>" />
<input type="hidden" name="cliente_uf" value="<?php  echo $_SESSION[cliente][UF]; ?>" />
<input type="hidden" name="cliente_pais" value="BRA" />
<input type="hidden" name="cliente_ddd" value="" />
<input type="hidden" name="cliente_tel" value="<?php  echo $_SESSION[cliente][FONE]; ?>" />
<input type="hidden" name="cliente_email" value="<?php  echo $_SESSION[cliente][EMAIL]; ?>" />
 
<input type="image" src= name="submit" alt= />
</form>		
		
		
		</div></td>
        </tr>
      <tr>
        <td colspan="7">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="7">&nbsp;</td>
      </tr>
    </table>


	<p>&nbsp;</p></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>

<?php  
 function inteiro_data($data){
 	if ($data != ""){
	$data = substr($data,6,2)."/".substr($data,4,2)."/".substr($data,0,4);
	return $data;
	}
 }
?>
