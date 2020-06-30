<?php
list($a, $b, $c) = ints();
if (isExistOdd()) exit('0');
if ($a === $b && $b === $c) exit('-1');
$cnt = 0;
while (!isExistOdd()) {
    ++$cnt;
    list($a, $b, $c) = [$b / 2 + $c / 2, $a / 2 + $c / 2, $a / 2 + $b / 2];
}
echo $cnt;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
function isExistOdd()
{
    global $a, $b, $c;
    return $a % 2 || $b % 2 || $c % 2;
}
