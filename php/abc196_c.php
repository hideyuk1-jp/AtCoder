<?php
fscanf(STDIN, '%d', $n);
$l = intdiv(strlen(strval($n)), 2);
$ok = 0;
$ng = 10 ** $l;
while (abs($ok - $ng) > 1) {
    $mid = intdiv($ok + $ng, 2);
    if (intval(strval($mid) . strval($mid)) <= $n) $ok = $mid;
    else $ng = $mid;
}
echo $ok;
