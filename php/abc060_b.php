<?php
list($a, $b, $c) = ints();
for ($i = $a; $i <= $a * $b; $i += $a)
    if ($i % $b === $c) exit('YES');
echo 'NO';
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
