<?php
[$n] = ints();
$cnt = 0;
for ($a = 1; $a < $n; ++$a)
    $cnt += intdiv($n - 1, $a);
echo $cnt . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
