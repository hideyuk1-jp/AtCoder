<?php

// 重み付きUnion-Find：同じグループに属するかどうかの判定と根からの重みを保持する
class UnionFind2
{
    private $par; // par[$i]:$iの親 自分が根の場合は自身のindexとなる
    private $size; // size[$i]:$iが属するグループの頂点の数
    private $rank; // rank[$i]:$iの重み
    private $diff_weight; // diff_weight[$i]:$iの重みの差

    public function __construct($n, $sum_unity = 0)
    {
        for ($i = 0; $i < $n; $i++) {
            $this->par[$i] = $i; // 最初は全てが根
            $this->size[$i] = 1; // 最初は全て1
            $this->rank[$i] = 0; // 最初は全て0
            $this->diff_weight[$i] = $sum_unity;
        }
    }

    public function root($x)
    { // 根を返す
        if ($this->par[$x] === $x) {
            return $x;
        } // 根の場合
        $r = $this->root($this->par[$x]);
        $this->diff_weight[$x] += $this->diff_weight[$this->par[$x]]; // 全ての枝の重みの差を根との重みの差にする
        return $this->par[$x] = $r; // 全ての枝の親を根にする
    }

    public function weight($x)
    {
        $this->root($x);
        return $this->diff_weight[$x];
    }

    public function unite($x, $y, $w)
    { // $xと$yの木を併合
        $w += $this->weight($x);
        $w -= $this->weight($y);
        $ix = $this->root($x);
        $iy = $this->root($y);
        if ($ix === $iy) {
            return;
        }
        if ($this->rank[$ix] < $this->rank[$iy]) {
            list($ix, $iy) = [$iy, $ix];
            $w = -$w;
        }
        if ($this->rank[$ix] === $this->rank[$iy]) {
            $this->rank[$ix]++;
        }
        $this->size[$ix] += $this->size[$iy];
        $this->par[$iy] = $ix; // $yの根を$xの根に付ける
        $this->diff_weight[$iy] = $w;
    }

    public function isSame($x, $y)
    { // $xと$yの根が同じか
        return $this->root($x) === $this->root($y);
    }

    public function diff($x, $y)
    {
        return $this->weight($y) - $this->weight($x);
    }

    public function size($x)
    {
        return $this->size[$this->root($x)];
    }
}

fscanf(STDIN, '%d %d', $n, $m);

$tree = new UnionFind2($n);

for ($i  = 0; $i < $m; $i++) {
    fscanf(STDIN, '%d %d %d', $l, $r, $d);
    $l--;
    $r--; // 0 ~ $n-1に合わせる
    if ($tree->isSame($l, $r)) {
        $diff = $tree->diff($l, $r);
        if ($diff !== $d) {
            echo 'No' . PHP_EOL;
            exit();
        }
    } else {
        $tree->unite($l, $r, $d);
    }
}
echo 'Yes' . PHP_EOL;
