<?php
list($s) = strs();
$n = strlen($s);
for ($i = 0; $i < $n; ++$i) {
    if ($s[$i] === 'A' && !isset($a)) $a = $i;
    if ($s[$i] === 'Z') $z = $i;
}
echo $z - $a + 1;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
