<?php
list($s) = strs();
for ($i = 0; $i < 28; ++$i) {
    for ($j = 0; $j < 28; ++$j) {
        for ($k = 0; $k < 28; ++$k) {
            $a = n2a($i) . n2a($j) . n2a($k);
            if ($a === '') continue;
            for ($l = 0; $l < strlen($s) - strlen($a) + 1; ++$l) {
                for ($m = 0; $m < strlen($a); ++$m) {
                    if ($a[$m] !== '.' && $a[$m] !== $s[$l + $m]) continue 2;
                }
                $cnt[$a] = true;
                break;
            }
        }
    }
}
echo count($cnt);
function n2a($x)
{
    if ($x === 26) return '.';
    if ($x === 27) return '';
    return chr(97 + $x);
}
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
