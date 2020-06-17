<?php
list($n, $k) = ints();
echo $k * pow($k - 1, $n - 1);
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
