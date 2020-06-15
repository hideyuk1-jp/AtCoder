<?php
list($s) = strs();
for ($i = 0; $i < strlen($s); ++$i) {
    $chr[$s[$i]] = true;
}
for ($i = 0; $i < 26; ++$i) {
    if (!isset($chr[chr(97 + $i)])) {
        echo chr(97 + $i);
        exit;
    }
}
echo 'None';
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
