<?php
// 排他的論理和の重要な性質
$a = 3312;

// 0との排他的論理和は同じ数字になる
echo $a ^ 0;
echo PHP_EOL;

// 同じ数字との排他的論理和は0になる
echo $a ^ $a;
echo PHP_EOL;
