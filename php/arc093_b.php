<?php

list($a, $b) = ints();
for ($i = 0; $i < 100; ++$i) {
    if ($i < 50) {
        $s[] = str_repeat('#', 100);
    } else {
        $s[] = str_repeat('.', 100);
    }
}
--$a;
--$b;
for ($i = 0; $i < 50; $i += 2) {
    for ($j = 0; $j < 100; $j += 2) {
        if ($a === 0) {
            break 2;
        }
        $s[$i][$j] = '.';
        --$a;
    }
}
for ($i = 51; $i < 100; $i += 2) {
    for ($j = 0; $j < 100; $j += 2) {
        if ($b === 0) {
            break 2;
        }
        $s[$i][$j] = '#';
        --$b;
    }
}
echo '100 100', PHP_EOL;
for ($i = 0; $i < 100; ++$i) {
    echo $s[$i], PHP_EOL;
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
