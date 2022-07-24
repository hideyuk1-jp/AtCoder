<?php

list($h, $w) = ints();
echo($w - 1) * $h + ($h - 1) * $w;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
