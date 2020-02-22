print 'Content-type:text/html'
print ''

# 0 - 10
for i in range(11):
	print i

name = "King"

if name == "King" or name == "Queen":
	print "Hello King or Queen"
elif name == "haha":
	print "Hello haha"
else:
	print "I don't know you"


# Create a program which displays the first 50 prime numbers
numberOfPrimes = 0
number = 2

while numberOfPrimes < 50:
	isPrime = True

	for i in range(2, number):
		if number % i == 0:
			isPrime = False

	if isPrime == True:
		print number
		numberOfPrimes += 1

	number += 1