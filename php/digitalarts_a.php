<?php
$s = strs();
list($n) = ints();
for ($i = 0; $i < $n; ++$i) {
    list($t) = strs();
    foreach ($s as $j => $v) {
        if (isset($filered[$j]) || strlen($v) !== strlen($t)) continue;
        if (isMatch($v, $t)) {
            $s[$j] = str_repeat('*', strlen($v));
            $filtered[$j] = true;
        }
    }
}
echo implode(' ', $s) . PHP_EOL;
function isMatch($s, $t)
{
    if (strlen($s) !== strlen($t)) return false;
    for ($i = 0; $i < strlen($s); ++$i)
        if ($s[$i] !== $t[$i] && $t[$i] !== '*') return false;
    return true;
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
