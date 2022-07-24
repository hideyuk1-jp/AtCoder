<?php

list($s) = strs();
const PICS = ['S', 'H', 'D', 'C'];
const RSF_NUMS = ['A', '10', 'J', 'Q', 'K'];
$l = strlen($s);
foreach (PICS as $pic) {
    $dropCards[$pic] = [];
}
for ($i = 0; $i < $l; ++$i) {
    $pic = $s[$i];
    $num = $s[$i + 1];
    if (is_numeric($s[$i + 2])) {
        $num .= $s[$i + 2];
    }

    $setFlag = setRSF($pic, $num);
    foreach (PICS as $p) {
        if ($p === $pic && $setFlag) {
            continue;
        }
        $dropCards[$p][] = $pic . $num;
    }

    $picRSF = getPicRSF();
    if ($picRSF !== false) {
        if (count($dropCards[$picRSF]) === 0) {
            exit('0' . PHP_EOL);
        }
        echo implode('', $dropCards[$picRSF]) . PHP_EOL;
        exit;
    }

    $i += strlen($num);
}
function getPicRSF()
{
    global $cnt;
    foreach (PICS as $pic) {
        foreach (RSF_NUMS as $num) {
            if (!isset($cnt[$pic][$num])) {
                continue 2;
            }
        }
        return $pic;
    }
    return false;
}
function setRSF($p, $n)
{
    global $cnt;
    if (array_search($p, PICS) === false || array_search($n, RSF_NUMS) === false) {
        return false;
    }
    if (!isset($cnt[$p][$n])) {
        $cnt[$p][$n] = 1;
        return true;
    }
    return false;
}
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
