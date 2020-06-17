<?php
list($n, $k) = ints();
$d = ints();
for ($i = $n; true; ++$i) {
    foreach ($d as $dd) if (strpos((string) $i, (string) $dd) !== false) continue 2;
    break;
}
echo $i;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
