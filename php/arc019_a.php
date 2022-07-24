<?php

list($s) = strs();
$comb = [
    "O" => "0",
    "D" => "0",
    "I" => "1",
    "Z" => "2",
    "S" => "5",
    "B" => "8",
];
$ans = '';
for ($i = 0; $i < strlen($s); ++$i) {
    if (isset($comb[$s[$i]])) {
        $ans .= $comb[$s[$i]];
    } else {
        $ans .= $s[$i];
    }
}
echo $ans . PHP_EOL;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
