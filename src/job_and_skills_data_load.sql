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

INSERT INTO TechSkills VALUES (1, "C");
INSERT INTO TechSkills VALUES (2, "C#");
INSERT INTO TechSkills VALUES (3, "C++");
INSERT INTO TechSkills VALUES (4, "DATABASE ADMINISTRATION");
INSERT INTO TechSkills VALUES (5, "DB2");
INSERT INTO TechSkills VALUES (6, "JAVA");
INSERT INTO TechSkills VALUES (7, "JAVASCRIPT");
INSERT INTO TechSkills VALUES (8, "MICROSOFT SQL SERVER");
INSERT INTO TechSkills VALUES (9, "MONGODB");
INSERT INTO TechSkills VALUES (10, "MYSQL");
INSERT INTO TechSkills VALUES (11, "OBJECTIVE-C");
INSERT INTO TechSkills VALUES (12, "ORACLE");
INSERT INTO TechSkills VALUES (13, "PYTHON");
INSERT INTO TechSkills VALUES (14, "R");
INSERT INTO TechSkills VALUES (15, "SOFTWARE ENGINEERING");
INSERT INTO TechSkills VALUES (16, "TESTING");
INSERT INTO TechSkills VALUES (17, "NONE");

INSERT INTO SoftSkills VALUES (1, "TEAMWORK");
INSERT INTO SoftSkills VALUES (2, "INDEPENDENCE");
INSERT INTO SoftSkills VALUES (3, "PROBLEM SOLVING");
INSERT INTO SoftSkills VALUES (4, "COMMUNICATION");
INSERT INTO SoftSkills VALUES (5, "ORGANIZATION");
INSERT INTO SoftSkills VALUES (6, "MULTIPLE PROJECTS");
INSERT INTO SoftSkills VALUES (7, "EXPERIMENTATION");
INSERT INTO SoftSkills VALUES (8, "PROCESS");
INSERT INTO SoftSkills VALUES (9, "CURIOSITY");
INSERT INTO SoftSkills VALUES (10, "ANALYTICAL");
INSERT INTO SoftSkills VALUES (11, "FORESIGHT");
INSERT INTO SoftSkills VALUES (12, "ADAPTATION");
INSERT INTO SoftSkills VALUES (13, "CREATIVE");
INSERT INTO SoftSkills VALUES (14, "NONE");

INSERT INTO Jobs VALUES (1, "COMPUTER SYSTEMS ANALYST", "TESTING", "ORACLE", "C", "C++", "JAVA", "PROBLEM SOLVING", "PROCESS", "ORGANIZATION", "TEAMWORK", "COMMUNICATION");
INSERT INTO Jobs VALUES (2, "DATA SCIENTIST", "PYTHON", "R", "TESTING", "JAVA", "C#", "PROCESS", "TEAMWORK", "PROBLEM SOLVING", "ORGANIZATION", "ANALYTICAL");
INSERT INTO Jobs VALUES (3, "DATABASE ADMINISTRATOR", "ORACLE", "MONGODB", "MYSQL", "TESTING", "DATABASE ADMINISTRATION", "PROBLEM SOLVING", "ORGANIZATION", "TEAMWORK", "COMMUNICATION", "PROCESS");
INSERT INTO Jobs VALUES (4, "IT SECURITY SPECIALIST", "TESTING", "C#", "DATABASE ADMINISTRATION", "ORACLE", "", "EXPERIMENTATION", "TEAMWORK", "ORGANIZATION", "PROCESS", "PROBLEM SOLVING");
INSERT INTO Jobs VALUES (5, "MOBILE APPLICATION DEVELOPER", "TESTING", "JAVA", "JAVASCRIPT", "C#", "OBJECTIVE-C", "PROBLEM SOLVING", "TEAMWORK", "COMMUNICATION", "PROCESS", "INDEPENDENCE");
INSERT INTO Jobs VALUES (6, "QUALITY ASSURANCE", "TESTING", "", "", "", "PROCESS", "TEAMWORK", "COMMUNICATION", "PROBLEM SOLVING", "ORGANIZATION");
INSERT INTO Jobs VALUES (7, "SOFTWARE DEVELOPER", "TESTING", "MYSQL", "C#", "JAVASCRIPT", "ORACLE", "TEAMWORK", "COMMUNICATION", "PROBLEM SOLVING",
"Organization", "Process");
INSERT INTO Jobs VALUES (8, "SOFTWARE ENGINEER", "JAVA", "JAVASCRIPT", "TESTING", "C#", "MONGODB", "PROBLEM SOLVING", "TEAMWORK", "ORGANIZATION", "PROCESS", "EXPERIMENTATION");
INSERT INTO Jobs VALUES (9, "USER EXPERIENCE", "JAVASCRIPT", "TESTING", "PYTHON", "", "", "TEAMWORK", "PROCESS", "PROBLEM SOLVING", "COMMUNICATION", "CREATIVE");
INSERT INTO JOBS VALUES (10, "WEB DEVELOPER", "JAVASCRIPT", "JAVA", "C#", "TESTING", "PYTHON", "TEAMWORK", "PROBLEM SOLVING", "COMMUNICATION", "PROCESS", "INDEPENDENCE");