<?php

list($s) = strs();
$n = strlen($s);
list($k) = ints();
$a = substr_info($s);
if (count($a) === 1) {
    echo intdiv($n * $k, 2);
    exit;
}
$cnt = 0;
foreach ($a as $i => list($v, $c)) {
    $cnt += intdiv($c, 2) * $k;
}
if ($s[0] === $s[$n - 1]) {
    $cnt -= intdiv($a[0][1], 2) * ($k - 1);
    $cnt -= intdiv($a[count($a) - 1][1], 2) * ($k - 1);
    $cnt += intdiv($a[0][1] + $a[count($a) - 1][1], 2) * ($k - 1);
}
echo $cnt;
// 文字列の要素と連続数を格納した配列を返す
function substr_info(string $s): array
{
    $n = strlen($s);
    $cnt = 0;
    for ($i = 0; $i < $n; $i++) {
        $cnt++;
        if ($i === $n - 1 || $s[$i] !== $s[$i + 1]) {
            $_s[] = [$s[$i], $cnt];
            $cnt = 0;
        }
    }
    return $_s;
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
