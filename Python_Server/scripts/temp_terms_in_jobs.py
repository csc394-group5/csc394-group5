import os

filelist = []
filenamelist = []
rootdir = '/Users/glennhintze/temp_data/jobs/upper/'
for subdir, dirs, files in os.walk(rootdir):
    for file in files:
        # print os.path.join(subdir, file)
        filelist.append(os.path.join(subdir, file))
        filenamelist.append(file)
        
#print filelist #debug

for file in filelist:
    searchfile = open(file)
    softskillfile = open("/Users/glennhintze/temp_data/skills/soft_skills.txt", "r")
    techskillfile = open("/Users/glennhintze/temp_data/skills/tech_skills.txt", "r")
    softoutfilename = '/Users/glennhintze/temp_data/output/results/soft/' + filenamelist[filelist.index(file)] 
    techoutfilename = '/Users/glennhintze/temp_data/output/results/tech/' + filenamelist[filelist.index(file)] 
    softoutfile = open(softoutfilename, "w")
    techoutfile = open(techoutfilename, "w")

    # write the file name to the output
    # print (file)
    # outfile.write("%s\n" % (file))
    
    # variables
    softtermlist = []
    techtermlist = []
    resultlist = []
    totalcount = 0

    countcheck = 0 #debug


    # build the list of terms to search for
    for line in softskillfile:
        term = str(line).replace("\n","")
        softtermlist.append(term.upper())
    
    # print termlist
    # search for each term in each line of the file and append to results if found
    for line in searchfile:
        for term in softtermlist: 
            if term in line:
                totalcount += line.count(term)
                appendcount = line.count(term)
                for n in range (0, appendcount -1):
                    resultlist.append(term)

    # aggregate the results
    for term in softtermlist:
        termcount = 0
        for result in resultlist:
            if term == result:
                termcount += 1
        countcheck += termcount #debug
        softoutfile.write("%s:%d\n" % (term, termcount))
    
    # return file cursor to beginning
    searchfile.seek(0)
    
    # build the list of terms to search for
    for line in techskillfile:
        term = str(line).replace("\n","")
        techtermlist.append(term.upper())
    
    # print termlist
    # search for each term in each line of the file and append to results if found
    # print file
    for line in searchfile:
        for term in techtermlist: 
            if term in line:
                totalcount += line.count(term)
                appendcount = line.count(term)
                for n in range (0, appendcount -1):
                    resultlist.append(term)
    # print resultlist
    # aggregate the results
    for term in techtermlist:
        termcount = 0
        for result in resultlist:
            if term == result:
                termcount += 1
        countcheck += termcount #debug
        # print term, ":", termcount
        techoutfile.write("%s:%d\n" % (term, termcount))


    # close the files
    searchfile.close()
    # print debug check
    # print "total count: ", totalcount
    # print "sum of counts: ", countcheck