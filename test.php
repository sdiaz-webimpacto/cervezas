<?php

$table = 'customer';
$array = array(
    'id' => 1,
    'name' => 'Santi',
    'surname' => 'Díaz',
    'email' => 'a@a.es'
);
$values = array();

$html = 'INSERT INTO '.$table.' (';
foreach ($array as $key => $item)
{
    $html .= $key;
    if($item != end($array))
    {
        $html .= ',';
    }
    $values[] = $item;
}
$html .= ') VALUES (';
foreach($values as $value)
{
    $html .= "'".$value."'";
    if($value != end($values))
    {
        $html .= ',';
    }
}
$html .= ')';

echo $html;