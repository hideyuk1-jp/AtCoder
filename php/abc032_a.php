<?php
list($a) = ints();
list($b) = ints();
list($n) = ints();
while ($n % $a || $n % $b) ++$n;
echo $n . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
