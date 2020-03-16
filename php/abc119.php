<?php
fscanf(STDIN, '%d %d %d', $a, $b, $q);
for ($i  = 0; $i < $a; $i++) fscanf(STDIN, '%d', $s[]);
for ($i  = 0; $i < $b; $i++) fscanf(STDIN, '%d', $t[]);
for ($i  = 0; $i < $q; $i++) fscanf(STDIN, '%d', $x[]);


exit();

fscanf(STDIN, '%d %d %d %d', $n, $a, $b, $c);
for ($i  = 0; $i < $n; $i++) fscanf(STDIN, '%d', $l[]);
$ans = dfs(0, 0, 0, 0);
echo $ans . PHP_EOL;

function dfs($cur, $x, $y, $z) {
    global $n, $a, $b, $c, $l;

    if ($cur === $n) {
        if (min($x, $y, $z) > 0) return abs($a - $x) + abs($y - $b) + abs($z - $c) - 30;
        else return 10 ** 9;
    }

    $ret0 = dfs($cur + 1, $x, $y, $z);
    $ret1 = dfs($cur + 1, $x + $l[$cur], $y, $z) + 10;
    $ret2 = dfs($cur + 1, $x, $y + $l[$cur], $z) + 10;
    $ret3 = dfs($cur + 1, $x, $y, $z + $l[$cur]) + 10;
    return min($ret0, $ret1, $ret2, $ret3);
}

exit();

fscanf(STDIN, '%d', $n);
$ans = 0;
for ($i  = 0; $i < $n; $i++) {
    fscanf(STDIN, '%f %s', $x, $u);
    $ans += ($u === 'JPY') ? $x : $x * 380000;
}
echo $ans . PHP_EOL;

exit();

fscanf(STDIN, '%s', $s);
$date1 = date($s);
$date2 = date('2019/4/30');
if (strtotime($date1) <= strtotime($date2)) $ans = 'Heisei';
else $ans = 'TBD';
echo $ans . PHP_EOL;