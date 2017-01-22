<?php
function mensagens($codigo){
	$mensagens = array(
					array(
						"Codigo"=>1
						,"Mensagem"=>"Caminho especificado nao encontrado"
					)
					,array(
						"Codigo"=>2
						,"Mensagem"=>"Nenhum dado recebido"
					)
					,array(
						"Codigo"=>3
						,"Mensagem"=>"Estrutura de dados diferente do esperado"
					)
					,array(
						"Codigo"=>4	
						,"Mensagem"=>"Obrigado pela sua resposta!"
					)
					,array(
						"Codigo"=>5	
						,"Mensagem"=>"Código inválido"
					)
				 );
	$retorno = array();
	//Busca pelo erro com o codigo informado de parâmetro
	foreach($mensagens as $item){
		if($item["Codigo"] == $codigo){
			$retorno = $item;
			break;
		}
	}
	return $retorno;
}
?>