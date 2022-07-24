<?php

define('ROAD', '.');
define('WALL', '#');
list($h, $w) = ints();
for ($i = 0; $i < $h; ++$i) {
    list($a[]) = strs();
}
$sg = new SGraph($h, $w, $a);
$g = $sg->graph();
echo dfs() . PHP_EOL;
function dfs($from = 0, $d = 0)
{
    global $g, $memo;

    if (count($g[$from]) === 0) { //動かせない時
        if ($d % 2) {
            return 'First';
        } // Secondの番
        else {
            return 'Second';
        } // Firstの番
    }

    if (isset($memo[$from][$d % 2])) {
        return $memo[$from][$d % 2];
    }

    $cnt = [];
    foreach ($g[$from] as $to => $w) {
        $cnt[dfs($to, $d + 1)] = true;
    }
    if ($d % 2) { // Secondの番
        // Secondが勝つ選択肢があれば勝てる
        $memo[$from][$d % 2] = isset($cnt['Second']) ? 'Second' : 'First';
    } else { // Firstの番
        // Firstが勝つ選択肢があれば勝てる
        $memo[$from][$d % 2] =  isset($cnt['First']) ? 'First' : 'Second';
    }
    return $memo[$from][$d % 2];
}


// h x w のマス目の処理系
class SGraph
{
    private $g;
    private $h;
    private $w;

    // マス目の文字列からグラフを作成
    public function __construct($h, $w, $a)
    {
        $this->h = $h;
        $this->w = $w;
        $this->g = array_fill(0, $h * $w, []);
        for ($i = 0; $i < $h; ++$i) {
            for ($j = 0; $j < $w; ++$j) {
                if ($a[$i][$j] === WALL) {
                    continue;
                }
                $this->connectCustom($i, $j, $a);
            }
        }
    }

    // 右と下と右下が道の場合にグラフの辺（有向）をはる
    public function connectCustom($i, $j, $a)
    {
        $g = $this->g;
        $h = $this->h;
        $w = $this->w;
        $from = $i * $w + $j;
        if ($i < $h - 1 && $a[$i + 1][$j] === ROAD) {
            $to = ($i + 1) * $w + $j;
            $g[$from][$to] = 1;
        }
        if ($j < $w - 1 && $a[$i][$j + 1] === ROAD) {
            $to = $i * $w + $j + 1;
            $g[$from][$to] = 1;
        }
        if ($i < $h - 1 && $j < $w - 1 && $a[$i + 1][$j + 1] === ROAD) {
            $to = ($i + 1) * $w + $j + 1;
            $g[$from][$to] = 1;
        }

        $this->g = $g;
    }

    // 右と下が道の場合にグラフの辺をはる
    public function connectGraphRD($i, $j, $a)
    {
        $g = $this->g;
        $h = $this->h;
        $w = $this->w;
        $from = $i * $w + $j;
        if ($i < $h - 1 && $a[$i + 1][$j] === ROAD) {
            $to = ($i + 1) * $w + $j;
            $g[$from][$to] = 1;
            $g[$to][$from] = 1;
        }
        if ($j < $w - 1 && $a[$i][$j + 1] === ROAD) {
            $to = $i * $w + $j + 1;
            $g[$from][$to] = 1;
            $g[$to][$from] = 1;
        }
        $this->g = $g;
    }

    // 4方向（上下左右）が道の場合にグラフの辺をはる
    public function connectGraph4($i, $j, $a)
    {
        $g = $this->g;
        $h = $this->h;
        $w = $this->w;
        $from = $i * $w + $j;
        if ($i > 0 && $a[$i - 1][$j] === ROAD) {
            $to = ($i - 1) * $w + $j;
            $g[$from][$to] = 1;
            $g[$to][$from] = 1;
        }
        if ($j < $w - 1 && $a[$i][$j + 1] === ROAD) {
            $to = $i * $w + $j + 1;
            $g[$from][$to] = 1;
            $g[$to][$from] = 1;
        }
        if ($i < $h - 1 && $a[$i + 1][$j] === ROAD) {
            $to = ($i + 1) * $w + $j;
            $g[$from][$to] = 1;
            $g[$to][$from] = 1;
        }
        if ($j > 0 && $a[$i][$j - 1] === ROAD) {
            $to = $i * $w + $j - 1;
            $g[$from][$to] = 1;
            $g[$to][$from] = 1;
        }
        $this->g = $g;
    }

    // 4方向（斜め）が道の場合にグラフの辺をはる
    public function connectGraph4d($i, $j, $a)
    {
        $g = $this->g;
        $h = $this->h;
        $w = $this->w;
        $from = $i * $w + $j;
        if ($i > 0 && $j > 0 && $a[$i - 1][$j - 1] === ROAD) {
            $to = ($i - 1) * $w + $j - 1;
            $g[$from][$to] = 1;
            $g[$to][$from] = 1;
        }
        if ($i > 0 && $j < $w - 1 && $a[$i - 1][$j + 1] === ROAD) {
            $to = ($i - 1) * $w + $j + 1;
            $g[$from][$to] = 1;
            $g[$to][$from] = 1;
        }
        if ($i < $h - 1 && $j < $w - 1 && $a[$i + 1][$j + 1] === ROAD) {
            $to = ($i + 1) * $w + $j + 1;
            $g[$from][$to] = 1;
            $g[$to][$from] = 1;
        }
        if ($i < $h - 1 && $j > 0 && $a[$i + 1][$j - 1] === ROAD) {
            $to = ($i + 1) * $w + $j - 1;
            $g[$from][$to] = 1;
            $g[$to][$from] = 1;
        }
        $this->g = $g;
    }

    // 8方向が道の場合にグラフの辺をはる
    public function connectGraph8($i, $j, $a)
    {
        $this->connectGraph4($i, $j, $a);
        $this->connectGraph4d($i, $j, $a);
    }

    public function graph()
    {
        return $this->g;
    }
}

function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}

function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
