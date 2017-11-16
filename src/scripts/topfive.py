import os

skilldict = {
    "TEAMWORK" : ["TEAMWORK", "TEAM"],
    "INDEPENDENCE" : ["INDEPENDENCE", "INDEPENDENT"],
    "PROBLEM SOLVING" : ["PROBLEM SOLVING", "SOLUTION", "SOLUTIONS", "BRAINSTORM", "BRAINSTORMING"],
    "COMMUNICATION" : ["COMMUNICATION", "COMMUNICATE", "VERBAL", "WRITING", "WRITTEN"],
    "ORGANIZATION" : ["ORGANIZATION", "ORGANIZE", "ORGANIZED"],
    "MULTIPLE PROJECTS" : ["MULTIPLE PROJECTS", "MULTITASK", "MULTITASKING"],
    "EXPERIMENTATION" : ["EXPERIMENTATION", "EXPERIMENT", "ASSESS", "ASSESSING", "ASSESSMENT"],
    "PROCESS" : ["PROCESS"],
    "CURIOSITY" : ["CURIOSITY", "EXAMINE"],
    "ANALYTICAL" : ["ANALYTICAL", "LOGICAL"],
    "FORESIGHT" : ["FORESIGHT", "PREDICT", "ANTICIPATE"],
    "ADAPTATION" : ["ADAPTATION", "ADAPT"],
    "CREATIVE" : ["CREATIVE", "CREATIVITY", "INNOVATIVE", "IMAGINATION"]
}

softfilelist = []
softfilenamelist = []
techfilelist = []
techfilenamelist = []

softrootdir = '/Users/glennhintze/temp_data/output/results/soft_sorted'
for subdir, dirs, files in os.walk(softrootdir):
    for file in files:
        softfilelist.append(os.path.join(subdir, file))
        softfilenamelist.append(file)
        
techrootdir = '/Users/glennhintze/temp_data/output/results/tech_sorted'
for subdir, dirs, files in os.walk(techrootdir):
    for file in files:
        techfilelist.append(os.path.join(subdir, file))
        techfilenamelist.append(file)
        
for file in softfilelist:
    outlist = []
    infile = open(file)
    softoutfilename = '/Users/glennhintze/temp_data/output/results/soft_top_five/' + softfilenamelist[softfilelist.index(file)]
    softoutfile = open(softoutfilename, 'w')
    for line in infile:
        inline = line
        chars = "1234567890(),\'\n "
        for char in chars:
            inline = inline.replace(char, "")
        for key in skilldict:
            value = skilldict.get(key)
            if inline in value:
                if key not in outlist:
                    outlist.append(key)

    for i in range(5):
        try:
            softoutfile.write(outlist[i].capitalize() + "\n")
        except IndexError:
            "Index out of bounds"
        
for file in techfilelist:
    infile = open(file)
    techoutfilename = '/Users/glennhintze/temp_data/output/results/tech_top_five/' + techfilenamelist[techfilelist.index(file)]
    techoutfile = open(techoutfilename, 'w')
    for i in range(5):
        line = infile.readline()
        chars = "1234567890(),\'\n "
        for char in chars:
            line = line.replace(char, "")
        techoutfile.write(line.capitalize() + "\n")
 
softoutfile.close()
techoutfile.close()
infile.close()

