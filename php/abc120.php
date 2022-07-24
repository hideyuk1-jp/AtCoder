<?php

fscanf(STDIN, '%d %d', $n, $m);
for ($i  = 0; $i < $m; $i++) {
    fscanf(STDIN, '%d %d', $a[], $b[]);
    $a[$i]--;
    $b[$i]--;
}
$u = new UnionFind($n);
$ans[$m - 1] = $n * ($n - 1) / 2;
for ($i = $m - 1; $i >= 1; $i--) {
    if ($u->isSame($a[$i], $b[$i])) {
        $ans[$i - 1] = $ans[$i];
    } else {
        $ans[$i - 1] = $ans[$i] - $u->size($a[$i]) * $u->size($b[$i]);
        $u->unite($a[$i], $b[$i]);
    }
}
for ($i = 0; $i < $m; $i++) {
    echo $ans[$i] . PHP_EOL;
}

// Union-Find：同じグループに属するかどうかを判定する
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

exit();

fscanf(STDIN, '%s', $s);
$n0 = substr_count($s, '0');
$n1 = substr_count($s, '1');
$min = min($n0, $n1);
$ans = $min * 2;
echo $ans . PHP_EOL;

exit();

fscanf(STDIN, '%d %d %d', $a, $b, $k);
$cnt = 0;
for ($i = min($a, $b); $i >= 1; $i--) {
    if ($a % $i === 0 && $b % $i === 0) {
        $cnt++;
        if ($cnt === $k) {
            $ans = $i;
            break;
        }
    }
}
echo $ans . PHP_EOL;

exit();

// 8:15
fscanf(STDIN, '%d %d %d', $a, $b, $c);
$ans = min((int)floor($b / $a), $c);
echo $ans . PHP_EOL;
