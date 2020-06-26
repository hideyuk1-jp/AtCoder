<?php
list($n, $m) = ints();
for ($i = 1; $i <= $n; ++$i) if ($i !== $m) exit((string) $i . PHP_EOL);
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
