import os

filelist = []
filenamelist = []

rootdir = '/Users/glennhintze/temp_data/jobs/'
for subdir, dirs, files in os.walk(rootdir):
    for file in files:
        # print os.path.join(subdir, file)
        filelist.append(os.path.join(subdir, file))
        filenamelist.append(file)

# print filelist #debug
# print filenamelist #debug


for file in filelist:
    sourcefile = open(file)
    destfilename = '/Users/glennhintze/temp_data/jobs/upper/' + filenamelist[filelist.index(file)] 
    destfile = open(destfilename, 'a')
    
    for line in sourcefile:
        destfile.write(line.upper())

sourcefile.close()
destfile.close()