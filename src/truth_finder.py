import mmap

alljobsFile = open('/Users/glennhintze/temp_data/jobs/UPPER_all_jobs.txt')
allskillsFile = open('/Users/glennhintze/temp_data/skills/all_skills.txt')
truthFile = open('/Users/glennhintze/temp_data/output/truth_output.txt', 'w+')
finalFile = open('/Users/glennhintze/temp_data/output/final_truth_output.txt', 'a')

skillslist = []
truthlist = []

# build the list of terms to search for
for line in allskillsFile:
    skill = str(line).replace("\n","")
    skillslist.append(skill)

# search for each term in each line of the file and append to results if found
for skill in skillslist: 
    data   = mmap.mmap(alljobsFile.fileno(), 0, access=mmap.ACCESS_READ)
    result = data.find(skill.upper())
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