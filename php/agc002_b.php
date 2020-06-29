<?php
list($n, $m) = ints();
$redpos[0] = true;
$cnt = array_fill(0, $n, 1);
for ($i = 0; $i < $m; ++$i) {
    list($x, $y) = ints();
    --$x;
    --$y;
    --$cnt[$x];
    ++$cnt[$y];
    if (isset($redpos[$x])) {
        $redpos[$y] = true;
        if ($cnt[$x] === 0) unset($redpos[$x]);
    }
}
echo count($redpos);
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
