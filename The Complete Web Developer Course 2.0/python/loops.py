print 'Content-type: text/html'
print ''

print "START "
# i = 0 in default - so weird
for i in range(11):
	print i

print " END"

print "<br><br>START "
# set value of i = 5
for i in range(5, 11):
	print i

print " END"

# for loop
print "<br><br>START<br> "
characters = ["King", "Queen", "Prince", "Princess"]
for character in characters:
	print character + "<br>"

print " END"

print "<br><br>"
# while loop
x = 0
while x <= 10:
	print x
	x = x + 1


# for loop for dictionary
# note that dictonary does not store item in order form, it using index for define the value and location for item
print "<br><br>START<br> "
charactersDict = {}
charactersDict["King"] = 52
charactersDict["Queen"] = 40
charactersDict["Prince"] = 20
charactersDict["Princess"] = 18
for characterDict in charactersDict:
	print characterDict + " is " + str(charactersDict[characterDict]) + " years old<br>"

print " END"