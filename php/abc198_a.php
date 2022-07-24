<?php

[$n] = ints();
echo $n - 1;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
