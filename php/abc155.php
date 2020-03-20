<?php
fscanf(STDIN, '%d %d', $n, $k);
$a = array_map('intval', explode(' ', trim(fgets(STDIN))));
$minus = $zero = $plus = [];
for ($i = 0; $i < $n; $i++) {
    if ($a[$i] < 0) {
        $minus[] = -$a[$i];
    } elseif ($a[$i] === 0) {
        $zero[] = 0;
    } else {
        $plus[] = $a[$i];
    }
}

sort($plus);
sort($minus);

$cnt_plus = count($plus);
$cnt_zero = count($zero);
$cnt_minus = count($minus);

// プラスになるものの組み合わせ
$kumi_plus = $cnt_plus * ($cnt_plus - 1) / 2 + $cnt_minus * ($cnt_minus - 1) / 2;
// 0になるものの組み合わせ
$kumi_zero = $cnt_zero * ($n - $cnt_zero) + $cnt_zero * ($cnt_zero - 1) / 2;
// マイナスになるものの組み合わせ
$kumi_minus = $cnt_minus * $cnt_plus;

// 二分探索
$ok = -10 ** 18 - 1;
$ng = 10 ** 18 + 1;
while (abs($ok - $ng) > 1) {
    $mid = intdiv($ok + $ng, 2);
    if (cnt($mid) < $k) $ok = $mid;
    else $ng = $mid;
}
echo $ok;

// $x未満になるものの組み合わせの数を返す
function cnt($x)
{
    global $minus, $plus, $cnt_minus, $cnt_plus, $kumi_minus, $kumi_zero, $kumi_plus;

    if (!$x) { // 0の場合はマイナスになる組み合わせの数を返す
        return $kumi_minus;
    }

    if ($x > 0) {
        $res = $kumi_minus + $kumi_zero;

        // しゃくとり プラスxプラス
        $r = $cnt_plus - 1;
        for ($l = 0; $l < $cnt_plus; $l++) {
            while ($r > $l && $plus[$l] * $plus[$r] >= $x) {
                $r--;
            }
            $res += $r - $l;
            if ($l >= $r) break;
        }

        // しゃくとり マイナスxマイナス
        $r = $cnt_minus - 1;
        for ($l = 0; $l < $cnt_minus; $l++) {
            while ($r > $l && $minus[$l] * $minus[$r] >= $x) {
                $r--;
            }
            $res += $r - $l;
            if ($l >= $r) break;
        }

        return $res;
    }

    if ($x < 0) {
        $res = 0;

        // しゃくとり マイナスxプラス
        $r = 0;
        for ($l = $cnt_minus - 1; $l >= 0; $l--) {
            while ($r < $cnt_plus && -$minus[$l] * $plus[$r] >= $x) {
                $r++;
            }
            $res += $cnt_plus - $r;
        }

        return $res;
    }
}

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
