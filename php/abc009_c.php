<?php
list($n, $k) = ints();
list($s) = strs();
$ss = str_split($s);
natsort($ss);
$ss = implode('', $ss);
$d = 0;
$t = '';
for ($i = 0; $i < $n; ++$i) {
    for ($j = 0; $j < strlen($ss); ++$j) {
        $dd = $ss[$j] !== $s[$i] ? 1 : 0;
        $ts = substr_replace($ss, '', $j, 1);
        $diff = $d + $dd + cntStrDiff(substr($s, $i + 1), $ts);
        if ($diff <= $k) {
            $t .= $ss[$j];
            $d += $dd;
            $ss = $ts;
            break;
        }
    }
}
echo $t . PHP_EOL;
function cntStrDiff($s, $t)
{
    for ($i = 0; $i < strlen($s); ++$i) {
        $pos = strpos($t, $s[$i]);
        if ($pos === false) continue;
        $t = substr_replace($t, '', $pos, 1);
    }
    return strlen($t);
}
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
