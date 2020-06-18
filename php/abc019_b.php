<?php
list($s) = strs();
$a = substr_info($s);
$ans = '';
foreach ($a as $v) {
    $ans .= $v[0] . $v[1];
}
echo $ans . PHP_EOL;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
function substr_info(string $s)
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
