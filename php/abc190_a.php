<?php
fscanf(STDIN, '%d %d %d', $a, $b, $c);
if ($a === $b) {
	echo $c ? 'Takahashi' : 'Aoki';
} elseif ($a > $b) {
	echo 'Takahashi';
} else {
	echo 'Aoki';
}