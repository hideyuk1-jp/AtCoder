<?php
list($n, $m) = ints();
if ($n >= 2 && $m >= 2) $ans = ($n - 2) * ($m - 2);
elseif ($n === 1 && $m === 1) $ans = 1;
else $ans = max($n - 2, $m - 2);
echo $ans;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
