<?php

	function speed_calculator($a = 0, $b = 0, $calculate = 0) {

		if ($calculate == "v") {
			return $a / $b;
		}

		if ($calculate == "s") {
			return $a * $b;
		}

		if ($calculate == "t") {
			return $b / $a;
		}

		else {
			return "You need to define what is should calculate.";
		}
	}

	function table_generator($array) {
	
		if (is_array($array)) {

			foreach ($array as $key => $value) {
				if (count($array) !== count($array, COUNT_RECURSIVE)/*is_array($value)*/) {
					$start = 0;
				}

				else {
					$start = 1;
					break;
				}
			}

			if ($start == 0) {

				$p = "<table border = '1'>";

				$nadpisy = array();

				foreach ($array as $key => $value) {
					foreach ($value as $key2 => $value2) {
						if (in_array($key2, $nadpisy)) {
								
						}
						else {
							$nadpisy[] = $key2;
						}
					}
				}

				$p .= "<tr>";
					foreach ($nadpisy as $key => $value) {
						$p .= "<td>" . "<b>" . strtoupper(str_replace("_", " ", "$value")) . "</b>" . "</td>";	
					}
				$p .= "</tr>";

				$f = 0;
				$done = 0;

				foreach ($array as $key => $value) {
					$p .= "<tr>";
					for ($i=0; $i < count($nadpisy); $i++) { 
							
						foreach ($value as $key2 => $value2) {
							if ($key2 == $nadpisy[$i]) {
								$p .= "<td>" . ucfirst($value2) . "</td>";
								$done = 1;
								break;
							}
						}
					if ($done == 0) {
						$p .= "<td>" . "</td>";
					}
					$done = 0;
					}
					$p .= "</tr>";	
				} 

				$p .= "</table>";

				return $p;
			}

			elseif ($start == 1) {

				$p = "<table border = '1'>";

				$nadpisy = array();

				foreach ($array as $key => $value) {
					if (in_array($key, $nadpisy)) {
								
					}
					else {
							$nadpisy[] = $key;
					}
				}

				$p .= "<tr>";
					foreach ($nadpisy as $key => $value) {
						$p .= "<td>" . "<b>" . strtoupper(str_replace("_", " ", "$value")) . "</b>" . "</td>";	
					}
				$p .= "</tr>";

				$p .= "<tr>";

					foreach ($array as $key => $value) {
						$p .= "<td>" . $value . "</td>";
					}

				$p .= "</tr>";

				$p .= "</table border = '1'";

				return $p;
			}

		}

		else {
			return "nebyl zadan array";
		}
	}

?>