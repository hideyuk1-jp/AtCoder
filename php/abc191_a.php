<?php
fscanf(STDIN, '%d %d %d %d', $v, $t, $s, $d);
echo $v * $t > $d || $v * $s < $d ? 'Yes' : 'No';