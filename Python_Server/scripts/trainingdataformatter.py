import os

softfilelist = []
softfilenamelist = []
techfilelist = []
techfilenamelist = []

softrootdir = '/Users/glennhintze/temp_data/output/results/soft_top_five'
for subdir, dirs, files in os.walk(softrootdir):
    for file in files:
        softfilelist.append(os.path.join(subdir, file))
        softfilenamelist.append(file)
        
techrootdir = '/Users/glennhintze/temp_data/output/results/tech_top_five'
for subdir, dirs, files in os.walk(techrootdir):
    for file in files:
        techfilelist.append(os.path.join(subdir, file))
        techfilenamelist.append(file)
        
for file in techfilelist:
    infile = open(file)
    jobtitle = techfilenamelist[techfilelist.index(file)]
    outfilename = "/Users/glennhintze/temp_data/output/trainingdata/" + jobtitle
    outfile = open(outfilename, 'a')
    tmpline = jobtitle.replace(" ","_")
    firstoutline = tmpline.replace(".txt","")
    outfile.write("//" + firstoutline + "\n")
    outfile.write("\"")
    i = 5
    for line in infile:
        theline = line.replace(" ", "_")
        theline = theline.replace("\n", " ")
        outfile.write(theline * i)
        i = i - 1

    
for file in softfilelist:
    infile = open(file)
    jobtitle = softfilenamelist[softfilelist.index(file)]
    outfilename = "/Users/glennhintze/temp_data/output/trainingdata/" + jobtitle
    outfile = open(outfilename, 'a')
    i = 5
    for line in infile:
        theline = line.replace(" ", "_")
        theline = theline.replace("\n", " ")
        outfile.write(theline * i)
        i = i - 1
    outfile.write("\"")