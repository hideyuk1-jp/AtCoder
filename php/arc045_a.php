<?php

$s = strs();
$conv = ['Left' => '<', 'Right' => '>', 'AtCoder' => 'A'];
foreach ($s as $i => $v) {
    $s[$i] = $conv[$v];
}
echo implode(' ', $s) . PHP_EOL;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
