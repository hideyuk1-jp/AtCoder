<?php
list($n, $t) = ints();
for ($i = 0; $i < $n; ++$i) {
    list($a[$i], $b[$i]) = ints();
    $d[$i] = $a[$i] - $b[$i];
}
if (array_sum($b) > $t) exit('-1' . PHP_EOL);
rsort($d);
$sumt = array_sum($a);
$i = 0;
while ($sumt > $t) {
    $sumt -= $d[$i];
    ++$i;
}
echo $i . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
