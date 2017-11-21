# A simple test flask app to be ported into pythonanywhere's website hosting service

from flask import *
import requests
from lxml import html

app = Flask(__name__)

# method will get the urls for jobs with the certain query and return the results for the num of pages requested
def jobPostings(query, pages):
    url = "https://www.monster.com/jobs/search/?q={}&intcid=skr_navigation_nhpso_searchMain"
    links = []

    for page in (1, pages):
        if page == 1:
            page = requests.get(url.format(query))
        else:
            page = requests.get(url.format(query) + "&page{}".format(page))
        tree = html.fromstring(page.content)
        links += tree.xpath('//*[@class="jobTitle"]//a/@href')

    if not links:
        return None
    else:
        return links

# method returns json string of urls with the given job and for the number of requested pages
def getjobs(job, pages):
    urls = jobPostings(job, pages)
    json = ""
    x = 1
    json += "["
    for i in range(0, len(urls)):
        json += "\"{}\"".format(urls[i])
        x += 1
        if i != len(urls) - 1:
            json += ","
    json += "]"

    return json

# home page
@app.route('/')
def hello_world():
    return 'Hello from Flask!'

# get method returns json
@app.route('/jobnames/hi', methods=['GET','POST'])
def get(jobname, pages):
    if request.method == 'GET':
        jobname = jobname.replace("-", " ")
        response = make_response(getjobs(jobname,1))
        #response = requests.post(url, json=getjobs(jobname,1))
