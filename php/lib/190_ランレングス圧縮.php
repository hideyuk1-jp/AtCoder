<?php

fscanf(STDIN, '%d', $n);
fscanf(STDIN, '%s', $s);

var_dump(substr_info($s));

// 文字列の要素と連続数を格納した配列を返す
function substr_info(string $s): array
{
    $n = strlen($s);
    $cnt = 0;
    for ($i = 0; $i < $n; $i++) {
        $cnt++;
        if ($i === $n - 1 || $s[$i] !== $s[$i + 1]) {
            $_s[] = [$s[$i], $cnt];
            $cnt = 0;
        }
    }
    return $_s;
}

// 配列の要素と連続数を格納した配列を返す
function array_info(array $a): array
{
    $n = count($a);
    $cnt = 0;
    for ($i = 0; $i < $n; $i++) {
        $cnt++;
        if ($i === $n - 1 || $a[$i] !== $a[$i + 1]) {
            $_a[] = [$a[$i], $cnt];
            $cnt = 0;
        }
    }
    return $_a;
}
