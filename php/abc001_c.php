<?php

list($deg, $dis) = ints();

$v = intdiv($dis * 100, 60);
$v = $v % 10 >= 5 ? intdiv($v + 10, 10) : intdiv($v, 10);
if ($v <= 2) {
    $w = 0;
} elseif ($v <= 15) {
    $w = 1;
} elseif ($v <= 33) {
    $w = 2;
} elseif ($v <= 54) {
    $w = 3;
} elseif ($v <= 79) {
    $w = 4;
} elseif ($v <= 107) {
    $w = 5;
} elseif ($v <= 138) {
    $w = 6;
} elseif ($v <= 171) {
    $w = 7;
} elseif ($v <= 207) {
    $w = 8;
} elseif ($v <= 244) {
    $w = 9;
} elseif ($v <= 284) {
    $w = 10;
} elseif ($v <= 326) {
    $w = 11;
} else {
    $w = 12;
}
if ($w === 0) {
    exit('C 0' . PHP_EOL);
}

$deg *= 10;
if ($deg < 1125) {
    $dir = 'N';
} elseif ($deg < 3375) {
    $dir = 'NNE';
} elseif ($deg < 5625) {
    $dir = 'NE';
} elseif ($deg < 7875) {
    $dir = 'ENE';
} elseif ($deg < 10125) {
    $dir = 'E';
} elseif ($deg < 12375) {
    $dir = 'ESE';
} elseif ($deg < 14625) {
    $dir = 'SE';
} elseif ($deg < 16875) {
    $dir = 'SSE';
} elseif ($deg < 19125) {
    $dir = 'S';
} elseif ($deg < 21375) {
    $dir = 'SSW';
} elseif ($deg < 23625) {
    $dir = 'SW';
} elseif ($deg < 25875) {
    $dir = 'WSW';
} elseif ($deg < 28125) {
    $dir = 'W';
} elseif ($deg < 30375) {
    $dir = 'WNW';
} elseif ($deg < 32625) {
    $dir = 'NW';
} elseif ($deg < 34875) {
    $dir = 'NNW';
} else {
    $dir = 'N';
}

echo $dir . ' ' . $w . PHP_EOL;

function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
