<?php
list($n) = ints();
$a = ints();
for ($i = 0; $i < $n; ++$i) $cnt[$a[$i]] = true;
$k = count($cnt);
echo ($n - $k) % 2 ? $k - 1 : $k;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
