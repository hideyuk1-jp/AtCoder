<?php

[$X] = ints();
echo 100 - $X % 100;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
