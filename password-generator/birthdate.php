<?php

function args($args){
	$xargs = [];

	for($i = 1; $i < count($args); $i++){
		$arg = explode("=", $args[$i]);

		if(count($arg) > 1){
			$xargs[$arg[0]] = $arg[1];
		}else{
			$xargs[$args[$i]] = $args[$i];
		}
		
	}

	return $xargs;
}

function sum($number){
	$ns = str_split($number);

	if(count($ns) == 2){
		$n = ($ns[0] + $ns[1]);

		$nx = str_split($n);

		if(count($nx) == 2){
			return sum($n);
		}else{
			return $n;
		}
	}else{
		return $ns[0];
	}
}
$args = args($argv);

if(isset($args["help"]) or isset($args["h"])){
	echo <<<S
Usage: php birth.php [args]=[value] \n

Arguments:

d \t-\tDay of birth
m \t-\tMonth of birth
y \t-\tYear of birth

Script stopped
S;
	die();
}elseif(!isset($args["d"]) || !isset($args["m"]) || !isset($args["y"])){
	echo "Day Analysis: ". $args["d"] ."\n";

	if(count(str_split($args["d"])) > 1){
		$ns = str_split($args["d"]);
		echo "sum of (" . $args["d"] . ") = " . sum($args["d"]) . "\n\n";
	}

	switch(sum($args["d"])){
		case "1":
			echo "-1-\n";
			echo "Leader\n";
		break;

		case "2":
			echo "-2-\n";
			echo "Advisor\n";
		break;

		case "3":
			echo "-3-\n";
			echo "Man of Law\n";
		break;

		case "4":
			echo "-4-\n";
			echo "False Leader with Luck\n";
		break;

		case "5":
			echo "-5-\n";
			echo "Kids\n";
		break;

		case "6":
			echo "-6-\n";
			echo "Artist\n";
		break;

		case "7":
			echo "-7-\n";
			echo "Religous\n";
		break;

		case "8":
			echo "-8-\n";
			echo "Survivor\n";
		break;

		case "9":
			echo "-9-\n";
			echo "Warrior\n";
		break;

		default:

		break;
	}
}else{
	echo "No arguments found.\n";
}
