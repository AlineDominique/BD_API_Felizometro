<?php
function InsereRespPositivo(){
	
	//Recupera conteudo recebido na request
	$conteudo = file_get_contents("php://input");
	$resposta = array();
	//Verifica se o conteudo foi recebido
	if(empty($conteudo)){
		$resposta = mensagens(2);
	}
	else{
		//Converte o json recebido pra array
		$dados = json_decode($conteudo,true);
		
		//Verifica se as infromações esperadas foram recebidas
		if(!isset($dados["Data"]) || !isset($dados["idPergunta"]))
		{
			$resposta = mensagens(3);
		}
		else{
			include("conectar.php");
			
			//Evita SQL injection
			$Data = mysqli_real_escape_string($conexao,$dados["Data"]);
			$idPergunta = mysqli_real_escape_string($conexao,$dados["idPergunta"]);
			
			// Verifica se já  existe pergunta na tabela resposta na data informada
			$cont = 0;
			$query = mysqli_query($conexao, "SELECT idResposta FROM Resposta WHERE idPergunta = ".$idPergunta." AND Data = ".$Data."ORDER BY idResposta DESC LIMIT 1") or die(mysqli_error($conexao));
			while($dados = mysqli_fetch_array($query)){
				$cont++;
				$idResposta = $dados["idResposta"];
			}
			
			if ($cont == 0){
				//Recupera idResposta para incrementar 1
				$idResposta = 0;
				$query = mysqli_query($conexao, "SELECT idResposta FROM Resposta ORDER BY idResposta DESC LIMIT 1") or die(mysqli_error($conexao));
				while($dados = mysqli_fetch_array($query)){
					$idResposta = $dados["idResposta"];
				}
				$idResposta++;
				include("conectar.php");
				
				//Insere Resposta
				$query = mysqli_query($conexao,"INSERT INTO Resposta VALUES(" .$idResposta .",'" .$Data ."',1,0,0,".$idPergunta.")") or die(mysqli_error($conexao));
				$resposta = mensagens(4);
				
			} 
			else{
				include("conectar.php");
								
				$update = "UPDATE Resposta SET respPositivo = (respPositivo + 1) WHERE idResposta = ".$idResposta;
								
				//Atualiza Professor no banco
				$query = mysqli_query($conexao, $update) or die(mysqli_error($conexao));
				$resposta = mensagens(4);
			}
		}
	}
	return $resposta;
}
function InsereRespNegativo(){
	
	//Recupera conteudo recebido na request
	$conteudo = file_get_contents("php://input");
	$resposta = array();
	//Verifica se o conteudo foi recebido
	if(empty($conteudo)){
		$resposta = mensagens(2);
	}
	else{
		//Converte o json recebido pra array
		$dados = json_decode($conteudo,true);
		
		//Verifica se as infromações esperadas foram recebidas
		if(!isset($dados["Data"]) || !isset($dados["idPergunta"]))
		{
			$resposta = mensagens(3);
		}
		else{
			include("conectar.php");
			
			//Evita SQL injection
			$Data = mysqli_real_escape_string($conexao,$dados["Data"]);
			$idPergunta = mysqli_real_escape_string($conexao,$dados["idPergunta"]);
			
			// Verifica se já  existe pergunta na tabela resposta na data informada
			$cont = 0;
			$query = mysqli_query($conexao, "SELECT idResposta FROM Resposta WHERE idPergunta = ".$idPergunta." AND Data = ".$Data."ORDER BY idResposta DESC LIMIT 1") or die(mysqli_error($conexao));
			while($dados = mysqli_fetch_array($query)){
				$cont++;
				$idResposta = $dados["idResposta"];
			}
			
			if ($cont == 0){
				//Recupera idResposta para incrementar 1
				$idResposta = 0;
				$query = mysqli_query($conexao, "SELECT idResposta FROM Resposta ORDER BY idResposta DESC LIMIT 1") or die(mysqli_error($conexao));
				while($dados = mysqli_fetch_array($query)){
					$idResposta = $dados["idResposta"];
				}
				$idResposta++;
				include("conectar.php");
				
				//Insere Resposta
				$query = mysqli_query($conexao,"INSERT INTO Resposta VALUES(" .$idResposta .",'" .$Data ."',0,1,0,".$idPergunta.")") or die(mysqli_error($conexao));
				$resposta = mensagens(4);
				
			} 
			else{
				include("conectar.php");
								
				$update = "UPDATE Resposta SET respNegativo = (respNegativo + 1) WHERE idResposta = ".$idResposta;
								
				//Atualiza Professor no banco
				$query = mysqli_query($conexao, $update) or die(mysqli_error($conexao));
				$resposta = mensagens(4);
			}
		}
	}
	return $resposta;
}
function InsereRespNeutro(){
	
	//Recupera conteudo recebido na request
	$conteudo = file_get_contents("php://input");
	$resposta = array();
	//Verifica se o conteudo foi recebido
	if(empty($conteudo)){
		$resposta = mensagens(2);
	}
	else{
		//Converte o json recebido pra array
		$dados = json_decode($conteudo,true);
		
		//Verifica se as infromações esperadas foram recebidas
		if(!isset($dados["Data"]) || !isset($dados["idPergunta"]))
		{
			$resposta = mensagens(3);
		}
		else{
			include("conectar.php");
			
			//Evita SQL injection
			$Data = mysqli_real_escape_string($conexao,$dados["Data"]);
			$idPergunta = mysqli_real_escape_string($conexao,$dados["idPergunta"]);
			
			// Verifica se já  existe pergunta na tabela resposta na data informada
			$cont = 0;
			$query = mysqli_query($conexao, "SELECT idResposta FROM Resposta WHERE idPergunta = ".$idPergunta." AND Data = ".$Data."ORDER BY idResposta DESC LIMIT 1") or die(mysqli_error($conexao));
			while($dados = mysqli_fetch_array($query)){
				$cont++;
				$idResposta = $dados["idResposta"];
			}
			
			if ($cont == 0){
				//Recupera idResposta para incrementar 1
				$idResposta = 0;
				$query = mysqli_query($conexao, "SELECT idResposta FROM Resposta ORDER BY idResposta DESC LIMIT 1") or die(mysqli_error($conexao));
				while($dados = mysqli_fetch_array($query)){
					$idResposta = $dados["idResposta"];
				}
				$idResposta++;
				include("conectar.php");
				
				//Insere Resposta
				$query = mysqli_query($conexao,"INSERT INTO Resposta VALUES(" .$idResposta .",'" .$Data ."',0,0,1,".$idPergunta.")") or die(mysqli_error($conexao));
				$resposta = mensagens(4);
				
			} 
			else{
				include("conectar.php");
								
				$update = "UPDATE Resposta SET respNeutro = (respNeutro + 1) WHERE idResposta = ".$idResposta;
								
				//Atualiza Professor no banco
				$query = mysqli_query($conexao, $update) or die(mysqli_error($conexao));
				$resposta = mensagens(4);
			}
		}
	}
	return $resposta;
}

function DiaMaisFeliz(){
	include("conectar.php");
	
	$resposta = array();
	$id = mysqli_real_escape_string($conexao,$id);
	
	//Consulta Respostas no banco
	
	$query = mysqli_query($conexao,"SELECT Data,sum(respPositivo) as qtd FROM Resposta GROUP BY Data ORDER BY qtd DESC LIMIT 1") or die(mysqli_error($conexao));
	
	//faz um looping e cria um array com os campos da consulta
	while($dados = mysqli_fetch_array($query))
	{
		$resposta[] = array('Data' => $dados['Data'],
							'qtd' => $dados['qtd']); 
	}
	return $resposta;	
}
function DiaMaisInFeliz(){
	include("conectar.php");
	
	$resposta = array();
	$id = mysqli_real_escape_string($conexao,$id);
	
	//Consulta Respostas no banco
	
	$query = mysqli_query($conexao,"SELECT Data,sum(respNegativo) as qtd FROM Resposta GROUP BY Data ORDER BY qtd DESC LIMIT 1") or die(mysqli_error($conexao));
	
	//faz um looping e cria um array com os campos da consulta
	while($dados = mysqli_fetch_array($query))
	{
		$resposta[] = array('Data' => $dados['Data'],
							'qtd' => $dados['qtd']); 
	}
	return $resposta;	
}
function DiaMaisNeutro(){
	include("conectar.php");
	
	$resposta = array();
	$id = mysqli_real_escape_string($conexao,$id);
	
	//Consulta Respostas no banco
	
	$query = mysqli_query($conexao,"SELECT Data,sum(respNeutro) as qtd FROM Resposta GROUP BY Data ORDER BY qtd DESC LIMIT 1") or die(mysqli_error($conexao));
	
	//faz um looping e cria um array com os campos da consulta
	while($dados = mysqli_fetch_array($query))
	{
		$resposta[] = array('Data' => $dados['Data'],
							'qtd' => $dados['qtd']); 
	}
	return $resposta;	
}
function IntervaloData(){
	
	//Recupera conteudo recebido na request
	$conteudo = file_get_contents("php://input");
	$resposta = array();
	//Verifica se o conteudo foi recebido
	if(empty($conteudo)){
		$resposta = mensagens(2);
	}
	else{
		//Converte o json recebido pra array
		$dados = json_decode($conteudo,true);
		
		//Verifica se as infromações esperadas foram recebidas
		if(!isset($dados["DataInicial"]) || !isset($dados["DataFinal"]))
		{
			$resposta = mensagens(3);
		}
		else{
			include("conectar.php");
			
			//Evita SQL injection
			$DataInicial = mysqli_real_escape_string($conexao,$dados["DataInicial"]);
			$DataFinal = mysqli_real_escape_string($conexao,$dados["DataFinal"]);
						
			//Consulta Respostas no banco
			$query = mysqli_query($conexao,"SELECT Data,sum(respPositivo) as qtdPositivo,sum(respNegativo) as qtdNegativo,sum(respNeutro) as qtdNeutro FROM Resposta WHERE Data >= '".$DataInicial."' AND Data <='".$DataFinal."'  GROUP BY Data") or die(mysqli_error($conexao));

			//faz um looping e cria um array com os campos da consulta
			while($dados = mysqli_fetch_array($query))
			{
				$resposta[] = array('Data' => $dados['Data'],
									'qtdPositivo' => $dados['qtdPositivo']);
									'qtdNegativo' => $dados['qtdNegativo']);
									'qtdNeutro' => $dados['qtdNeutro']);
			}
		}
	}
	return $resposta;
}
function TopDezFelizes(){
	include("conectar.php");
	
	$resposta = array();
	$id = mysqli_real_escape_string($conexao,$id);
	
	//Consulta Respostas no banco
	
	$query = mysqli_query($conexao,"SELECT Data,sum(respPositivo) as qtd FROM Resposta GROUP BY Data ORDER BY qtd DESC LIMIT 10") or die(mysqli_error($conexao));
	
	//faz um looping e cria um array com os campos da consulta
	while($dados = mysqli_fetch_array($query))
	{
		$resposta[] = array('Data' => $dados['Data'],
							'qtd' => $dados['qtd']); 
	}
	return $resposta;	
}
function TopDezInfelizes(){
	include("conectar.php");
	
	$resposta = array();
	$id = mysqli_real_escape_string($conexao,$id);
	
	//Consulta Respostas no banco
	
	$query = mysqli_query($conexao,"SELECT Data,sum(respNegativo) as qtd FROM Resposta GROUP BY Data ORDER BY qtd DESC LIMIT 10") or die(mysqli_error($conexao));
	
	//faz um looping e cria um array com os campos da consulta
	while($dados = mysqli_fetch_array($query))
	{
		$resposta[] = array('Data' => $dados['Data'],
							'qtd' => $dados['qtd']); 
	}
	return $resposta;	
}
function TopDezNeutros(){
	include("conectar.php");
	
	$resposta = array();
	$id = mysqli_real_escape_string($conexao,$id);
	
	//Consulta Respostas no banco
	
	$query = mysqli_query($conexao,"SELECT Data,sum(respNeutro) as qtd FROM Resposta GROUP BY Data ORDER BY qtd DESC LIMIT 10") or die(mysqli_error($conexao));
	
	//faz um looping e cria um array com os campos da consulta
	while($dados = mysqli_fetch_array($query))
	{
		$resposta[] = array('Data' => $dados['Data'],
							'qtd' => $dados['qtd']); 
	}
	return $resposta;	
}
function MédiaDeFelicidade(){
	
	//Recupera conteudo recebido na request
	$conteudo = file_get_contents("php://input");
	$resposta = array();
	//Verifica se o conteudo foi recebido
	if(empty($conteudo)){
		$resposta = mensagens(2);
	}
	else{
		//Converte o json recebido pra array
		$dados = json_decode($conteudo,true);
		
		//Verifica se as infromações esperadas foram recebidas
		if(!isset($dados["DataInicial"]) || !isset($dados["DataFinal"]))
		{
			$resposta = mensagens(3);
		}
		else{
			include("conectar.php");
			
			//Evita SQL injection
			$DataInicial = mysqli_real_escape_string($conexao,$dados["DataInicial"]);
			$DataFinal = mysqli_real_escape_string($conexao,$dados["DataFinal"]);
						
			//Consulta Respostas no banco
			$query = mysqli_query($conexao,"SELECT (sum(respPositivo)/(sum(respPositivo)+sum(respNegativo)+sum(respNeutro)))*100 as medPositivo, (sum(respNegativo)/(sum(respPositivo)+sum(respNegativo)+sum(respNeutro)))*100 as medNegativo, (sum(respNeutro)/(sum(respPositivo)+sum(respNegativo)+sum(respNeutro)))*100 as medNeutro FROM Resposta WHERE Data >= '".$DataInicial"' AND Data <='".$DataFinal"'") or die(mysqli_error($conexao));

			//faz um looping e cria um array com os campos da consulta
			while($dados = mysqli_fetch_array($query))
			{
				$resposta[] = array('medPositivo' => $dados['medPositivo']);
									'medNegativo' => $dados['medNegativo']);
									'medNeutro' => $dados['medNeutro']);
			}
		}
	}
	return $resposta;
}
?>