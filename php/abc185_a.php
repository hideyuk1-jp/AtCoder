<?php
$a = ints();
echo min($a);
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
