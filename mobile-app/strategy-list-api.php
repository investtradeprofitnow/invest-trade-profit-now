<?php
    require_once 'strategy.php';  
    $strategyObj = new StrategyShort();
    $json_array = $strategyObj->getStrategies();
	echo json_encode($json_array);
?>