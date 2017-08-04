<?php

function createQuery($opt, $ip){
	if ($opt == 'all') {
		return 'SELECT date, value, opt FROM demo_pocket WHERE ip=\''.$ip.'\' AND date BETWEEN :dateFrom AND :dateTo';
	}else{
		return 'SELECT date, value, opt FROM demo_pocket WHERE opt=:opt AND ip=\''.$ip.'\' AND date BETWEEN :dateFrom AND :dateTo';
	}
}

function makeGoodArray($objArray){

	for ($i=0; $i < count($objArray); $i++) { 
		
		foreach ($objArray[$i] as $key => $val) {
			if ($key == 'date') {
				$tmp = substr($val, 0, 10);
				$pattern = '/([0-9]{4})-([0-9]{2})-([0-9]{2})/';
				$replacement = '$3-$2-$1';
				$objArray[$i][$key] = preg_replace($pattern, $replacement, $tmp);
			}
			elseif ($key == 'opt') {
				if ($objArray[$i][$key] == 1) {
					$objArray[$i][$key] = 'Приход';
				}else{
					$objArray[$i][$key] = 'Расход';
				}
			}
		}
	}
	return $objArray;
}

function makeBadArray($objArray){
	$res = 0;
	for ($i=0; $i < count($objArray); $i++) { 
		$value = $objArray[$i]['value'];
		if ($objArray[$i]['opt'] == 0) {
			$res -= $value;
		}else{
			$res += $value;
		}
	}
	return $res;
}


function debug($obj){
	echo "<pre>";
	print_r($obj);
	echo "</pre>";
}

?>