<?php
// D
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
    {
        return $this->size[$this->root($x)];
    }
}

fscanf(STDIN, '%d %d', $n, $m);
$p = array_map('intval', explode(' ', trim(fgets(STDIN))));

$tree = new UnionFind($n);

for ($i  = 0; $i < $m; $i++) {
    fscanf(STDIN, '%d %d', $x, $y);
    $x--;
    $y--; // 0 ~ $n-1に合わせる
    $tree->unite($x, $y);
}

$cnt = 0;
for ($i = 0; $i < $n; $i++) {
    if ($i === $p[$i] - 1 || $tree->isSame($i, $p[$i] - 1)) $cnt++;
}

echo $cnt . PHP_EOL;

exit;

// C
fscanf(STDIN, '%s', $s);
fscanf(STDIN, '%d', $k);
$n = strlen($s);
for ($i = 0; $i < $n; $i++) {
    $lmax = min($n - $i, $k);
    for ($l = 1; $l <= $lmax; $l++) {
        $a[substr($s, $i, $l)] = true;
    }
}
$a = array_keys($a);
sort($a);
echo $a[$k - 1];

exit;

// B
fscanf(STDIN, '%d', $x);
$ans = 1;
for ($i = 2; $i <= $x; $i++) {
    $t = 2;
    while ($i ** $t <= $x) {
        $ans = max($ans, $i ** $t);
        $t++;
    }
}
echo $ans;

exit;

// A
fscanf(STDIN, '%d %d %d %d', $a, $b, $c, $d);
echo abs($a - $c) <= $d || (abs($a - $b) <= $d && abs($b - $c) <= $d) ? 'Yes' : 'No';
