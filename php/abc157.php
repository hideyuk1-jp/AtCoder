<?php
fscanf(STDIN, '%d', $n);
fscanf(STDIN, '%s', $s);
$s = str_split($s);
fscanf(STDIN, '%d', $q);
for ($i = 0; $i < $q; $i++) $query[] = explode(' ', trim(fgets(STDIN)));

for ($i = 0; $i < $q; $i++) {
    if ($query[$i][0] === '1') {
        $idx = intval($query[$i][1]) - 1;
        $s[$idx] = $query[$i][2];
    } elseif ($query[$i][0] === '2') {
        $offset = intval($query[$i][1]) - 1;
        $length = intval($query[$i][2]) - intval($query[$i][1]) + 1;
        $s_slice = array_slice($s, $offset, $length);
        echo count(array_unique($s_slice)) . PHP_EOL;
    }
}


exit;

fscanf(STDIN, '%d %d %d', $n, $m, $k);

$tree = new UnionFind($n);
$ans = array_fill(0, $n, -1);

for ($i  = 0; $i < $m; $i++) {
    fscanf(STDIN, '%d %d', $a, $b);
    $a--;
    $b--; // 0 ~ $n-1に合わせる
    $ans[$a]--;
    $ans[$b]--;
    $tree->unite($a, $b);
}

for ($i  = 0; $i < $k; $i++) {
    fscanf(STDIN, '%d %d', $c, $d);
    $c--;
    $d--;
    if ($tree->isSame($c, $d)) {
        $ans[$c]--;
        $ans[$d]--;
    }
}

for ($i = 0; $i < $n; $i++) {
    $ans[$i] += $tree->size($i);
}

echo implode(' ', $ans) . PHP_EOL;

// Union-Find：同じグループに属するかどうかを判定する
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

exit;

fscanf(STDIN, '%d %d', $n, $m);
for ($i  = 0; $i < $m; $i++) fscanf(STDIN, '%d %d', $s[], $c[]);

$arr = array_fill(0, $n, -1);
for ($i  = 0; $i < $m; $i++) {
    if ($arr[$s[$i] - 1] !== -1 && $arr[$s[$i] - 1] !== $c[$i]) {
        $ans = -1;
        break;
    }
    $arr[$s[$i] - 1] = $c[$i];
}

for ($i = 0; $i < $n; $i++) {
    if ($i == 0) {
        if ($arr[$i] === -1) {
            if ($n > 1) {
                $arr[$i] = 1;
            } else {
                $arr[$i] = 0;
            }
        }
        continue;
    }
    if ($arr[$i] === -1) {
        $arr[$i] = 0;
    }
}
if (strlen(strval(intval(implode('', $arr)))) !== $n) {
    $ans = -1;
}

if (!isset($ans)) {
    $ans = intval(implode('', $arr));
}
echo $ans . PHP_EOL;


exit;

for ($i  = 0; $i < 3; $i++) {
    $a[] = array_map('intval', explode(' ', trim(fgets(STDIN))));
    $check[] = [false, false, false];
}
fscanf(STDIN, '%d', $n);
for ($i  = 0; $i < $n; $i++) {
    fscanf(STDIN, '%d', $b);
    for ($j  = 0; $j < 3; $j++) {
        for ($k = 0; $k < count($a); $k++) {
            if ($a[$j][$k] == $b) {
                $check[$j][$k] = true;
            }
        }
    }
}

$ans = 'No';

for ($i = 0; $i < count($check); $i++) {
    $flag = true;
    for ($j = 0; $j < count($check[$i]); $j++) {
        if ($check[$i][$j] == false) {
            $flag = false;
            break;
        }
    }
    if ($flag) {
        $ans = 'Yes';
    }
}

for ($j = 0; $j < count($check); $j++) {
    $flag = true;
    for ($i = 0; $i < count($check); $i++) {
        if ($check[$i][$j] == false) {
            $flag = false;
            break;
        }
    }
    if ($flag) {
        $ans = 'Yes';
    }
}

$flag = true;
for ($i = 0; $i < count($check); $i++) {
    if ($check[$i][$i] == false) {
        $flag = false;
        break;
    }
}
if ($flag) {
    $ans = 'Yes';
}

$flag = true;
for ($i = 0; $i < count($check); $i++) {
    if ($check[count($check) - 1 - $i][$i] == false) {
        $flag = false;
        break;
    }
}
if ($flag) {
    $ans = 'Yes';
}

echo $ans . PHP_EOL;

exit;

fscanf(STDIN, '%d', $n);

$ans = ceil($n / 2);
echo $ans . PHP_EOL;
