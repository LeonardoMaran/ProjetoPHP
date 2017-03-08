<!DOCTYPE html>
<?php
    @$id  = (int) $_GET["id"];
    @$acao = $_GET["acao"];
    
    if($id){
        
        $categoria = consultar("categoria", "id_categoria = $id");
        $txt_slug_categoria = $categoria[0]["slug_categoria"];
        $txt_categoria = $categoria[0]["categoria"];
        $txt_ativo     = $categoria[0]["ativo_categoria"];
        
    }
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h2>Cadastro de Categoria</h2>
		<div class="cx-form">
		<div class="cx-pd">			

<form action="op/op_categoria.php" method="post">
		 
	
  <label>
	<strong>Categoria</strong>
    <input type="text" name="txt_categoria" id="txt_categoria" value="<?php echo @$txt_categoria?>" size="110">
  </label>
    
      <label>
	<strong>Slug categoria</strong>
    <input type="text" name="txt_slug_categoria" id="txt_slug_categoria" value="<?php echo @$txt_slug_categoria?>" size="110">
  </label>
  
  
<label>
	<strong>Ativo</strong>
	<select name="txt_ativo" class="tm3">
		<option value="<?php echo @$txt_ativo?>" >Sim</option>
		<option value="<?php echo @$txt_ativo?>" >Não</option>
  </select>
 
</label>

	
		<label>
		<div class="cx-but">
			<input type="hidden" name ="id" value="<?php echo @$id?>">							
			<input type="hidden" name ="acao" value="<?php echo ($acao!='')?$acao:'Cadastrar' ?>">										
			<input type="submit" name= "logar" id="logar" value = "<?php echo ($acao!='')?$acao:"Cadastrar"?>" class="but" >	
		</div>
		</label>
</form>

		</div>
		</div>	
        
         </body>
</html>