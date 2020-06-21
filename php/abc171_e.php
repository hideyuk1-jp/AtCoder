<?php
list($n) = ints();
$a = ints();
$l = strlen(decbin(max($a)));
$aor = 0;
for ($i = 0; $i < $n; ++$i) $aor = $aor ^ $a[$i];
for ($i = 0; $i < $n; ++$i) $b[$i] = $a[$i] ^ $aor;
echo implode(' ', $b);
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
