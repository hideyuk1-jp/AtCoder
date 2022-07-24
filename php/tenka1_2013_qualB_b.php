<?php

list($q, $l) = ints();
$s = new MyStack($l);
$ans = [];
for ($i = 0; $i < $q; ++$i) {
    list($type, $n, $v) = strs();
    $n = (int) $n;
    if (isset($e)) {
        continue;
    }
    if ($type === 'Push') {
        if (!$s->push($v, $n)) {
            $ans[] = 'FULL';
            $e = true;
        }
    } elseif ($type === 'Pop') {
        if (!$s->pop($n)) {
            $ans[] = 'EMPTY';
            $e = true;
        }
    } elseif ($type === 'Top') {
        $top = $s->top();
        if ($top !== false) {
            $ans[] = $top;
        } else {
            $ans[] = 'EMPTY';
            $e = true;
        }
    } elseif ($type === 'Size') {
        $ans[] = $s->size();
    }
}
if (!isset($e)) {
    $ans[] = 'SAFE';
}
echo implode(PHP_EOL, $ans);
class MyStack
{
    private $l;
    private $a;
    private $size;

    public function __construct($l)
    {
        $this->l = $l;
        $this->a = [];
        $this->size = 0;
    }

    public function push($v, $n)
    {
        if ($this->l < $this->size + $n) {
            return false;
        }
        $this->a[] = [$v, $n];
        $this->size += $n;
        return true;
    }

    public function pop($n)
    {
        $a = $this->a;
        $size = $this->size;
        if ($size < $n) {
            return false;
        }
        if (count($a) === 0) {
            return false;
        }
        list($v, $m) = array_pop($a);
        $size -= $m;
        while ($m < $n) {
            $n -= $m;
            if (count($a) === 0) {
                return false;
            }
            list($v, $m) = array_pop($a);
            $size -= $m;
        }
        if ($size < 0) {
            return false;
        }
        $this->a = $a;
        $this->size = $size;
        if ($m > $n) {
            $this->push($v, $m - $n);
        }
        return true;
    }

    public function top()
    {
        $a = $this->a;
        if (count($a) === 0) {
            return false;
        }
        return $a[count($a) - 1][0];
    }

    public function size()
    {
        return $this->size;
    }
}
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
