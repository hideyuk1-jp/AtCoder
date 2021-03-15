<?php
[$N] = ints();
for ($i = 0; $i < $N; ++$i) {
    [$x[], $y[], $r[]] = ints();
    $ans[] = [$x[$i], $y[$i], $x[$i] + 1, $y[$i] + 1];
}
for ($i = 0; $i < $N; ++$i) {
    echo implode(" ", $ans[$i]), PHP_EOL;
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
