<?php
$arr = array(1,2,3,4,5,6);

function sumArr(array $arr) {
	$sum = 0;
	foreach($arr as $item) {
		$sum = $sum + $item;
	}
	return $sum;
}

echo sumArr($arr);
/*
function sumArr( array $currArr) {
	$sum = 0;
	$max = sizeof($currArr);

	for ($i = 0; $i < $max; $i++ ) {
		$sum = $sum + $currArr[i];
	}
	return $sum;
}

$sum = sumArr($arr);
*/
?>