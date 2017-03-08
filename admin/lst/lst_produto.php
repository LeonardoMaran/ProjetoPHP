	<!DOCTYPE html>	
        <?php
    @$ordem = $_GET["ordem"]?$_GET["ordem"]:0; 
    @$pesq = $_GET["pesq"]?$_GET["pesq"]:""; 
    @$campo = $_GET["campo"]?$_GET["campo"]:0; 
    ?>
        

<html lang="pt">
    <head>

        <meta charset="UTF-8">
        <title>MaranLoja</title>
    </head>
    <body>

<h1>Produto</h1>
	<div class="base-lista">
		<div class="cx-lista">
		<form action="index.php" method="get" name="buscausuario" id="buscausuario">
		  <table border="0">
			<tbody>
			  <tr>
				<th width="16%"><strong>Buscar:</strong></th>
				<th width="60%"><input type="text" name="pesq" value="<?php echo $pesq ?>"/></th>
				<th>
				<select name="campo">
				   
				  <option value="produto">Título</option>           
				  <option value="ativo_produto">Ativo (S ou N)</option>  
				   
				</select></th>
					<input type="hidden" name="link" value="6"  />
				<th><input type="submit" name="Submit" value="" class="but" /></th>
			  </tr>
			</tbody>
		  </table>
		</form>


		<h2>Lista de produto</h2>
		<a href="index.php?link=7">Cadastrar produto </a>
		<p class="limpar">&nbsp;</p>
		
                <?php 
        if(@$pesq != " "){
            $sql1 = " SELECT id_produto FROM produto WHERE $campo LIKE '%$pesq%' ";
            $sql2 = " SELECT * FROM categoria a, produto s where "
            . " a.id_categoria = s.id_categoria AND  $campo LIKE '%$pesq%' "; 
            $complemento = "&pesq=$pesq&campo=$campo";
        }else{
            $sql1 = " SELECT id_produto FROM produto ";
            $sql2 = " SELECT * FROM categoria a, produto s where a.id_categoria = s.id_categoria ";
            $complemento = "";
        }
        
        $total = total($sql1);
        echo "total: $total <br>";
            
        
        if($total <= 0) 
            echo "não existem dados cadastrados";
        else{ ?>
								
				<table width="100%" border="0" cellpadding="2" cellspacing="2">
				<tbody>
					<tr>
					  <td  align="center" class="tdbc">id</td>
					  <td  align="center" class="tdbc">produto</td>
					  <td  align="left" class="tdbc">Preço</td>
					  <td  align="center" colspan="2"  class="tdbc">Ação</td>
					</tr>
			
                                           <?php 
                    $lpp = 10;//linhas por pagina;
                    $inicio = $ordem * $lpp;      
                $produtos = selecionar($sql2."LIMIT $inicio, $lpp");
                  $i=1;
                    foreach ($produtos as $produto){
                        $i++;
                   if($i%2==0)
                       $col="coluna1";
                   else
                       $col="coluna2";
             ?>
                                        
                                        
                                        
	<tr class="<?php echo $col?>" >
	<td align="center"><?php echo $produto["id_produto"] ?></td>
	 <td   ><?php echo $produto["produto"] ?> </td>
         <td  ><?php echo $produto["id_produto"] ?></td>
	  <td   align="left"><?php echo $produto["ativo_produto"] ?></td>
	 <td  align="center"><a href="index.php?link=7&acao=Alterar&id=<?php echo $produto["id_produto"] ?>">Editar</a></td>
	 <td align="center"><a href="index.php?link=7&acao=Excluir&id=<?php echo $produto["id_produto"] ?>"class="excluir">Excluir</a></td>			
	</tr>
		<?php }}?>
					
				</tbody>
			</table>
		
		<div class="cx-paginacao">
	<p><?php echo mostraPaginacao("index.php?link=6$complemento", $ordem, $lpp, $total)?></p>
		</div>

		<p>&nbsp;</p>
		<p>&nbsp;</p>

	</div>
	</div>	

  </body>
</html>
