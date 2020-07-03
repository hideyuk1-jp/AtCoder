<?php
list($n) = ints();
echo 180 * ($n - 2);
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
