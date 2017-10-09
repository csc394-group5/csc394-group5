searchfile = open("/Users/glennhintze/data/Data Scientist.txt", "r")
termfile = open("/Users/glennhintze/data/keywords.txt", "r")

# variables
termlist = []
resultlist = []
totalcount = 0

countcheck = 0 #debug


# build the list of terms to search for
for line in termfile:
    term = str(line).replace("\r\n","")
    termlist.append(term)
    
# search for each term in each line and append to results if found
for line in searchfile:
    for term in termlist: 
        if term in line: 
            totalcount += 1
            resultlist.append(term)
              
# aggregate the results
for term in termlist:
    termcount = 0
    for result in resultlist:
        if term == result:
            termcount += 1
    countcheck += termcount #debug
    print term, ":", termcount
        
        
        
        
searchfile.close()
termfile.close()


#print resultlist
print "total count: ", totalcount
print "sum of counts: ", countcheck