<?php

[$a, $b] = ints();
if ($a + $b >= 15 && $b >= 8) {
    exit("1");
}
if ($a + $b >= 10 && $b >= 3) {
    exit("2");
}
if ($a + $b >= 3) {
    exit("3");
}
exit("4");
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
