<?php
$debug = false;
list($n, $k) = ints();
$a = ints();
// ２進数表現で格桁の1の数を数える
for ($i = 0; $i < $n; ++$i) {
    $j = 0;
    while ($a[$i] >> $j > 0) {
        if (isset($cnt1[$j])) $cnt1[$j] += $a[$i] >> $j & 1;
        else $cnt1[$j] = $a[$i] >> $j & 1;
        ++$j;
    }
}
if ($debug) var_dump($cnt1);
$l = strlen(decbin(max($k, max($a))));
$ans = 0;
$smaller = false; // true: xがk以下確定, false: xがk以下か未確定
for ($i = $l - 1; $i >= 0; --$i) {
    $bitx = ($cnt1[$i] ?? 0) < $n / 2 ? 1 : 0;
    if ($smaller) {
        $ans += $bitx ? (1 << $i) * ($n - $cnt1[$i]) : (1 << $i) * $cnt1[$i];
    } else {
        $bitk = $k >> $i & 1;
        $bitx = min($bitx, $bitk);
        if ($debug) var_dump($i, $bitk, $bitx, '-----');
        if ($bitx < $bitk) {
            $ans += (1 << $i) * $cnt1[$i];
            $smaller = true;
        } else {
            $ans += $bitx ? (1 << $i) * ($n - $cnt1[$i]) : (1 << $i) * $cnt1[$i];
        }
    }
}
echo $ans;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
