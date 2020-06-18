<?php
list($n) = ints();
list($s) = strs();
for ($i = 0; $i <= $n; ++$i) {
    if ($i === 0) $a = 'b';
    elseif ($i % 3 === 1) $a = 'a' . $a . 'c';
    elseif ($i % 3 === 2) $a = 'c' . $a . 'a';
    else $a = 'b' . $a . 'b';

    if ($a === $s) exit((string) $i . PHP_EOL);
    if (strlen($a) >= strlen($s)) exit('-1' . PHP_EOL);
}
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
