
<html>
<body>
<?php

// TODO: add the even_numbers array here

$male_names = ["Jake", "Eric", "John"];
$female_names = ["Elisa", "Beth", "Sandra"];
$even_numbers = [2,"tes",6,8,10];

// TODO: join the male and female names to one array
$names = NULL;

/*
for ($i = 0; $i < count($even_numbers); $i++){
	echo $even_numbers[$i] . " ";
}
*/
foreach($even_numbers as $position => $value)
	echo $position."(".$value.") -";
//print_r($even_numbers). "-";

echo ("<br>");
$names = array_merge($male_names, $female_names);
sort($names);

foreach($names as $pos => $val){
	echo $pos . "[" . $val . "] -";
}
//print_r($names);


?>
</body>
</html>