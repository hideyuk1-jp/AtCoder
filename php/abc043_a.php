<?php

list($n) = ints();
echo($n + 1) * $n / 2;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
