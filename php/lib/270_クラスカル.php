<?php
// ABC065_D
list($n) = ints();
for ($i = 0; $i < $n; ++$i) {
    list($x[], $y[]) = ints();
    $xi[] = $i;
    $yi[] = $i;
}
array_multisort($x, SORT_ASC, $xi);
array_multisort($y, SORT_ASC, $yi);
$kr = new Kruskal($n);
for ($i = 0; $i < $n - 1; ++$i) {
    $kr->connect($xi[$i], $xi[$i + 1], abs($x[$i + 1] - $x[$i]));
    $kr->connect($yi[$i], $yi[$i + 1], abs($y[$i + 1] - $y[$i]));
}
echo $kr->solve();
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}

// 最小全域木
// 任意の2頂点間を行き来可能にするための最小コスト
class Kruskal
{
    private $X, $Y, $W;
    private $uft;

    function __construct($n)
    {
        $this->uft = new UnionFind($n);
    }

    function connect($x, $y, $w)
    {
        $this->X[] = $x;
        $this->Y[] = $y;
        $this->W[] = $w;
    }

    function solve()
    {
        $costSum = 0;
        array_multisort($this->W, $this->X, $this->Y);
        foreach ($this->W as $k => $w) {
            if (!$this->uft->isSame($this->X[$k], $this->Y[$k])) {
                $this->uft->unite($this->X[$k], $this->Y[$k]);
                $costSum += $w;
            }
        }
        return $costSum;
    }
}

class UnionFind
{
    private $par; // par[$i]:$iの親 自分が根の場合は自身のindexとなる
    private $size;

    function __construct($n)
    {
        for ($i = 0; $i < $n; $i++) {
            $this->par[$i] = $i; // 最初は全てが根
            $this->size[$i] = 1;
        }
    }

    function root($x)
    { // 根を返す
        if ($this->par[$x] === $x) return $x; // 根の場合
        return $this->par[$x] = $this->root($this->par[$x]); // 全ての枝の親を根にしながら再帰処理
    }

    function unite($x, $y)
    { // $xと$yの木を併合
        $ix = $this->root($x);
        $iy = $this->root($y);
        if ($ix === $iy) return;
        if ($this->size[$ix] < $this->size[$iy]) list($ix, $iy) = [$iy, $ix];
        $this->size[$ix] += $this->size[$iy];
        $this->par[$iy] = $ix; // $yの根を$xの根に付ける
    }

    function isSame($x, $y)
    { // $xと$yの根が同じか
        return $this->root($x) === $this->root($y);
    }

    function size($x)
    { // xが属するグループのサイズ
        return $this->size[$this->root($x)];
    }

    function count()
    { // グループの数
        $cnt = 0;
        foreach ($this->par as $i => $r)
            if ($i === $r) ++$cnt;
        return $cnt;
    }
}
