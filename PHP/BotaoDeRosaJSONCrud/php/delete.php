<?php

	$index = $_GET['index'];

	$data = file_get_contents('members.json');
	$data = json_decode($data);


	unset($data[$index]);

	$data = json_encode($data, JSON_PRETTY_PRINT);
	file_put_contents('members.json', $data);

	header('location: allCad.php');
?>