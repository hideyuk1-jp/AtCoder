<?php

[$M, $H] = ints();
echo $H % $M ? "No" : "Yes";
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
