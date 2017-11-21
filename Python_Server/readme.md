# Python Server

These files are used by our python server to interface our website front end to monster.com job listings.
the results can be seen [here](https://nicholash2.sgedu.site/job_result.php) for a logged-in user.


[Pythonanywhere.com](https://www.pythonanywhere.com) provides a full Python environment as well as virtual environments, consoles, a file system,
task scheduler, and mysql and postgres databases. Our project took advantage of the site's virtual environment
to install custom modules as well as its file system to host relevant files for our api.


This server is used to fetch job listings from [monster.com](https://www.monster.com), descriptions, and all descriptions and urls pertaining
to degree information and coursework at DePaul's website.


The url for the site is [rmacwan.pythonanywhere.com](rmacwan.pythonanywhere.com).


Job requests are in the form /api/jobs/<jobname>. Variable jobname has hyphens or underscores between words. Request returns a json which includes the job description and 5 job postings. The site can be modified to return as many
job postings as needed.


[Job Request Example](rmacwan.pythonanywhere.com/api/jobs/Data-Scientist)


Degree requests are in the form /api/degrees/<degree>. Variable degree has hyphens or underscores between words. Request returns a json which includes descriptions and urls for up to any of the following:
    * Degree Description
    * About the Program
    * Curriculum and Requirements
    * Concentrations

[Degree Request Example](rmacwan.pythonanywhere.com/api/degrees/Computer-Science)





