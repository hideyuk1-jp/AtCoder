<?php
list($q) = ints();
$ms = new MyStr();
for ($i = 0; $i < $q; ++$i) {
    list($type, $a, $b) = strs();
    if ($type === '1') {
        $ms->insert($a, (int)$b);
    } elseif ($type === '2') {
        $ans[] = $ms->delete((int)$a);
    }
}
echo implode(PHP_EOL, $ans);
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
class MyStr
{
    private $strs;
    private $top;

    function __construct()
    {
        $this->strs = [];
        $this->top = 0;
    }

    function insert($c, $x)
    {
        $this->strs[] = [$c, $x];
    }

    function delete($x)
    {
        $cnt = [];
        $strs = $this->strs;
        $top = $this->top;
        while ($x > 0) {
            if (!isset($strs[$top])) break;
            list($c, $n) = $strs[$top];
            if ($x >= $n) {
                if (isset($cnt[$c])) $cnt[$c] += $n;
                else $cnt[$c] = $n;
                ++$top;
                $x -= $n;
            } else {
                if (isset($cnt[$c])) $cnt[$c] += $x;
                else $cnt[$c] = $x;
                $strs[$top][1] = $n - $x;
                break;
            }
        }
        $this->strs = $strs;
        $this->top = $top;
        $res = 0;
        foreach ($cnt as $c)
            $res += $c ** 2;
        return $res;
    }
}
