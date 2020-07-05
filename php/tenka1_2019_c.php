<?php
list($n) = ints();
list($s) = strs();
$sinfo = substr_info($s);
$k = count($sinfo);
$cntw[0] = $cntb[0] = 0;
for ($i = 1; $i <= $k; ++$i) {
    $cntw[$i] = $cntw[$i - 1];
    $cntb[$i] = $cntb[$i - 1];
    if ($sinfo[$i - 1][0] === '.') $cntw[$i] += $sinfo[$i - 1][1];
    else $cntb[$i] += $sinfo[$i - 1][1];
}
$min = PHP_INT_MAX;
//...###
for ($i = 0; $i <= $k; ++$i)
    $min = min($min, $cntb[$i] + ($cntw[$k] - $cntw[$i]));
echo $min;
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

function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
