<?php
fscanf(STDIN, '%d %d', $N, $K);
$V = array_map('intval', explode(' ', trim(fgets(STDIN))));

$max = 0;
for($i = 0; $i <= min($K, $N); $i++) { // 全部で$i個取る場合を考える
    for($left = 0; $left <= $i; $left++) { // 左から$left個取る
        $right = $i - $left; // 右から$right個取る

        $have = array_merge(
            array_slice($V, 0, $left),
            array_slice($V, -$right, $right)
        );

        for($j = 0; $j < $K - $i; $j++) {
            if (empty($have)) break;
            $min = min($have);
            if ($min < 0) array_splice($have, array_search($min, $have), 1);
            else break;
        }
        $max = max($max, array_sum($have));
    }
}
echo $max . PHP_EOL;

exit();

fscanf(STDIN, '%d %d', $N, $M);
for($i = 0; $i < $M + 1; $i++) {
    if ($i < $M) {
        $s[$i] = array_map('intval', explode(' ', trim(fgets(STDIN))));
        $k[] = array_shift($s[$i]);
    } else {
        $p = array_map('intval', explode(' ', trim(fgets(STDIN))));
    }
}

$cnt = 0;
for ($i = 0; $i < 2 ** $N; $i++) {
    for ($j = 0; $j < $N; $j++) {
        if (($i >> $j) & 1) $switch[$j] = true;
        else $switch[$j] = false;
    }

    $flag = true;
    for($j = 0; $j < $M; $j++) {
        $s_cnt = 0;
        foreach ($s[$j] as $v) {
            if ($switch[$v - 1]) $s_cnt++;
        }
        if ($s_cnt % 2 !== $p[$j]) {
            $flag = false;
            break;
        }
    }
    if ($flag) $cnt++;
}
echo $cnt . PHP_EOL;

exit();

fscanf(STDIN, '%d', $N);
for ($i  = 0; $i < $N; $i++) {
    fscanf(STDIN, '%s %d', $S[], $P[]);
    $a[$i] = $i + 1;
}
array_multisort(
    $S, SORT_ASC, SORT_STRING,
    $P, SORT_DESC, SORT_NUMERIC,
    $a
);

for($i = 0; $i < $N; $i++) {
    echo $a[$i].PHP_EOL;
}

exit();

fscanf(STDIN, '%d %d', $A, $P);

echo floor(($A * 3 + $P) / 2) . PHP_EOL;
