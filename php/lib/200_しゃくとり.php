<?php
// ARC022_B 同じ数字が現れない部分区間の最大長を求める
list($n) = ints();
$a = ints();
$ans = 0;
// 尺取
for ($l = $r = 0; $l < $n; ++$l) {
    $r = max($l, $r);
    while ($r < $n && !isset($cnt[$a[$r]])) {
        $cnt[$a[$r]] = true;
        ++$r;
    }
    unset($cnt[$a[$l]]);
    $ans = max($ans, $r - $l);
}
echo $ans . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}

exit;

// ABC155 D 二分探索の判定の中でしゃくとり
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
