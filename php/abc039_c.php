<?php
list($s) = strs();
$ss = str_repeat('WBWBWWBWBWBW', 3);
foreach (['Do' => 0, 'Re' => 2, 'Mi' => 4, 'Fa' => 5, 'So' => 7, 'La' => 9, 'Si' => 11] as $v => $i) {
    if (substr($ss, $i, 20) === $s) exit($v);
}
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
