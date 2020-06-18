<?php
list($n) = ints();
$ans = 0;
for ($i = 0; $i < $n; ++$i) {
    list($a) = ints();
    if (isset($visited[$a])) $ans++;
    $visited[$a] = true;
}
echo $ans . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
