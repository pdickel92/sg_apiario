<?php

	if ($_SERVER['REQUEST_METHOD'] =="POST") //verifica se o metodo de recebimento é POST, ai deixa passar
	{
	 	 echo$cod_rainha        = $_POST["COD_RAINHA"];
		 echo$data_nasc		    = $_POST["ANO_NASC"];
		echo $desc	            = $_POST["desc"];
		 echo$situacao          = $_POST["situacao"];
    	 echo$origem		    = $_POST["origem"];
		 echo$obs               = $_POST["OBS"];

		
			//criei uma variavel para cada campo no meu BD
			
		 include("../../config_login.php");
	     //chamei por include o arquivo que faz conexão com o BD
		
		 // $atualiza recebe um código SQL
		 $alterar  = "UPDATE rainha SET ANO_NASC='$data_nasc',DESC_RAINHA='$desc',OBSERVACOES='$obs','',EST_RAINHA='$situacao',ORIG_RAINHA='$origem
		 WHERE COD_RAINHA='$cod_rainha'";
				
		 $alterou =  (mysqli_query($conecta,$alterar)); // $alterou, recebe $conectou que Abre o banco
		 if ($alterou ==1)
			{
				?>
				<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
				alert ("Registro alterado com sucesso!")
				</SCRIPT>
				<?php
			}
    }    
		else 
			{
				 ?>
				 <SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
				 alert ("Não foi possível alterar o registro!")
				 </SCRIPT>
				 <?php
				 exit;
			}
		 mysqli_close($conectou); //fecha a conexão com 	o BD
		 echo "<script>window.location='listar_usuarios.php';</script>";
		 ?>