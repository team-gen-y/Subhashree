from scipy.spatial import distance
def funtion(a,b):
    a = (1, 2)
    b = (1, 2)
    dst = distance.euclidean(a, b)
    print(dst)
