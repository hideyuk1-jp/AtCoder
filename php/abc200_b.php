<?php

[$n, $k] = ints();
for ($i = 0; $i < $k; $i++) {
    if ($n % 200) {
        $n = $n * 1000 + 200;
    } else {
        $n /= 200;
    }
}
echo $n;

function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
