<?php

// 21:35
define('MOD', 10 ** 9 + 7);
fscanf(STDIN, '%d', $n);

echo dfs(0, 'XXX') . PHP_EOL;

function ok($last4)
{
    if (preg_match('/(AGC)|(GAC)|(ACG)|(A.GC)|(AG.C)/', $last4)) {
        return false;
    }
    return true;
}

function dfs($cur, $last3)
{
    global $n;
    static $memo;

    if (isset($memo[$cur][$last3])) {
        return $memo[$cur][$last3];
    }
    if ($cur === $n) {
        return 1;
    }
    $ret = 0;
    foreach (['A', 'G', 'C', 'T'] as $c) {
        if (ok($last3 . $c)) {
            $ret = ($ret + dfs($cur + 1, substr($last3, 1) . $c)) % MOD;
        }
    }
    $memo[$cur][$last3] = $ret;
    return $ret;
}

exit();

fscanf(STDIN, '%d %d', $n, $q);
fscanf(STDIN, '%s', $s);
$cnt[0] = 0;
for ($i = 0; $i < $n; $i++) {
    if ($s[$i] === 'A' && ($s[$i + 1] ?? '') === 'C') {
        $cnt[$i + 1] = $cnt[$i] + 1;
    } else {
        $cnt[$i + 1] = $cnt[$i];
    }
}
for ($i  = 0; $i < $q; $i++) {
    fscanf(STDIN, '%d %d', $l, $r);
    echo($cnt[$r - 1] - $cnt[$l - 1]) . PHP_EOL;
}

exit();

fscanf(STDIN, '%s', $s);
$n = strlen($s);
$cnt = 0;
$max = 0;
for ($i = 0; $i < $n; $i++) {
    if (in_array($s[$i], ['A', 'C', 'G', 'T'])) {
        $cnt++;
    } else {
        $cnt = 0;
    }
    $max = max($max, $cnt);
}
echo $max . PHP_EOL;

exit();

fscanf(STDIN, '%s', $b);

if ($b === 'A') {
    $ans = 'T';
} elseif ($b === 'T') {
    $ans = 'A';
} elseif ($b === 'C') {
    $ans = 'G';
} elseif ($b === 'G') {
    $ans = 'C';
}

echo $ans . PHP_EOL;
