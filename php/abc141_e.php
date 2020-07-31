<?php
list($n) = ints();
list($s) = strs();
$max = 0;
for ($i = 0; $i < $n; ++$i) {
    $t = substr($s, $i);
    $lcp = zAlgo($t);
    for ($j = 0; $j < $n - $i; ++$j)
        $max = max($max, min($j, $lcp[$j]));
}
echo $max;
// sとs[i:]が、先頭から最大で何文字まで一致しているか格納した配列を返す
// O(N)
function zAlgo(string $s): array
{
    $n = strlen($s);
    $res = array_fill(0, $n, 0);
    $res[0] = $n;
    $i = 1;
    $len = 0;
    while ($i < $n) {
        while ($i + $len < $n && $s[$len] === $s[$i + $len]) ++$len;
        $res[$i] = $len;
        if ($len === 0) {
            ++$i;
            continue;
        }
        $k = 1;
        while ($i + $k < $n && $k + $res[$k] < $len) {
            $res[$i + $k] = $res[$k];
            ++$k;
        }
        $i += $k;
        $len -= $k;
    }
    return $res;
}
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
