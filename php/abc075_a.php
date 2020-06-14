<?php
list($a, $b, $c) = ints();
if ($a === $b) echo $c;
if ($a === $c) echo $b;
if ($b === $c) echo $a;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
