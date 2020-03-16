<?php
fscanf(STDIN, '%d %d', $n, $k);
$a = array_map('intval', explode(' ', trim(fgets(STDIN))));
$minus = $zero = $plus = [];
for ($i = 0; $i < $n; $i++) {
    if ($a[$i] < 0) {
        $minus[] = $a[$i];
    } elseif ($a[$i] == 0) {
        $zero[] = 0;
    } else {
        $plus[] = $a[$i];
    }
}

// マイナスになるものの組み合わせ
$kumi_minus = count($minus) * count($plus);
// 0になるものの組み合わせ
$kumi_zero = count($zero) * ($n - count($zero)) + count($zero) * (count($zero) - 1) / 2;
// プラスになるものの組み合わせ
$kumi_plus = count($plus) * (count($plus) - 1) / 2 + count($minus) * (count($minus) - 1) / 2;

if ($k <= $kumi_minus) {
    // k番目はマイナス
    sort($minus);
    rsort($plus);
    $min = $minus[0] * $plus[0];
    $max = $minus[count($minus) - 1] * $plus[count($plus) - 1];
    $mid = floor(($min + $max) / 2);

    // mid以下の数を数える
    while (true) {
        $cnt = $j = 0;
        $_max = -10 ** 9;
        for ($i = 0; $i < count($minus); $i++) {
            for ($j = $j; $j < count($plus); $j++) {
                if ($minus[$i] * $plus[$j] > $mid) {
                    $cnt += $j + 1;
                    if ($_max < $minus[$i] * $plus[$j - 1]) $_max = $minus[$i] * $plus[$j - 1];
                    break;
                }
            }
        }
        if ($cnt == $k) {
            $ans = $_max;
            $break;
        } elseif ($cnt > $k) {
            $max = $mid;
        } else {
            $min = $mid;
        }
    }
} elseif ($k <= $kumi_minus + $kumi_zero) {
    // k番目はゼロ
    $ans = 0;
} else {
    // k番目はプラス
    rsort($minus);
    sort($plus);
}

echo $ans . PHP_EOL;

exit;

fscanf(STDIN, '%d', $n);
for ($i  = 0; $i < $n; $i++) {
    fscanf(STDIN, '%s', $s[]);
}
$count = array_count_values($s);
arsort($count);
$c = 0;
$ans = [];
foreach ($count as $k => $v) {
    if ($c == 0) $c = $v;
    elseif ($c != $v) break;
    $ans[] = $k;
}
sort($ans);
foreach ($ans as $k => $v) {
    echo $v . PHP_EOL;
}

exit;

fscanf(STDIN, '%d', $n);
$a = array_map('intval', explode(' ', trim(fgets(STDIN))));
$ans = 'APPROVED';
for ($i = 0; $i < $n; $i++) {
    if ($a[$i] % 2 == 0 && $a[$i] % 3 != 0 && $a[$i] % 5 != 0) {
        $ans = 'DENIED';
        break;
    }
}
echo $ans . PHP_EOL;

exit;

fscanf(STDIN, '%d %d %d', $a, $b, $c);
$ans = (count(array_unique([$a, $b, $c])) == 2) ? "Yes" : "No";
echo $ans . PHP_EOL;
