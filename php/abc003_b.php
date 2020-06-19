<?php
list($s) = strs();
list($t) = strs();
$a = 'atcoder';
$n = strlen($s);
for ($i = 0; $i < $n; ++$i) {
    if ($s[$i] === $t[$i]) continue;
    if ($s[$i] !== '@' && $t[$i] !== '@') exit('You will lose' . PHP_EOL);
    $v = $s[$i] !== '@' ? $s[$i] : $t[$i];
    if (strpos($a, $v) === false) exit('You will lose' . PHP_EOL);
}
echo 'You can win' . PHP_EOL;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
