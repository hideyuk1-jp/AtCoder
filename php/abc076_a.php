<?php
list($r) = ints();
list($g) = ints();
echo $r + ($g - $r) * 2;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
