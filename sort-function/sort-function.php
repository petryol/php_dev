<?php
	
	include "library.php";

	function array_sort($array) {

		define("ARRAY_SIZE", count($array));

		$index = 0;

		for ($i=0; $i < ARRAY_SIZE * ARRAY_SIZE; ++$i) { 
		
			if ($array[$index] > $array[$index + 1]) {
					
				$l = $array[$index + 1];
				$array[$index + 1] = $array[$index];
				$array[$index] = $l;
			}

			$index = ++$index % (ARRAY_SIZE - 1);
		}

		// $p = "Sorted:" . "<br>";
		$p = "";

		foreach ($array as $key => $value) {
			$p .= $value . "<br>";
		}

		return $p;
	}

	$nums = array(0,300,20,58);

	echo array_sort($nums);
?>