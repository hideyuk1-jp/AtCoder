<?php

list($n, $m) = ints();
echo($n - 1) * ($m - 1);
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
