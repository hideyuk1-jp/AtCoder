<?php
// 入力
$s = trim(fgets(STDIN));

$n = strlen($s);

// 答え出力用配列に0格納
$result = array_fill(0, $n, 0);

// 計算
$cnt = 1;
$top = 0;
for ($i = 0; $i < $n; ++$i) {
    if ($i < $n - 1 && $s[$i] === $s[$i + 1]) {
        ++$cnt;
    } else {
        if ($s[$i] === 'R') {
            $target = $top + $cnt - 1;
            $result[$target] += ceil($cnt / 2);
            $result[$target + 1] += floor($cnt / 2);
        } else {
            $target = $top - 1;
            $result[$target] += floor($cnt / 2);
            $result[$target + 1] += ceil($cnt / 2);
        }
        $cnt = 1;
        $top = $i + 1;
    }
}

// 出力
echo implode(' ', $result).PHP_EOL;

exit();

// 入力
$s = trim(fgets(STDIN));

$n = strlen($s);
// 答え出力用配列に0格納
$result = array_fill(0, $n, 0);

$r_top = 0;
// 'R...RL...L'ごとに処理
while($r_top < $n) {
    $l_top = strpos($s, 'L', $r_top);
    $r_last = $l_top - 1;
    $r_next = strpos($s, 'R', $l_top);
    if ($r_next) { // 次の'R'が見つかった場合
        $l_last = $r_next - 1;
    } else { // 次の'R'が見つからない場合
        $l_last = $n - 1;
    }
    $r_cnt = $r_last - $r_top + 1; // 'R'の個数
    $l_cnt = $l_last - $l_top + 1; // 'L'の個数

    // 'RL'の'R'に移動するのは'R'までの距離が偶数の'R'と'L'
    $result[$r_last] = ceil($r_cnt / 2) + floor($l_cnt / 2);
    // 'RL'の'L'に移動するのは'L'までの距離が偶数の'R'と'L'
    $result[$l_top] = floor($r_cnt / 2) + ceil($l_cnt / 2);

    $r_top = $l_last + 1;
}
echo implode(' ', $result).PHP_EOL;

exit();

$s = str_split(trim(fgets(STDIN)));
$n = count($s);
$res = [];
for ($i = 0; $i < $n; $i++) {
    $res[$i] = 0;
}
for ($i = 0; $i < $n; $i++) {
    if ($i < $n - 1 && $s[$i] === 'R' && $s[$i + 1] === 'L') {
        $x = $i;
    }
    if ($s[$i] === 'L') {
        if (($i - $x) % 2 === 0) {
            $res[$x]++;
        } else {
            $res[$x + 1]++;
        }
    }
}
for ($i =  $n - 1; $i >= 0; $i--) {
    if ($i > 0 && $s[$i] === 'L' && $s[$i - 1] === 'R') {
        $x = $i;
    }
    if ($s[$i] === 'R') {
        if (($x - $i) % 2 === 0) {
            $res[$x]++;
        } else {
            $res[$x - 1]++;
        }
    }
}
echo implode(' ', $res).PHP_EOL;

exit();

for ($i = 0; $i < count($s); $i++) {
    $x = $i; // 現在位置記録
    for ($j = 0; true; $j++) {
        if ($s[$x] === 'L') {
            if ($s[$x - 1] === 'R') { // 循環（$j回移動済み）
                if ($j % 2 === 0) { //残り偶数回移動
                    $res[$x]++;
                } else { // 残り奇数回移動
                    $res[$x - 1]++;
                }
                break;
            }
            $x--;
        } elseif($s[$x] === 'R') {
            if ($s[$x + 1] === 'L') { // 循環
                if ($j % 2 === 0) { //残り偶数回移動
                    $res[$x]++;
                } else { // 残り奇数回移動
                    $res[$x + 1]++;
                }
                break;
            }
            $x++;
        }
    }
}
echo implode(' ', $res).PHP_EOL;

exit();

$s = str_split(trim(fgets(STDIN)));

$res = [];
for ($i = 0; $i < count($s); $i++) {
    $res[$i] = 0;
}

for ($i = 0; $i < count($s); $i++) {
    $x = $i; // 現在位置記録
    for ($j = 0; true; $j++) {
        if ($s[$x] === 'L') {
            if ($s[$x - 1] === 'R') { // 循環（$j回移動済み）
                if ($j % 2 === 0) { //残り偶数回移動
                    $res[$x]++;
                } else { // 残り奇数回移動
                    $res[$x - 1]++;
                }
                break;
            }
            $x--;
        } elseif($s[$x] === 'R') {
            if ($s[$x + 1] === 'L') { // 循環
                if ($j % 2 === 0) { //残り偶数回移動
                    $res[$x]++;
                } else { // 残り奇数回移動
                    $res[$x + 1]++;
                }
                break;
            }
            $x++;
        }
    }
}
echo implode(' ', $res).PHP_EOL;

exit();

fscanf(STDIN, "%d", $n);
$h = array_map('intval', explode(' ', trim(fgets(STDIN))));

for ($i = $n - 1; $i >= 1; $i--) {
    if ($h[$i - 1] === $h[$i] + 1) {
        $h[$i - 1]--;
    } elseif ($h[$i - 1] > $h[$i] + 1) {
        exit ('No'.PHP_EOL);
    }
}
echo 'Yes'.PHP_EOL;

exit();
fscanf(STDIN, "%d", $n);
$cnt = 0;
for ($i = 1; $i <= $n; $i++) {
    if (strlen($i) % 2 === 1) {
        $cnt++;
    }
}
echo $cnt.PHP_EOL;

exit();
fscanf(STDIN, "%d %d %d", $a, $b, $c);
echo ($c - min($a - $b, $c)).PHP_EOL;

exit();
$d = array_map('intval', explode(' ', trim(fgets(STDIN))));

sort($d);
$i = $n / 2 - 1;
if ($d[$i] === $d[$i + 1]) {
    echo '0'.PHP_EOL;
} else {
    echo ($d[$i + 1] - $d[$i]).PHP_EOL;
}
?>