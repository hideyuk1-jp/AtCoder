<?php
list($s) = strs();
$cnt = ['a' => 0, 'b' => 0, 'c' => 0];
for ($i = 0; $i < strlen($s); ++$i) ++$cnt[$s[$i]];
echo abs(max($cnt) - min($cnt)) <= 1 ? 'YES' : 'NO';
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
