<?php

list($l, $x, $y, $s, $d) = ints();
// 半時計
if ($x < $y) {
    $L = $s > $d ? $s - $d : $s + ($l - $d);
    $ans[] = $L / ($y - $x);
}
// 時計
$L = $s > $d ? ($l - $s) + $d : $d - $s;
$ans[] = $L / ($y + $x);
echo min($ans);
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
