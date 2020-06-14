<?php
$x = ints();
for ($i = 0; $i < 5; ++$i) {
    if ($x[$i] === 0) echo $i + 1;
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
