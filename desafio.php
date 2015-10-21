<?php
	$codigos = array(
		"VERMELHO" => "IAJNLITLUNAYDHFAA",//9+1+10+14+12+9+21+12+22+14+1+26+
		"AZUL" => "EFDLUMHBNDRRTM",
		"VERDE" => "ZTRAHDSICFQH",
		"AMARELO" => "QPSKXDLPWFLAAKHY"
	);
	$alfabeto = Array("a" => 1, "b" => 2, "c" => 3, "d" => 4, "e" => 5, "f" => 6, 
	"g" => 7, "h" => 8, "i" => 9, "j" => 10, "k" => 11, "l" => 12, 
	"m" => 13, "n" => 14, "o" => 15, "p" => 16, "q" => 17, "r" => 18, 
	"s" => 19, "t" => 20, "u" => 21, "v" => 22, "w" => 23, "x" => 24, "y" => 25, "z" => 26);
	$total_codigo = array(
		"VERMELHO" => 0,
		"AZUL" => 0,
		"VERDE" => 0,
		"AMARELO" => 0	
	);
	$total_cor = array(
		"VERMELHO" => 0,
		"AZUL" => 0,
		"VERDE" => 0,
		"AMARELO" => 0	
	);
	foreach($codigos as $cor => $codigo){
		$codigo_array = str_split(trim($codigo));
		$cor_array = str_split(trim($cor));
		foreach($codigo_array as $letra){
			$total_codigo[$cor] += $alfabeto[strtolower($letra)];
		}
		foreach($cor_array as $letra){
			$total_cor[$cor] += $alfabeto[strtolower($letra)];
		}
	}
	$total_divisao = array(
		"VERMELHO" => 0,
		"AZUL" => 0,
		"VERDE" => 0,
		"AMARELO" => 0	
	); 
	foreach($codigos as $cor => $codigo){
		$total_divisao[$cor] = $total_codigo[$cor] / $total_cor[$cor];
		echo ($total_codigo[$cor] % $total_cor[$cor]) == 11 ? $cor : "";
	}

?>