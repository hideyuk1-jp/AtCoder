<?php
// C
fscanf(STDIN, '%d', $n);
$ans = 1001;
for ($i  = 0; $i < $n; $i++) fscanf(STDIN, '%d %d %d', $x[], $y[], $h[]);

for ($p = 0; $p <= 100; $p++) {
    for ($q = 0; $q <= 100; $q++) {
        $flag = true;
        $pH = null;
        for ($i = 0; $i < $n; $i++) {
            if ($h[$i] === 0) continue;
            $H  = $h[$i] + abs($x[$i] - $p) + abs($y[$i] - $q);
            if (isset($pH)) {
                if ($H !== $pH) {
                    $flag = false;
                    break;
                }
            }
            $pH = $H;
        }
        if ($flag) {
            for ($i = 0; $i < $n; $i++) {
                $ht = max($H - abs($x[$i] - $p) - abs($y[$i] - $q), 0);
                if ($ht !== $h[$i]) $flag = false;
            }
            if ($flag) {
                $ans = [$p, $q, $H];
                echo implode(' ', $ans);
                exit;
            }
        }
    }
}


exit;

// B
fscanf(STDIN, '%d %d', $N, $T);
$ans = 1001;
for ($i  = 0; $i < $N; $i++) {
    fscanf(STDIN, '%d %d', $c, $t);
    if ($t <= $T) {
        $ans = min($c, $ans);
    }
}
if ($ans !== 1001) {
    echo $ans;
} else {
    echo 'TLE';
}

exit;

// A
fscanf(STDIN, '%d', $n);
if ($n === 1) {
    echo 'Hello World';
    exit;
}
fscanf(STDIN, '%d', $a);
fscanf(STDIN, '%d', $b);
echo $a + $b;
