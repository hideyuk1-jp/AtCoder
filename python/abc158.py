S = input()
Q = int(input())
Query = [input().split() for i in range(Q)]
cnt = 0
rev_cnt = []
for q in Query:
    if q[0] == '1':
        cnt += 1
    rev_cnt.append(cnt)


if rev_cnt[-1] % 2 == 0:
    ans = S
else:
    ans = S[::-1]

i = 0
for q in Query:
    if q[0] == '1':
        continue

    if (rev_cnt[-1] - rev_cnt[i]) % 2 == 0:
        tmp = q[2]
        if q[1] == '1':
            ans = tmp + ans
        else:
            ans = ans + tmp
    else:
        tmp = q[2][::-1]
        if q[1] == '1':
            ans = ans + tmp
        else:
            ans = tmp + ans

    i += 1

print(ans)
