

<?php
    ini_set('default_charset','UTF-8');
    require_once '../../include/config.php';
    require_once '../../include/crud.php';
    require_once '../../include/biblio.php';
    header("Content-type: text/html; charset = utf-8 ");
    
    @$id  =(int) $_POST["id"];
    @$acao = $_POST["acao"];
    
    
    $nome_arquivo = $_FILES["arquivo"]["name"];
    $tam_arquivo = $_FILES["arquivo"]["size"];
    $nome_temp = $_FILES["arquivo"]["tmp_name"];
    
    $txt_imagem = $_POST["txt_imagem_produto"];
    $extensoes = array(".gif",".png",".jpg");
    $extensao = strrchr($nome_arquivo, ".");
    $caminho_absoluto = "C:\nwxampp7.0\htdocs\lojaoficial2\produtos";
    //$nome_arquivo = md5(time()).$extensao;

if(!empty($nome_arquivo)) {
    if(!in_array($extensao, $extensoes))
      die("Este arquivo não é permitido");
    else{
     
    }
    if(move_uploaded_file($nome_temp, $caminho_absoluto."/".$nome_arquivo))
                $txt_imagem = $nome_arquivo;
 else {
            die("erro no upload da imagem");  
            }
    }

    $dados = array(
        
        "id_categoria"    => trim($_POST["txt_id_categoria"]),
        "id_subcategoria" => trim($_POST["txt_id_subcategoria"]),
        "id_fabricante"   => trim($_POST["txt_id_fabricante"]),
        "ativo_produto"   => trim($_POST["txt_ativo"]),
        "produto"         => trim($_POST["txt_produto"]),
        "imagem"          => trim($txt_imagem),
        "preco_alto"      => trim($_POST["txt_preco_alto"]),
        "preco"           => trim($_POST["txt_preco"]),
        "descricao"       => trim($_POST["txt_descricao"]),
        "detalhes"        => trim($_POST["txt_detalhes"]),
        "destaque"        => trim($_POST["txt_destaque"])
    );
    
    $op = false;
    $url_sucesso = URL_ADMIN. "index.php?link=6";
    $url_erro = URL_ADMIN. "index.php?link=7";
    

if($acao=="Cadastrar"){
$op = inserir("produto", $dados);
}
elseif($acao=="Alterar"){
   $op = alterar("produto", $dados, "id_produto= $id");
}
elseif($acao=="Excluir"){
  $op = deletar("produto", "id_produto = $id");
}
if ($op){
    print "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url_sucesso'>
            <script type = 'text/javascript'> alert('Operação realizada com sucesso')</script>";
}

else{

print "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$url_erro'>
            <script type = 'text/javascript'> alert('Operação realizada com sucesso')</script>"; 

}
?>
   
    