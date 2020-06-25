<?php
list($s) = strs();
$date = strtotime($s);
$i = 0;
while (true) {
    list($y, $m, $d) = explode('/', date('Y/m/d', strtotime($s . "+${i} day")));
    if ((int) $y % (int) $m === 0 && intdiv((int) $y, (int) $m) % (int) $d === 0) break;
    ++$i;
}
echo "${y}/${m}/${d}" . PHP_EOL;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
