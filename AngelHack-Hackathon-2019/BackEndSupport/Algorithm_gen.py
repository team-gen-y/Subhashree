import math

def Calculate(retention_rate,city_density,Distance_Inland_Flood,Cost_per_day_perPerson , coast_Line): 
	Day_Num = Distance_Inland_Flood/retention_rate
	n = Day_Num
	n = int(n)
	a = retention_rate 
	b = city_density 
	c =  Distance_Inland_Flood
	d = coast_Line
	total_duration_flood = c/a
	Area_of_elip = math.pi * c * d
	X = Cost_per_day_perPerson
	
	for i in range(n):
	    A = (a*(n-i))/c
	    print("Cost On day: " , i)
	    Each_Day_Cost =Area_of_elip * A * b * X
	    print("Cost on Day " , i)
	    print(Each_Day_Cost)


#chennai Statistics
print("For Chennai")
Calculate(2 , 1000 , 10 , 100 , 6)
