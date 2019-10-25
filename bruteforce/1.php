<?php
########################################
#PHP Brute Force		       		   #
#				       				   #
#Aiming POST form attack using wordlist#
#Written by Mr Hery - 25 Oct 2019      #
########################################

echo "Welcome to PHP POST Form Brute Force!" . PHP_EOL;
echo "Written by Mr Hery @ Oct 2019" . PHP_EOL;

function args($args){
	$xargs = [];

	for($i = 1; $i < count($args); $i++){
		$arg = explode("=", $args[$i]);
		$xargs[$arg[0]] = $arg[1];
	}

	return $xargs;
}


$args = args($argv);
$user = "";
$users = "";
$password = "";
$passwords = "";

foreach($args as $key => $value){
	switch($key){
		case "user":
			$user = $value;
		break;

		case "users":
			$user = $value;
		break;

		case "password":
			$password = $value;
		break;

		case "passwords":
			$passwords = $value;
		break;

		default:
			echo "Undefine arg " . $key . PHP_EOL;
		break;
	}
}

if(empty($user) && empty($users)){
	echo "Missing arg user (for single user) or users (to load users list)." . PHP_EOL;
	die("Script Stopped.");
}

if(empty($password) && empty($passwords)){
	echo "Missing arg password (for single password) or passwords (to load passwords list)." . PHP_EOL;
	die("Script Stopped");
}

if(empty($user)){
	if(file_exists($users)){
		$o = fopen($users, "rb");
		$s = "";

		while(!feof($o)){
			$s .= fread($o, 1024);
			flush();
		}
		fclose($o);
		$users = explode("\n", $s);
	}else{
		echo "User list file " . $users . " not found.";
		die();
	}
}else{
	$users = explode("\n", $user);
}

if(empty($password)){
	if(file_exists($passwords)){
		$o = fopen($passwords, "rb");
		$s = "";

		while(!feof($o)){
			$s .= fread($o, 1024);
			flush();
		}
		fclose($o);
		$passwords = explode("\n", $s);
	}else{
		echo "Password list file " . $passwords . " not found.";
		die();
	}
}else{
	$passwords = explode("\n", $password);
}

foreach($users as $user){
	foreach($passwords as $password){
		echo $user . " - " . $password . PHP_EOL;
	}
}

die("Script Stopped");











