<?php
list($a, $b) = strs();
$t[] = (int) ('9' . $a[1] . $a[2]) - (int) $b;
$t[] = (int) ($a[0] . '9' . $a[2]) - (int) $b;
$t[] = (int) ($a[0] . $a[1] . '9') - (int) $b;
$t[] = (int) $a - (int) ('1' . $b[1] . $b[2]);
$t[] = (int) $a - (int) ($b[0] . '0' . $b[2]);
$t[] = (int) $a - (int) ($b[0] . $b[1] . '0');
echo max($t) . PHP_EOL;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
