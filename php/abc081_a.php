<?php
list($s) = strs();
$ans = 0;
for ($i = 0; $i < strlen($s); ++$i) {
    if ($s[$i] === '1') $ans++;
}
echo $ans;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
