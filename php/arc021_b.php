<?php
list($n) = ints();
$a[0] = 0;
for ($i = 0; $i < $n; ++$i) {
    list($b) = ints();
    if ($i + 1 < $n) $a[$i + 1] = $a[$i] ^ $b;
    elseif ($b !== $a[$i] ^ $a[0]) exit('-1' . PHP_EOL);
}
echo implode(PHP_EOL, $a) . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
