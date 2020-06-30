<?php
list($n) = ints();
$a = ints();
$cnt = 0;
foreach (array_info($a) as $v)
    $cnt += intdiv($v[1], 2);
echo $cnt;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
function array_info(array $a): array
{
    $n = count($a);
    $cnt = 0;
    for ($i = 0; $i < $n; $i++) {
        $cnt++;
        if ($i === $n - 1 || $a[$i] !== $a[$i + 1]) {
            $_a[] = [$a[$i], $cnt];
            $cnt = 0;
        }
    }
    return $_a;
}
