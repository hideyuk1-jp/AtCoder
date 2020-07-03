<?php
list($n, $k) = ints();
echo $n - $k + 1;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
