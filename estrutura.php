<?php 

$date = new DateTime();
$diaSemana = $date->format("D");
$dia = $date->format("d");
$mes = $date->format("m");
$ano = $date->format("Y");
$diretorio = "Fotos";
$barra = DIRECTORY_SEPARATOR;

$semana = array(
	"Sun"=>"Domingo",
	"Mon"=>"Segunda-feira",
	"Tue"=>"Terça-Feira",
	"Wed"=>"Quarta-Feira",
	"Thu"=>"Quinta-Feira",
	"Fri"=>"Sexta-Feira",
	"Sat"=>"Sábado"
);

$mes_extenso = array(
	"1"=>"JANEIRO",
	"2"=>"FEVEREIRO",
	"3"=>"MARÇO",
	"4"=>"ABRIL",
	"5"=>"MAIO",
	"6"=>"JUNHO",
	"7"=>"JULHO",
	"8"=>"AGOSTO",
	"9"=>"SETEMBRO",
	"10"=>"OUTUBRO",
	"11"=>"NOVEMBRO",
	"12"=>"DEZEMBRO"
);


if(!is_dir($diretorio)){
	mkdir($diretorio);

	echo "Diretorio $diretorio criado com sucesso.<br/>";
}

for($ano; $ano<=2027; $ano++){

	$diretorio_ano = $diretorio.$barra.$ano;
	if(!is_dir($diretorio_ano)){
		mkdir($diretorio_ano);

		echo "Diretorio $diretorio_ano criado com sucesso.<br/>";
	}
	for ($i=1; $i <=12 ; $i++) {

		if($i<10){
			$numero_mes = "0".$i;
		}else{
			$numero_mes = $i;
		}

		$diretorio_mes = $diretorio.$barra.$ano.$barra.$numero_mes . " - " .$mes_extenso[$i];

		if(!is_dir($diretorio_mes)){
			mkdir($diretorio_mes);

			echo "Diretorio $diretorio_mes criado com sucesso.<br/>";
		}
		
		$mes_qtdias = cal_days_in_month(CAL_GREGORIAN, $i, $ano);
		for ($idias=1; $idias <= $mes_qtdias ; $idias++) {

			if($idias<10){
				$dias = "0".$idias;
			}else{
				$dias = $idias;
			}
			$diretorio_dia = $diretorio.$barra.$ano.$barra.$numero_mes . " - " .$mes_extenso[$i].$barra.$dias;

			if(!is_dir($diretorio_dia)){
				mkdir($diretorio_dia);

				echo "Diretorio $diretorio_dia criado com sucesso.<br/>";
			}
		}
		
	}
}



?>