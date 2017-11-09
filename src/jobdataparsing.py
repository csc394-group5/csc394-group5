import mmap
import os

def single_file_upper
    # Hard coded file references should be removed
    alljobsFile = open('/Users/glennhintze/temp_data/all_jobs.txt')
    upperFile = open('/Users/glennhintze/temp_data/UPPER_all_jobs.txt', 'a')

    for line in alljobsFile:
        upperFile.write(line.upper())

    alljobsFile.close()
    upperFile.close()
    
def multi_file_upper
    filelist = []
    filenamelist = []

    rootdir = '/Users/glennhintze/temp_data/jobs/'
    for subdir, dirs, files in os.walk(rootdir):
        for file in files:
            filelist.append(os.path.join(subdir, file))
            filenamelist.append(file)

    for file in filelist:
        sourcefile = open(file)
        destfilename = '/Users/glennhintze/temp_data/jobs/upper/' + filenamelist[filelist.index(file)] 
        destfile = open(destfilename, 'a')

        for line in sourcefile:
            destfile.write(line.upper())

    sourcefile.close()
    destfile.close()

def parser

    filelist = []
    filenamelist = []
    rootdir = '/Users/glennhintze/temp_data/jobs/upper/'
    for subdir, dirs, files in os.walk(rootdir):
        for file in files:
            # print os.path.join(subdir, file)
            filelist.append(os.path.join(subdir, file))
            filenamelist.append(file)

    for file in filelist:
        searchfile = open(file)
        termfile = open("/Users/glennhintze/temp_data/all_skills.txt", "r")
        outfilename = '/Users/glennhintze/temp_data/results/' + filenamelist[filelist.index(file)] 
        outfile = open(outfilename, "w")

        # write the file name to the output
        # outfile.write("%s\n" % (file))

        # variables
        termlist = []
        resultlist = []
        totalcount = 0

        countcheck = 0 #debug

        # build the list of terms to search for
        for line in termfile:
            term = str(line).replace("\n","")
            termlist.append(term.upper())

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
            outfile.write("%s:%d\n" % (term, termcount))


        # close the files
        searchfile.close()
        termfile.close()
def data_post_processer

    filelist = []
    filenamelist = []

    rootdir = '/Users/glennhintze/temp_data/results/'
    for subdir, dirs, files in os.walk(rootdir):
        for file in files:
            # print os.path.join(subdir, file)
            filelist.append(os.path.join(subdir, file))
            filenamelist.append(file)

    for file in filelist:
        jobfile = open(file)
        termlist = []
        maxval = 0

        while True:
            line = jobfile.readline()
            tmplist = line.split(':')
            try:
                outfilename = rootdir + "sorted/" + filenamelist[filelist.index(file)]
                outfile = open(outfilename, 'w')
                outfile.write(filenamelist[filelist.index(file)] + "\n")
                print tmplist
                quant = int(tmplist[1].replace("\n",""))
                termtup = (tmplist[0], quant)
                print termtup
                termlist.append(termtup)
                termlist.sort(key=lambda tup: tup[1], reverse=True)
                # print termlist
                # print termtup  
                for term in termlist:
                    outfile.write(str(term))
                    outfile.write("\n")

            except IndexError:
                "Index out of bounds"

            if not line:
                break

    jobfile.close()
def truth_finder

    alljobsFile = open('/Users/glennhintze/temp_data/all_jobs.txt')
    allskillsFile = open('/Users/glennhintze/temp_data/all_skills.txt')
    truthFile = open('/Users/glennhintze/temp_data/truth_output.txt', 'w+')
    finalFile = open('/Users/glennhintze/temp_data/final_file.txt', 'a')

    skillslist = []
    truthlist = []

    # build the list of terms to search for
    for line in allskillsFile:
        skill = str(line).replace("\n","")
        skillslist.append(skill)

    # search for each term in each line of the file and append to results if found
    for skill in skillslist: 
        data   = mmap.mmap(alljobsFile.fileno(), 0, access=mmap.ACCESS_READ)
        result = data.find(skill)
        truthlist.append(skill)
        truthlist.append(result)
        str_result = str(result)
        truthFile.write(skill + " : " + str_result + "\n")

    truthFile.seek(0)

    for line in truthFile:
        if ("-1" in line):
            finalFile.write(line)



    truthFile.close()
    finalFile.close()