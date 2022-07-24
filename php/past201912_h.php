<?php

$debug = false;
list($n) = ints();
$c = ints();
$minAll = $minOdd = PHP_INT_MAX;
for ($i = 0; $i < $n; ++$i) {
    $minAll = min($minAll, $c[$i]);
    if ($i % 2 === 0) {
        $minOdd = min($minOdd, $c[$i]);
    }
}
$sell = array_fill(0, $n, 0);
$sellAll = $sellOdd = 0;
list($q) = ints();
for ($i = 0; $i < $q; ++$i) {
    list($type, $a, $b) = ints();
    if ($type === 1) {
        --$a;
        $ct = $c[$a] - $sell[$a] - $sellAll;
        if ($a % 2 === 0) {
            $ct -= $sellOdd;
        }
        if ($ct >= $b) {
            $sell[$a] += $b;
            $minAll = min($minAll, $ct - $b);
            if ($a % 2 === 0) {
                $minOdd = min($minOdd, $ct - $b);
            }
            if ($debug) {
                $log[] = "[query-${i} success] type:${type} sell ${a} x ${b}";
            }
        } else {
            if ($debug) {
                $log[] = "[query-${i} failure] type:${type} sell ${a} x ${b}";
            }
        }
    }
    if ($type === 2) {
        if ($minOdd >= $a) {
            $sellOdd += $a;
            $minOdd -= $a;
            $minAll = min($minAll, $minOdd);
            if ($debug) {
                $log[] = "[query-${i} success] type:${type} sell Odd x ${a}";
            }
        } else {
            if ($debug) {
                $log[] = "[query-${i} failure] type:${type} sell Odd x ${a}";
            }
        }
    }
    if ($type === 3) {
        if ($minAll >= $a) {
            $sellAll += $a;
            $minAll -= $a;
            $minOdd -= $a;
            if ($debug) {
                $log[] = "[query-${i} success] type:${type} sell All x ${a}";
            }
        } else {
            if ($debug) {
                $log[] = "[query-${i} failure] type:${type} sell All x ${a}";
            }
        }
    }
    if ($debug) {
        $log[] =  ' sell: ' . implode(' ', $sell);
        $log[] =  ' sellOdd: ' . $sellOdd;
        $log[] =  ' sellAll: ' . $sellAll;
    }
}
if ($debug) {
    echo implode(PHP_EOL, $log) . PHP_EOL;
}
$ans = array_sum($sell);
$ans += $sellOdd * (intdiv($n, 2) + $n % 2);
$ans += $sellAll * $n;
echo $ans;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
