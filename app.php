<?php
	require_once './src/Dashboard.php';
	require_once './src/Conexao.php';
	require_once './src/Bd.php';

	$competencia = explode('-', $_GET['competencia']);
	$ano = $competencia[0];
	$mes = $competencia[1];

	$dias_do_mes = cal_days_in_month(CAL_GREGORIAN, $mes, $ano);

	$dashboard = new Dashboard();

	$dashboard->__set('data_inicio', $ano . '-' . $mes . '-01');
	$dashboard->__set('data_fim', $ano . '-' . $mes . '-' . $dias_do_mes);

	$conexao = new Conexao();
	$bd = new Bd($conexao, $dashboard);

	$dashboard->__set('numero_vendas', $bd->getNumeroVendas());
	$dashboard->__set('total_vendas', $bd->getTotalVendas());

	echo json_encode($dashboard);
?>