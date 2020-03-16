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

// 出力
// そのまま
echo $ans . PHP_EOL;

// 配列をスペース区切り
echo implode(' ', $ans) . PHP_EOL;

// 配列を改行区切り
foreach ($ans as $v) echo $v . PHP_EOL;
