<?php
for ($i = 0; $i < 3; ++$i) {
    [$s[]] = strs();
    $head[$s[$i][0]] = true;
}
$cnt = [];
for ($i = 0; $i < 3; ++$i) {
    for ($j = 0; $j < strlen($s[$i]); ++$j) {
        $cnt[$s[$i][$j]] = true;
    }
}
$keys = array_keys($cnt);
$l = count($cnt);
if ($l > 10) exit('UNSOLVABLE');
$nums = [];
$arr = range(0, 9);
dfs();
echo 'UNSOLVABLE';
function dfs($d = 0)
{
    global $s, $keys, $nums, $head, $l, $arr;
    if ($d === $l) {
        if ((int)$s[0] + (int)$s[1] === (int)$s[2]) {
            echo implode(PHP_EOL, $s);
            exit();
        }
        return;
    }
    $_arr = $arr;
    foreach ($_arr as $i) {
        // 最上位桁が0
        if ($i === 0 && isset($head[$keys[$d]])) continue;
        $_s = $s;
        for ($j = 0; $j < 3; ++$j) {
            $s[$j] = str_replace($keys[$d], $i, $s[$j]);
        }
        $nums[$d] = $i;
        $used[$i] = true;
        unset($arr[$i]);
        dfs($d + 1);
        $used[$i] = false;
        $arr[$i] = $i;
        $s = $_s;
    }
}
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
