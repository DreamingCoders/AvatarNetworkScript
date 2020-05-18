<?php
header('Content-type:application/json;charset=utf-8');

$jsonStr ='{
	"main": {
		"title": "Hello",
		"desc": "World!"
	}
}';

//$json = json_encode($jsonStr, JSON_PRETTY_PRINT);
//echo json_decode($json);

echo $jsonStr;
