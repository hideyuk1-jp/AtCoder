<?php

list($n) = ints();
for ($i = 1; $i <= 5; ++$i) {
    if ($n === 10 ** $i) {
        exit('10');
    }
}
echo digitSum($n);
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
function digitSum($n)
{
    return array_sum(array_map('intval', str_split((string) $n)));
}
