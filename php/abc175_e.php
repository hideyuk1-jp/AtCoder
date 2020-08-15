<?php
list($R, $C, $K) = ints();
for ($i = 0; $i < $K; ++$i) {
    list($r[]) = ints();
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
