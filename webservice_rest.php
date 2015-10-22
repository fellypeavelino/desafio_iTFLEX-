<?php
$metodoHTTP = $_SERVER['REQUEST_METHOD'];
require_once('banco.php');
$banco = new conect();

if($metodoHTTP == 'POST'){
	$param = "{".base64_decode($_POST['data'])."}";
	$json = (json_decode($param));
	$banco->insert($json);
}

if($metodoHTTP == 'GET'){
	$param = "{".base64_decode($_GET['data'])."}";
	$json = (json_decode($param));
	$return = $banco->select($json->id);
	echo json_encode($return);
}

if($metodoHTTP == 'PUT'){
	$put_vars = array();
	parse_str(file_get_contents("php://input"), $put_vars);
    $data = $put_vars;
    $param = "{".base64_decode($data['data'])."}";
	$json = (json_decode($param));
	//var_dump($json);
	$banco->upload($json);
}


if($metodoHTTP == 'DELETE'){
	$delete_vars = array();
	parse_str(file_get_contents("php://input"), $delete);
    $data = $delete;
    $param = "{".base64_decode($data['data'])."}";
	$json = (json_decode($param));
	//var_dump($json);
	$banco->delete($json);
}



?>