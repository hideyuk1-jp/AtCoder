<?php
list($n, $l) = ints();
list($s) = strs();
$tab = 1;
$cnt = 0;
for ($i = 0; $i < $n; ++$i) {
    if ($s[$i] === '+') ++$tab;
    elseif ($s[$i] === '-') --$tab;
    if ($tab > $l) {
        ++$cnt;
        $tab = 1;
    }
}
echo $cnt . PHP_EOL;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
