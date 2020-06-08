<?php
list($n) = ints();
$s = strs();
for ($i = 0; $i < $n; $i++) {
    if ($s[$i] === 'Y') exit('Four');
}
echo 'Three';
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
