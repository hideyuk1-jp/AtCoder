<?php
// 入出力

// 入力
// 文字列（長さはstrlenで取得出来る）
fscanf(STDIN, '%s', $s);

// 文字列を1文字ずつ配列で（長さはcountで取得出来る）
$s = str_split(trim(fgets(STDIN)));

// スペース区切りの複数数字
fscanf(STDIN, '%d %d %d', $a, $b, $c);

// 総数のあと、スペース区切りの数字の繰り返し
fscanf(STDIN, '%d', $n);
$a = array_map('intval', explode(' ', trim(fgets(STDIN))));

// 総数のあと、（数字＋改行）の繰り返し
fscanf(STDIN, '%d', $n);
for ($i  = 0; $i < $n; $i++) fscanf(STDIN, '%d', $a[]);

// 総数のあと、（スペース区切りの複数数字＋改行）の繰り返し
fscanf(STDIN, '%d', $n);
for ($i  = 0; $i < $n; $i++) fscanf(STDIN, '%d %d', $a[], $b[]);

// 総数のあと、（スペース区切りの数字の繰り返し＋改行）の繰り返し
fscanf(STDIN, '%d', $n);
for ($i  = 0; $i < $n; $i++) $a[] = array_map('intval', explode(' ', trim(fgets(STDIN))));

// 縦h x 横w の迷路を木構造に変換（壁=# 道=.）
define('WALL', '#');
define('ROAD', '.');
fscanf(STDIN, '%d %d', $h, $w);
for ($i  = 0; $i < $h; $i++) {
    $s[] = trim(fgets(STDIN));
}
$g = array_fill(0, $h * $w, []);
for ($i  = 0; $i < $h * $w; $i++) {
    $l = intval(floor($i / $w));
    $m = $i % $w;

    if ($s[$l][$m] === WALL) continue;

    if ($m < $w - 1 && $s[$l][$m + 1] === ROAD) {
        $g[$i][] = $i + 1;
        $g[$i + 1][] = $i;
    }

    if ($l < $h - 1 && $s[$l + 1][$m] === ROAD) {
        $g[$i][] = $i + $w;
        $g[$i + $w][] = $i;
    }
}


// 出力
// そのまま
echo $ans . PHP_EOL;

// 配列をスペース区切り
echo implode(' ', $ans) . PHP_EOL;

// 配列を改行区切り
foreach ($ans as $v) echo $v . PHP_EOL;
