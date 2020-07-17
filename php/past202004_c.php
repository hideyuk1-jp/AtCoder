<?php
list($n) = ints();
for ($i = 0; $i < $n; ++$i) {
    list($s[]) = strs();
}
for ($i = $n - 2; $i >= 0; --$i) {
    for ($j = 1; $j < 2 * $n - 1; ++$j) {
        if ($s[$i][$j] === '#' && ($s[$i + 1][$j - 1] === 'X' || $s[$i + 1][$j] === 'X' || $s[$i + 1][$j + 1] === 'X'))
            $s[$i][$j] = 'X';
    }
}
echo implode(PHP_EOL, $s);
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
