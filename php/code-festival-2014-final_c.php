<?php
list($a) = ints();
for ($i = 10; true; ++$i) {
    $f = f($i);
    if ($f === $a) break;
    if ($f > $a) exit('-1' . PHP_EOL);
}
echo $i . PHP_EOL;
function f($n)
{
    $res = 0;
    $nn = $n;
    $t = 0;
    while ($nn > 0) {
        $res += $nn % 10 * pow($n, $t);
        $nn = intdiv($nn, 10);
        ++$t;
    }
    return $res;
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
