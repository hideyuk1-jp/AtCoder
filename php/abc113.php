<?php

// B
fscanf(STDIN, '%d', $n);
fscanf(STDIN, '%d %d', $t, $a);
$h = array_map('intval', explode(' ', trim(fgets(STDIN))));
$min = [-1, 10 ** 6];
for ($i = 0; $i < $n; $i++) {
    $d = abs($a - ($t - $h[$i] * 0.006));
    if ($min[1] > $d) {
        $min = [$i, $d];
    }
}
echo $min[0] + 1;

// A
fscanf(STDIN, '%d %d', $x, $y);
echo($x + $y / 2);

exit;

// C
fscanf(STDIN, '%d %d', $n, $m);
for ($i  = 0; $i < $m; $i++) {
    fscanf(STDIN, '%d %d', $_p, $y[]);
    $p[] = $_p - 1;
    $c[] = $i;
}
array_multisort($p, $y, $c);
$j = 1;
for ($i = 0; $i < $m; $i++) {
    if (($p[$i - 1] ?? $p[$i]) !== $p[$i]) {
        $j = 1;
    }
    $num[$c[$i]] = str_pad($p[$i] + 1, 6, 0, STR_PAD_LEFT) . str_pad($j, 6, 0, STR_PAD_LEFT);
    $j++;
}
for ($i = 0; $i < $m; $i++) {
    echo $num[$i] . PHP_EOL;
}
