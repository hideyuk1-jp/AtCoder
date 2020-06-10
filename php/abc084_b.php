<?php
list($a, $b) = ints();
list($s) = strs();
for ($i = 0; $i < $a + $b + 1; $i++) {
    if (($i === $a && $s[$i] !== '-') || ($i !== $a && !is_numeric($s[$i]))) exit('No');
}
echo 'Yes';
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
