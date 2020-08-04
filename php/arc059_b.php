<?php
list($s) = strs();
$prev = array_fill(0, 26, PHP_INT_MIN);
for ($i = 0; $i < strlen($s); ++$i) {
    if (4 > $i - $prev[ord($s[$i]) - 97] + 1)
        exit(($prev[ord($s[$i]) - 97] + 1) . ' ' . ($i + 1));
    $prev[ord($s[$i]) - 97] = $i;
}
echo '-1 -1';
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
