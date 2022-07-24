<?php

list($n) = ints();
$t[] = '.###..#..###.###.#.#.###.###.###.###.###.';
$t[] = '.#.#.##....#...#.#.#.#...#.....#.#.#.#.#.';
$t[] = '.#.#..#..###.###.###.###.###...#.###.###.';
$t[] = '.#.#..#..#.....#...#...#.#.#...#.#.#...#.';
$t[] = '.###.###.###.###...#.###.###...#.###.###.';
$conv = array_fill(0, 10, '');
for ($i = 0; $i < 5; ++$i) {
    for ($j = 0; $j < 10 * 4; ++$j) {
        $conv[intdiv($j, 4)] .= $t[$i][$j];
    }
}
$conv = array_flip($conv);
for ($i = 0; $i < 5; ++$i) {
    list($s) = strs();
    for ($j = 0; $j < $n * 4; ++$j) {
        $x[intdiv($j, 4)] .= $s[$j];
    }
}
for ($i = 0; $i < $n; ++$i) {
    echo $conv[$x[$i]];
}
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
