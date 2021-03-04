<?php
[$N] = ints();
$a = 1;
$num1 = 5;
while ($num1 <= $N) {
    $num2 = 3;
    $b = 1;
    while ($num1 + $num2 <= $N) {
        if ($num1 + $num2 === $N) exit("${b} ${a}");
        ++$b;
        $num2 *= 3;
    }
    ++$a;
    $num1 *= 5;
}
echo -1;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
