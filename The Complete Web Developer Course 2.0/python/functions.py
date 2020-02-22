print 'Content-type:text/html'
print ''

# define a function
def sayHello():
	print "Hello!"

sayHello()



def saySomething(something):
	print something

saySomething("<br>I am something!")



def multiplyTwoNumbers(x, y):
	return x * y

print "<br>"
print multiplyTwoNumbers(2, 2)

# create a function highestCommonFactor which returns the highest number that divides into two numbers exactly

def getNumberDifferences(x, y):
	if x > y:
		return x - y
	if y > x:
		return y - x
	else:
		return 0

print "<br><br>"
print getNumberDifferences(8, 10)


# scope
a = 5
b = 6

def addTwoNumbers():
	return a + b

print addTwoNumbers()