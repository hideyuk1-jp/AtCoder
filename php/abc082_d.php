<?php

list($s) = strs();
list($x, $y) = ints();
$n = strlen($s);
$cnt_t = 0;
for ($i = 0; $i < $n; ++$i) {
    if ($s[$i] === 'F') {
        if (isset($cnt[$cnt_t])) {
            $cnt[$cnt_t]++;
        } else {
            $cnt[$cnt_t] = 1;
        }
    } else {
        $cnt_t++;
    }
}


echo $ans;

function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
