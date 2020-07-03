<?php
list($n) = ints();
for ($i = 1; $i <= 50000; ++$i) {
    if (intdiv($i * 108, 100) === $n) exit((string) $i);
}
echo ':(';
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
