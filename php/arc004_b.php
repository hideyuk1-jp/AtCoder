<?php
list($n) = ints();
$max = 0;
for ($i = 0; $i < $n; ++$i) {
    list($d[$i]) = ints();
    $max += $d[$i];
}
echo $max . PHP_EOL;
if (max($d) > $max - max($d)) echo max($d) - ($max - max($d));
else echo '0';
echo PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
