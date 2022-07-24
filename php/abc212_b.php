<?php

[$S] = strs();
if ($S[0] === $S[1] && $S[1] === $S[2] && $S[2] === $S[3]) {
    exit('Weak');
}
for ($i = 0; $i < 3; ++$i) {
    if (intval($S[$i + 1]) !== (intval($S[$i]) + 1) % 10) {
        exit('Strong');
    }
}
echo 'Weak';
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
