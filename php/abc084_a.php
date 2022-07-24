<?php

list($m) = ints();
echo 48 - $m;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
