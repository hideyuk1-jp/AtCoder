<?php
fscanf(STDIN, '%d %d', $n, $m);
for ($i  = 0; $i < $m; $i++) {
    fscanf(STDIN, '%d %d', $_p, $y[]);
    $p[] = $_p - 1;
    $c[] = $i;
}
array_multisort($p, $y, $c);
$j = 1;
for($i = 0; $i < $m; $i++) {
    if (($p[$i - 1] ?? $p[$i]) !== $p[$i]) $j = 1;
    $num[$c[$i]] = str_pad($p[$i] + 1, 6, 0, STR_PAD_LEFT) . str_pad($j, 6, 0, STR_PAD_LEFT);
    $j++;
}
for($i = 0; $i < $m; $i++) echo $num[$i] . PHP_EOL;