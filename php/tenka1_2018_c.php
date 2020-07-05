<?php
list($n) = ints();
for ($i = 0; $i < $n; ++$i) {
    list($a[]) = ints();
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
