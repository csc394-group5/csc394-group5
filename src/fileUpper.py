import mmap

alljobsFile = open('/Users/glennhintze/temp_data/all_jobs.txt')
upperFile = open('/Users/glennhintze/temp_data/UPPER_all_jobs.txt', 'a')

for line in alljobsFile:
    upperFile.write(line.upper())
    
alljobsFile.close()
upperFile.close()