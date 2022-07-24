<?php

list($s) = strs();
$n = strlen($s);
$us_top = $us_end = 0;
// 先頭と末尾の_を記録して取り除く
for ($i = 0; $i < intdiv($n, 2); ++$i) {
    if ($s[$i] !== '_') {
        break;
    }
    ++$us_top;
}
for ($i = $n - 1; $i >= intdiv($n, 2); --$i) {
    if ($s[$i] !== '_') {
        break;
    }
    ++$us_end;
}
$s = substr($s, $us_top, $n - $us_top - $us_end);
$n = strlen($s);
if (isCamel($s)) {
    $s = toSnake($s);
} elseif (isSnake($s)) {
    $s = toCamel($s);
}
echo str_repeat('_', $us_top) . $s . str_repeat('_', $us_end), PHP_EOL;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
function isCamel($s)
{
    return preg_match('/^([a-z][a-z0-9]*)([A-Z][a-z0-9]*)*$/', $s);
}
function isSnake($s)
{
    return preg_match('/^([a-z][a-z0-9]*)(_[a-z][a-z0-9]*)*$/', $s);
}
function toCamel($s)
{
    return lcfirst(strtr(ucwords(strtr($s, ['_' => ' '])), [' ' => '']));
}
function toSnake($s)
{
    return ltrim(strtolower(preg_replace('/[A-Z]/', '_\0', $s)), '_');
}
