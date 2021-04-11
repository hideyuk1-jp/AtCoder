<?php
[$r, $x, $y] = ints();
$d = sqrt($x ** 2 + $y ** 2);
if ($r > $d) echo 2;
else echo ceil($d / $r);
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
