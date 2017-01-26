<?php
function GerarPergunta($id){
	include("conectar.php");
	
	$resposta = array();
	$id = mysqli_real_escape_string($conexao,$id);
	
	//Buscar Pergunta no banco
	
	$query = mysqli_query($conexao,"SELECT * FROM Pergunta WHERE idPergunta = ".$id."") or die(mysqli_error($conexao));
	
	//faz um looping e cria um array com os campos da consulta
	while($dados = mysqli_fetch_array($query))
	{
		$resposta[] = array('idPergunta' => $dados['idPergunta'],
							'Pergunta' =>	$dados['Pergunta']	); 
	}
	return $resposta;	
}
?>