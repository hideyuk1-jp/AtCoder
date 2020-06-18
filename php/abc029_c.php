<?php
list($n) = ints();
$a = ['a', 'b', 'c'];
$d = 1;
$ps[$d] = $a;
while ($d < $n) {
    $d++;
    foreach ($a as $v) {
        foreach ($ps[$d - 1] as $p) {
            $ps[$d][] = $v . $p;
        }
    }
}
echo implode(PHP_EOL, $ps[$n]) . PHP_EOL;

function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
