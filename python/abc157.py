N = int(input())
S = list(input())
Q = int(input())
Query = [input().split() for i in range(Q)]

for q in Query:
    if q[0] == '1':
        idx = int(q[1]) - 1
        S[idx] = q[2]
    elif q[0] == '2':
        left = int(q[1]) - 1
        right = int(q[2])
        s_slice = S[left:right]
        print(len(list(set(s_slice))))
