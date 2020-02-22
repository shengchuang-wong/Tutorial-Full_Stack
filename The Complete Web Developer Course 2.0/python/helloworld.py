print 'Content-type:text/html'
print ''
print 'Hello world'

age = 21

print '<br><br>'
print age

name = "geekgosh"

print '<br><br>'
print name

# cast string to number
print '<br><br>'
number = "5"
print 5 + int(number)

# string
print '<br><br>'
str = "My name is "
print str[0]
print str[0:5]

# concate string variable
print "<br>"
print str + name

# array list
print "<br><br>"
myList = ["King", "Queen", "Prince", "Princess"];
print myList
print myList[1]
print myList[2:4]

# readonly list
print "<br><br>"
myTuple = (1, 2, 3, 4)
print myTuple

# dictonary, dimensional array
print "<br><br>"
dict = {}
dict["dad"] = "King"
dict["mum"] = "Queen"
dict["bro"] = "Prince"
dict["sis"] = "Princess"

print dict
print '<br>'
print dict.keys()
print '<br>'
print dict.values()