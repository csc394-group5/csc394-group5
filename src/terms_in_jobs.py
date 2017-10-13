import os

filelist = []
rootdir = '/Users/glennhintze/data/jobs'
for subdir, dirs, files in os.walk(rootdir):
    for file in files:
        print os.path.join(subdir, file)
        filelist.append(os.path.join(subdir, file))
        
print filelist #debug

for file in filelist:
    searchfile = open(file)
    termfile = open("/Users/glennhintze/data/keywords.txt", "r")
    outfile = open("/Users/glennhintze/data/output.txt", "a")

    # write the file name to the output
    print (file)
    outfile.write("%s\n" % (file))
    
    # variables
    termlist = []
    resultlist = []
    totalcount = 0

    countcheck = 0 #debug


    # build the list of terms to search for
    for line in termfile:
        term = str(line).replace("\n","")
        termlist.append(term)
    
    # print termlist
    # search for each term in each line of the file and append to results if found
    for line in searchfile:
        for term in termlist: 
            if term in line:
                totalcount += line.count(term)
                appendcount = line.count(term)
                for n in range (0, appendcount -1):
                    resultlist.append(term)

    # aggregate the results
    for term in termlist:
        termcount = 0
        for result in resultlist:
            if term == result:
                termcount += 1
        countcheck += termcount #debug
        # print term, ":", termcount
        outfile.write("%s : %d\n" % (term, termcount))


    # close the files
    searchfile.close()
    termfile.close()

    # print debug check
    # print "total count: ", totalcount
    # print "sum of counts: ", countcheck