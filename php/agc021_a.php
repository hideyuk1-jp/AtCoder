<?php
list($s) = strs();
echo max(((int) $s[0] - 1) + (strlen($s) - 1) * 9, digitSum($s));
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
function digitSum($n)
{
    return array_sum(array_map('intval', str_split((string) $n)));
}
