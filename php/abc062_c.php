<?php

list($h, $w) = ints();
if ($h % 3 === 0 || $w % 3 === 0) {
    exit('0');
}
$min = PHP_INT_MAX;

$min = min($min, $w * (intdiv($h, 3) + 1) - $w * intdiv($h, 3));
$min = min($min, $h * (intdiv($w, 3) + 1) - $h * intdiv($w, 3));

$s = [intdiv($w, 3) * $h, intdiv($h, 2) * ($w - intdiv($w, 3)), ($h - intdiv($h, 2)) * ($w - intdiv($w, 3))];
$min = min($min, max($s) - min($s));
$s = [(intdiv($w, 3) + 1) * $h, intdiv($h, 2) * ($w - (intdiv($w, 3) + 1)), ($h - intdiv($h, 2)) * ($w - (intdiv($w, 3) + 1))];
$min = min($min, max($s) - min($s));
$s = [intdiv($h, 3) * $w, intdiv($w, 2) * ($h - intdiv($h, 3)), ($w - intdiv($w, 2)) * ($h - intdiv($h, 3))];
$min = min($min, max($s) - min($s));
$s = [(intdiv($h, 3) + 1) * $w, intdiv($w, 2) * ($h - (intdiv($h, 3) + 1)), ($w - intdiv($w, 2)) * ($h - (intdiv($h, 3) + 1))];
$min = min($min, max($s) - min($s));
echo $min;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
