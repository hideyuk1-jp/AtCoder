<?php
list($n, $m, $d) = ints();
echo $d === 0 ? ($m - 1) / $n : ($m - 1) * 2 * ($n - $d) / ($n ** 2);
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
