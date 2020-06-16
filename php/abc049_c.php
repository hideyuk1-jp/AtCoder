<?php
list($s) = strs();
$a = ['dreameraser', 'dreamerase', 'dreamer', 'dream', 'eraser', 'erase'];
$i = 0;
while ($i < strlen($s)) {
    foreach ($a as $v) {
        if ($v === substr($s, $i, strlen($v))) {
            $i += strlen($v);
            continue 2;
        }
    }
    exit('NO');
}
echo 'YES';
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
