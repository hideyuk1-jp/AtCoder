<?php
list($n) = ints();
for ($i = $n; $i >= 1; --$i) {
    if (pow((int) sqrt($i), 2) === $i) break;
}
echo $i;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
