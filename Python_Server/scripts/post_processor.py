import os

softfilelist = []
softfilenamelist = []
techfilelist = []
techfilenamelist = []

softrootdir = '/Users/glennhintze/temp_data/output/results/soft/'
for subdir, dirs, files in os.walk(softrootdir):
    for file in files:
        #print os.path.join(subdir, file)
        softfilelist.append(os.path.join(subdir, file))
        softfilenamelist.append(file)
        
techrootdir = '/Users/glennhintze/temp_data/output/results/tech/'
for subdir, dirs, files in os.walk(techrootdir):
    for file in files:
        #print os.path.join(subdir, file)
        techfilelist.append(os.path.join(subdir, file))
        techfilenamelist.append(file)
        
for file in softfilelist:
    jobfile = open(file)
    termlist = []
    maxval = 0
    
    while True:
        line = jobfile.readline()
        tmplist = line.split(':')
        try:
            outfilename = "/Users/glennhintze/temp_data/output/results/soft_sorted/" + softfilenamelist[softfilelist.index(file)]
            outfile = open(outfilename, 'w')
            # outfile.write(filenamelist[filelist.index(file)] + "\n")
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

for file in techfilelist:
    jobfile = open(file)
    termlist = []
    maxval = 0
    
    while True:
        line = jobfile.readline()
        tmplist = line.split(':')
        try:
            outfilename = "/Users/glennhintze/temp_data/output/results/tech_sorted/" + techfilenamelist[techfilelist.index(file)]
            outfile = open(outfilename, 'w')
            # outfile.write(filenamelist[filelist.index(file)] + "\n")
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