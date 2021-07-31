<?php
[$a, $b] = ints();
if ($b === 0) {
    echo 'Gold';
} else if ($a === 0) {
    echo 'Silver';
} else {
    echo 'Alloy';
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
