<?php
list($n, $m) = ints();
$a = ints();
$b = ints();
$da = array_diff($a, $b);
$db = array_diff($b, $a);
echo ($n - count($da)) / ($n + count($db));
echo PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
