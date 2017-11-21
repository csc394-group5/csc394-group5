#Script used to test the siteground endpoint

import requests
import operator

# Method used to test user survey results at the siteground endpoint
def databaseTest():
    results = requests.get("http://nicholash2.sgedu.site/app/api.php?r=1")

    data = results.json()
    print(results.text)
    jobRatingResult = []
    jobNameResults = []

    id = data[0]['UserID']
    jobNameResults.append(data[0]['Job1'])
    jobNameResults.append(data[0]['Job2'])
    jobNameResults.append(data[0]['Job3'])
    jobNameResults.append(data[0]['Job4'])
    jobNameResults.append(data[0]['Job5'])
    jobRatingResult.append(data[0]['JobResult1'])
    jobRatingResult.append(data[0]['JobResult2'])
    jobRatingResult.append(data[0]['JobResult3'])
    jobRatingResult.append(data[0]['JobResult4'])
    jobRatingResult.append(data[0]['JobResult5'])

    jobResult = {}

    # loop checks to make sure if duplicate jobs exist, that the higher result value is added
    for x in range(1, 5):
        if jobNameResults[x - 1] not in jobResult.keys():
            jobResult[jobNameResults[x - 1]] = jobRatingResult[x - 1];
        else:
            currVal = jobResult[jobNameResults[x - 1]]
            if (currVal < jobRatingResult[x - 1]):
                jobResult[jobNameResults[x - 1]] = jobRatingResult[x - 1]

    print(jobResult)

    sorted_jobResult = sorted(jobResult.items(), reverse=True, key=operator.itemgetter(1))
    print(sorted_jobResult)
    result = {}
    for x in range(0, len(sorted_jobResult)):
        name = sorted_jobResult[x][0]
        result[name] = requests.get("https://rmacwan.pythonanywhere.com/api/jobs/{}".format(name)).text

    return result

if __name__ == '__main__':
    print(databaseTest())
