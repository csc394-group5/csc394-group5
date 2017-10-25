var jobArray = [1, "Computer Systems Analyst", "Java", "Oracle", "C++", "Software Engineering", "", "Organization", "Teamwork", "Analyze", "Communication", "Independent"];

var studentArray = [123, "Glenn", "Hintze", "Java", 5, "C++", 3, "Python", 3, "Database Administration", 2, "MySql", 1, "Communication", 5, "Organization", 4, "Teamwork", 4, "Independent", 4, "Writing", 3];

// parse data

var jobName = jobArray[1];
var jobTechArray = [jobArray[2], 5, jobArray[3], 4, jobArray[4], 3, jobArray[5], 2, jobArray[6], 1];
var jobSoftArray = [jobArray[7], 5, jobArray[8], 4, jobArray[9], 3, jobArray[10], 2, jobArray[11], 1];


var studentName = studentArray[1] + " " + studentArray[2];
var studentTechArray = [studentArray[3], studentArray[4], studentArray[5], studentArray[6], studentArray[7],      studentArray[8], studentArray[9], studentArray[10], studentArray[11], studentArray[12]];
var studentSoftArray = [studentArray[13], studentArray[14], studentArray[15], studentArray[16], studentArray[17], studentArray[18], studentArray[19], studentArray[20], studentArray[21], studentArray[12]];

// search for each term in $studentTechArray for match in $jobTechArray

var jobScore = 0;
var x;
var y;

for (x = 0; x < studentTechArray.length; x += 2) {
    for (y = 0; y < jobTechArray.length; y += 2) {
        if (studentTechArray[x] === jobTechArray[x]) {
            jobScore += (studentTechArray[x + 1] * jobTechArray[x + 1]);
        }
    }
}

for (x = 0; x < studentSoftArray.length; x += 2) {
    for (y = 0; y < jobSoftArray.length; y += 2) {
        if (studentSoftArray[x] === jobSoftArray[x]) {
            jobScore += (studentSoftArray[x + 1] * jobSoftArray[x + 1]);
        }
    }
}

console.log("Job match score for " + studentName + " for job title " + jobName + " is " + jobScore + ".");