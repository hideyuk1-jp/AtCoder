<?php
fscanf(STDIN, '%d', $n);
fscanf(STDIN, '%s', $s);

var_dump(substr_info($s));

function substr_info(string $s) {
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