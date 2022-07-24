<?php

list($h, $w) = [10, 10];
for ($i = 0; $i < $h; ++$i) {
    list($a[]) = strs();
}
$cnto = 0;
$uf = new UnionFind($h * $w);
for ($i = 0; $i < $h; ++$i) {
    for ($j = 0; $j < $w; ++$j) {
        if ($a[$i][$j] === 'x') {
            continue;
        }
        ++$cnto;
        if ($i < $h - 1 && $a[$i + 1][$j] === 'o') {
            $uf->unite($i * $w + $j, ($i + 1) * $w + $j);
        }
        if ($j < $w - 1 && $a[$i][$j + 1] === 'o') {
            $uf->unite($i * $w + $j, $i * $w + $j + 1);
        }
    }
}
for ($i = 0; $i < $h; ++$i) {
    for ($j = 0; $j < $w; ++$j) {
        if ($a[$i][$j] === 'o') {
            continue;
        }

        $cnt = 0;
        $root = [];
        if ($i > 0 && $a[$i - 1][$j] === 'o') {
            $x = ($i - 1) * $w + $j;
            $cnt += $uf->size($x);
            $root[$uf->root($x)] = true;
        }
        if ($j > 0 && $a[$i][$j - 1] === 'o') {
            $x = $i * $w + $j - 1;
            if (!isset($root[$uf->root($x)])) {
                $cnt += $uf->size($x);
                $root[$uf->root($x)] = true;
            }
        }
        if ($i < $h - 1 && $a[$i + 1][$j] === 'o') {
            $x = ($i + 1) * $w + $j;
            if (!isset($root[$uf->root($x)])) {
                $cnt += $uf->size($x);
                $root[$uf->root($x)] = true;
            }
        }
        if ($j < $w - 1 && $a[$i][$j + 1] === 'o') {
            $x = $i * $w + $j + 1;
            if (!isset($root[$uf->root($x)])) {
                $cnt += $uf->size($x);
                $root[$uf->root($x)] = true;
            }
        }
        if ($cnt === $cnto) {
            exit('YES' . PHP_EOL);
        }
    }
}
echo 'NO' . PHP_EOL;
class UnionFind
{
    private $par; // par[$i]:$iの親 自分が根の場合は自身のindexとなる
    private $size;

    public function __construct($n)
    {
        for ($i = 0; $i < $n; $i++) {
            $this->par[$i] = $i; // 最初は全てが根
            $this->size[$i] = 1;
        }
    }

    public function root($x)
    { // 根を返す
        if ($this->par[$x] === $x) {
            return $x;
        } // 根の場合
        return $this->par[$x] = $this->root($this->par[$x]); // 全ての枝の親を根にしながら再帰処理
    }

    public function unite($x, $y)
    { // $xと$yの木を併合
        $ix = $this->root($x);
        $iy = $this->root($y);
        if ($ix === $iy) {
            return;
        }
        if ($this->size[$ix] < $this->size[$iy]) {
            list($ix, $iy) = [$iy, $ix];
        }
        $this->size[$ix] += $this->size[$iy];
        $this->par[$iy] = $ix; // $yの根を$xの根に付ける
    }

    public function isSame($x, $y)
    { // $xと$yの根が同じか
        return $this->root($x) === $this->root($y);
    }

    public function size($x)
    {
        return $this->size[$this->root($x)];
    }
}
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
