CREATE TABLE Jobs (
    JobID int primary key,
    JobTitle varchar(255),
    TechSkill1 varchar(255),
    TechSkill2 varchar(255),
    TechSkill3 varchar(255),
    TechSkill4 varchar(255),
    TechSkill5 varchar(255),
    SoftSkill1 varchar(255),
    SoftSkill2 varchar(255),
    SoftSkill3 varchar(255),
    SoftSkill4 varchar(255),
    SoftSkill5 varchar(255)
);

CREATE TABLE TechSkills (
    TechSkillID int primary key,
    TechSkillName varchar(255)
);

CREATE TABLE SoftSkills (
    SoftSkillID int primary key,
    SoftSkillName varchar(255)
);

INSERT INTO TechSkills VALUES (1, "C#");
INSERT INTO TechSkills VALUES (2, "C++");
INSERT INTO TechSkills VALUES (3, "Database Administration");
INSERT INTO TechSkills VALUES (4, "DB2");
INSERT INTO TechSkills VALUES (5, "Java");
INSERT INTO TechSkills VALUES (6, "Microsoft SQL Server");
INSERT INTO TechSkills VALUES (7, "MongoDB");
INSERT INTO TechSkills VALUES (8, "MySQL");
INSERT INTO TechSkills VALUES (9, "Objective-C");
INSERT INTO TechSkills VALUES (10, "Oracle");
INSERT INTO TechSkills VALUES (11, "Python");
INSERT INTO TechSkills VALUES (12, "Software Engineering");
INSERT INTO TechSkills VALUES (13, "NONE");

INSERT INTO SoftSkills VALUES (1, "Analyze");
INSERT INTO SoftSkills VALUES (2, "Communication");
INSERT INTO SoftSkills VALUES (3, "Independent");
INSERT INTO SoftSkills VALUES (4, "Multiple Projects");
INSERT INTO SoftSkills VALUES (5, "Organization");
INSERT INTO SoftSkills VALUES (6, "Problem Solving");
INSERT INTO SoftSkills VALUES (7, "Speaking");
INSERT INTO SoftSkills VALUES (8, "Teamwork");
INSERT INTO SoftSkills VALUES (9, "Writing");
INSERT INTO SoftSkills VALUES (10, "NONE");

INSERT INTO Jobs VALUES (1, "Computer Systems Analyst", "Java", "Oracle", "C++", "Software Engineering", "", "Organization", "Teamwork", "Analyze", "Communication", "Independent");
INSERT INTO Jobs VALUES (2, "Data Scientist", "Python", "Java", "Software Engineering", "C#", "C++", "Teamwork", "Organization", "Communication", "Analyze", "Problem Solving");
INSERT INTO Jobs VALUES (3, "Database Administrator", "Oracle", "Database Administration", "MongoDB", "MySQL", "Python", "Organization", "Teamwork", "Communication", "Independent", "Analyze");
INSERT INTO Jobs VALUES (4, "IT Security Specialist", "C#", "Oracle", "", "", "", "Teamwork", "Organization", "Communication", "Independent", "Analyze");
INSERT INTO Jobs VALUES (5, "Mobile Application Developer", "Java", "C#", "Software Engineering", "Objective-C", "C++", "Teamwork", "Communication", "Analyze", "Independent", "Organization");
INSERT INTO Jobs VALUES (6, "Quality Assurance", "", "", "", "", "", "Teamwork", "Communication", "Organization", "Analyze", "Independent");
INSERT INTO Jobs VALUES (7, "Software Developer", "Java", "MySQL", "C#", "Oracle", "Software Engineering", "Teamwork", "Organization", "Writing", "Communication", "Independent");
INSERT INTO Jobs VALUES (8, "Software Engineer", "Java", "Software Engineering", "C#", "Database Administration", "MongoDB", "Teamwork", "Organization", "Communication", "Independent", "Writing");
INSERT INTO Jobs VALUES (9, "User Experience", "Java", "Python", "", "", "", "Teamwork", "Communication", "Independent", "Organization", "Analyze");
INSERT INTO Jobs VALUES (10, "Web Developer", "Java", "C#", "Software Engineering", "Python", "Microsoft SQL Server", "Teamwork", "Communication", "Independent", "Analyze", "Writing");