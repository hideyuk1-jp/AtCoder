<?php
$ns = ints();
echo max($ns[0] * $ns[2], $ns[0] * $ns[3], $ns[1] * $ns[2], $ns[1] * $ns[3]);
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
