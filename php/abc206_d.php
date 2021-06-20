<?php
[$N] = ints();
$a = ints();
$uf = new UnionFind(2 * 10 ** 5 + 1);
for ($i = 0; $i < intdiv($N, 2); ++$i) {
    if ($a[$i] !== $a[$N - 1 - $i]) {
        $uf->unite($a[$i], $a[$N - 1 - $i]);
    }
}
$ans = 0;
$done = [];
for ($i = 1; $i <= 2 * 10 ** 5; ++$i) {
    $r = $uf->root($i);
    if (isset($done[$r])) continue;
    $ans += $uf->size($r) - 1;
    $done[$uf->root($r)] = true;
}
echo $ans;

function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
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
