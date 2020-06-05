#!/bin/bash
name=$1
oj dl "https://atcoder.jp/contests/${name:0:6}/tasks/${name:0:8}"
oj t -c " php ./$1.php"
rm -rf test