<?php
require_once 'conf.php';
function Url($valor){
	if (empty($_SERVER['HTTPS'])){
		$serverhttp = "http://";
	  }else{
		$serverhttp = "https://";
	}	
	switch ($valor) {
		case 'host':
			return $serverhttp.$_SERVER[HTTP_HOST];
			break;
		case 'uri':
			return $_SERVER[REQUEST_URI];
			break;
		case 'UrlAtual':
			return $serverhttp.$_SERVER[HTTP_HOST].$_SERVER[REQUEST_URI];
			break;
		
	}
}
function dividirUrl($busca, $valor, $url){
	$urlF = explode($busca, $url);
	$valortotal = count($urlF)-$valor;
	$final_url = $urlF[$valortotal];
	return $final_url;
}

function inicio(){
	if(URL_UTIMA == ""){
	//header("location:/index");
	include "www/inicio.php";
	}else if(URL_UTIMA == "index" ){
	include "inicio.php";
	}else{
	echo "erro 404";
	}
}
define("URL_PRINCIPAL", Url('host'));
define("URL_PAGINAS", Url('uri'));
define("URL_COMPLETA", Url('UrlAtual'));
define("URL_UTIMA", dividirUrl("/", 1, URL_COMPLETA));
define("URL_UTIMA_get", dividirUrl("?url=", 1, URL_COMPLETA));

inicio();







?>
