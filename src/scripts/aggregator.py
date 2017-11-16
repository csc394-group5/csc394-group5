datafile = open("/Users/glennhintze/data/output2.txt", "r")
tempfile = open("/Users/glennhintze/data/tempoutput2.txt", "a")
aggfile = open("/Users/glennhintze/data/aggregatedoutput2.txt", "a")


# parse the data in the file and normalize it all as caps
for line in datafile:
    if line.endswith(".txt\n"):
        jobTitle = line
    else:
        deconLine = line.split(" : ")
        deconLine[0] = deconLine[0].title()
        #print deconLine
    
    jobFilePath = "/Users/glennhintze/data/%s.txt" % jobTitle
