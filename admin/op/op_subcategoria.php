<?php
ini_set('default_charset','UTF-8');
require_once '../../include/config.php';
require_once '../../include/crud.php';


@$id  = $_POST["id"];
@$acao = $_POST["acao"];
        
$txt_id_categoria = $_POST["txt_id_categoria"];
$txt_subcategoria = $_POST["txt_subcategoria"];
$txt_ativo = $_POST["txt_ativo"];


$dados = array(
    
    "id_categoria"       => $txt_id_categoria,
    "subcategoria"       => $txt_subcategoria,
    "ativo_subcategoria" => $txt_ativo
);

$op = false;
$url_sucesso = URL_ADMIN."index.php?link=4";
$url_erro = URL_ADMIN."index.php?link=5";

if($acao=="Cadastrar"){
$op = inserir("subcategoria", $dados);
}
elseif($acao=="Alterar"){
   $op = alterar("subcategoria", $dados, "id_subcategoria = $id");
}
elseif($acao=="Excluir"){
  $op = deletar("subcategoria", "id_subcategoria = $id");
}
if ($op){
    print "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url_sucesso'>
            <script type = 'text/javascript'> alert('Operação realizada com sucesso')</script>";
}

else{

print "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url_erro'>
            <script type = 'text/javascript'> alert('Operação realizada com sucesso')</script>"; 

}
    