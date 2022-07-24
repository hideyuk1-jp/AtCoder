<?php

fscanf(STDIN, '%s', $s);

$n = strlen($s);
$ans = 0;
$pcnt = 0;
$i = 0;
while ($i<$n) {
    $v = $s[$i];
    $nv = ($s[$i] == '>') ? '<' : '>';
    $pv = $nv;
    $ni = strpos($s, $nv, $i);
    if (empty($ni)) {
        $ni = $n;
    }

    $cnt = $ni - $i;

    if ($v == '>' && $pv == '<') {
        $ans += factorial(max($cnt, $pcnt)) + factorial(min($cnt-1, $pcnt-1));
    }
    if ($ni == $n && $v == '<') {
        $ans += factorial($cnt);
    }

    // echo $v.'*'.$cnt.PHP_EOL;

    $i = $ni;
    $pcnt = $cnt;
}
echo $ans.PHP_EOL;

function factorial($n)
{
    return ($n + 1) * $n / 2;
}
