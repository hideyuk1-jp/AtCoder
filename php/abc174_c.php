<?php
list($k) = ints();
$mod = $cnt = 0;
while (true) {
    $mod = ($mod * 10 + 7) % $k;
    ++$cnt;
    if (isset($f[$mod])) exit('-1'); // ループするので終了
    else $f[$mod] = true;
    if ($mod === 0) break;
}
echo $cnt;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
