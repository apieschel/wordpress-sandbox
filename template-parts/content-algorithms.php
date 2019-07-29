<?php 

// job search personal narrative that includes a common algorithms section:
// https://www.freecodecamp.org/forum/t/my-long-document-on-my-advice-on-getting-a-job/258707

function sumPrimes($val) {
	if($val == 1) {
		return 1;
	}

	$array = array();
	$sum = 0;
	for($i = 2; $i <= $val; $i++) {
		$is_prime = true;
		for($j = 2; $j < $i; $j++) {
			if($i % $j == 0) {
				$is_prime = false;
				break;
			}
		}

		if($is_prime) {
			array_push($array, $i);	
		}
	}

	for($k = 0; $k < count($array); $k++) {
		$sum = $sum + $array[$k];	
	}

	return $sum;
}	

function Eratosthenes($val) {
	$array = array();
	$p = 2;
	$index = 0;

	for($i = 2; $i <= $val; $i++) {
		array_push($array, $i);
	} 

	while($index < count($array) - 1) {
		for($j = $index; $j < count($array); $j = $j + 1) {
			if($j != $index && $array[$j] % $p == 0) {
				unset($array[$j]);		
				$array = array_values($array);
			} 
		}

		$index = $index + 1;
		$p = $array[$index];
		print_r($array);
		echo "<br><br>";
	}

	return $array;
}

function Eratosthenes2($val) {
	$A = array();
	$B = array();

	for($i = 2; $i < $val; $i++) {
		$A[$i] = true;
	} 

	for($j = 2; $j < sqrt($val); $j++) {
		if($A[$j]) {
			for($k = ($j * $j); $k < $val; $k = $k + $j) {
				$A[$k] = false;
			}
		}
	}

	for($l = 2; $l < $val; $l++) {
		if($A[$l]) {
			$B[$l] = $A[$l];
		}
	}

	return $B;
}

// Some general strategies for different algorithm types
// https://medium.com/swlh/the-ultimate-strategy-to-preparing-for-the-coding-interview-ee9f7eb439f3 

/* ============== Find maximum value of a bitonic array ==================== */

// basic brute force. traverses the entire array
function bitonicArrayMaximum($array) {
	for($i = 0; $i < count($array); $i++) {
		if($i > 0) {
			$middle = $array[$i];
			$left = $array[$i - 1];
			$right = $array[$i + 1];

			if($middle > $left && $middle > $right) {
				return $middle;	
			}						
		}
	}
}

// binary search method
function bitonicArrayMaximum2($array) {
	$start = 0; 
	$end = count($array) - 1;
	
	while($start < $end) {
		$middle = $start + ($end - $start) / 2;
		if($array[$middle] > $array[$middle + 1]) {
			$end = $middle; 
		} else {
			$start = $middle + 1;	
		}
	}
	return $array[$start];
}

?>