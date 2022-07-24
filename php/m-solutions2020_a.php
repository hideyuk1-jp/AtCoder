<?php

list($x) = ints();
if ($x <= 599) {
    $ans = 8;
} elseif ($x <= 799) {
    $ans = 7;
} elseif ($x <= 999) {
    $ans = 6;
} elseif ($x <= 1199) {
    $ans = 5;
} elseif ($x <= 1399) {
    $ans = 4;
} elseif ($x <= 1599) {
    $ans = 3;
} elseif ($x <= 1799) {
    $ans = 2;
} elseif ($x <= 1999) {
    $ans = 1;
}
echo $ans;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
