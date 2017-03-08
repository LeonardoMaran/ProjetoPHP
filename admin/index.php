<!doctype html>
<?php 
	require("../include/config.php");
	require("../include/crud.php");
	require("../include/biblio.php");
	

?>
<html>
<head>
<meta charset="utf-8">
<title>Lojas Maran - área administrativa</title>

<link href="css/reset.css" rel="stylesheet" type="text/css">
<link href="css/estilo.css" rel="stylesheet" type="text/css">

<!--[if lte IE 8]>
<script type="text/javascript">
var htmlshim='abbr,article,aside,audio,canvas,details,figcaption,figure,footer,header,mark,meter,nav,output,progress,section,summary,time,video'.split(',');
var htmlshimtotal=htmlshim.length;
for(var i=0;i<htmlshimtotal;i++) document.createElement(htmlshim[i]);
</script>
<![endif]-->
  <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
 <script type="text/javascript" src="js/abas.js"></script>
 <script  src = "<?php echo URL_ADMIN ?>ckeditor/ckeditor.js" ></script> 
</head>


<body>
<!-- topo -->
	<?php include "cabecalho.php" ?>
	

<!-- meio -->
<div class="conteudo">
		<!--------------menu esquerdo---------------------->	
	<div class="base-esq">	
	<h1>PAINEL DE CONTROLE</h1>	
		<div class="lado-esq">
				<ul>
					<li><a href="index.php?link=1">Home</a></li>
					<li><a href="index.php?link=2">Categorias</a> </li>				
					<li><a href="index.php?link=4">Subcategorias</a> </li>
					<li><a href="index.php?link=6">Produtos</a> </li>
					
				</ul>
			
		</div>
	</div>
	
	<!--------------fecha menu esquerdo---------------------->
		
<div class="base-direita">
		 <?php 
                               @$link = $_GET["link"];
                               
                               $pag[1] = "home.php";
                               $pag[2] = "lst/lst_categoria.php";
                               $pag[3] = "frm/frm_categoria.php";
                               $pag[4] = "lst/lst_subcategoria.php";
                               $pag[5] = "frm/frm_subcategoria.php";
                               $pag[6] = "lst/lst_produto.php";
                               $pag[7] = "frm/frm_produto.php";
                               
                               if(!empty($link)){
					 if(file_exists ($pag[$link])){
					         include $pag[$link];
                                         }
						else {
						include "home.php";
                                                }	 	
							 }else{
					 include "home.php";
                                                         }
							   	 ?>
		
</div>
</div>
                    </td>
                            
                        </tr>
                    </table>
                </td>
            </tr>
            <tr><td colspan="2"><?php include 'rodape.php' ?></td></tr> 
        </table>
                </td>
            </tr>
        </table>
    </body>
</html>
