<?php
list($a, $r, $n) = ints();
if ($a * ($r ** ($n - 1)) > 10 ** 9) exit('large');
echo $a * ($r ** ($n - 1));
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
