#!/bin/bash
name=$1
oj dl "https://atcoder.jp/tasks/${contest}${problemname:0:3}_${problemname:3}"
oj dl "https://atcoder.jp/contests/${name:0:6}/tasks/${name:0:8}"
php ./$1.php
oj test
rm -f a.out
rm -rf test