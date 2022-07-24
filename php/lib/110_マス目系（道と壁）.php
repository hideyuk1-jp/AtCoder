<?php

define('ROAD', '.');
define('WALL', '#');
list($h, $w) = [3, 3];
$n = $h * $w;
$a = [
    '.#.',
    '.##',
    '..#'
];
$sg = new SGraph($h, $w, $a);
var_dump($sg->graph());

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
                $this->connectGraphRD($i, $j, $a);
            }
        }
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
