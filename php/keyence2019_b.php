<?php
list($s) = strs();
$n = strlen($s);
for ($i = 0; $i < $n; ++$i) {
    for ($l = 0; $l <= $n - $i; ++$l) {
        $ss = substr($s, 0, $i) . substr($s, $i + $l);
        if ($ss === 'keyence') exit('YES');
    }
}
echo 'NO';
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
