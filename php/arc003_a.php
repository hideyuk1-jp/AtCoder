<?php
list($n) = ints();
list($r) = strs();
$score = ['A' => 4, 'B' => 3, 'C' => 2, 'D' => 1, 'F' => 0];
$gpa = 0;
for ($i = 0; $i < $n; ++$i) $gpa += $score[$r[$i]];
echo ($gpa / $n) . PHP_EOL;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
