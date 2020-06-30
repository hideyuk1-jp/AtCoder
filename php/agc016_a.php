<?php
list($s) = strs();
$ans = PHP_INT_MAX;
for ($i = 0; $i < 26; ++$i)
    $ans = min($ans, max(array_map('strlen', explode(chr(97 + $i), $s))));
echo $ans;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
