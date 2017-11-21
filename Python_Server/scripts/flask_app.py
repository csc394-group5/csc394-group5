# Flask app hosted on pythonanywhere for the capstone project

from flask import Flask
from flask import make_response
from flask import request
from flask import jsonify
from flask_cors import CORS, cross_origin
import json

app = Flask(__name__)
cors = CORS(app, resources={r"/api/*": { "origins" : "*"}})

def buildarray(jobname,number):
        array = []
        f = open("/home/rmacwan/mysite/jobs/{}.txt".format(jobname), 'r')
        # if f.closed():
        #     return array
        x = 0
        for line in f:
            if x == number:
                break
            line = line.strip('\n')
            array.append(line)
            x += 1
        f.close()
        return array

# home page
@app.route('/', methods=['GET', 'POST'])
def hello_world():
    if request.method == 'GET':
        return "Hi, Fellow Interweab Travelers."

# get method returns json object of job urls
@app.route('/api/jobs/<jobname>', methods=['GET','POST', 'OPTIONS'])
@cross_origin()
def getjobs(jobname):
    # if (request.method == 'OPTIONS'):
    #     response = make_response('OK', 200)
    #     response.headers.set('Access-Control-Allow-Origin', '*')
    #     response.headers.set('Access-Control-Allow-Headers', 'Origin, X-Requested-With, Content-Type, Accept, Authorization')
    #     response.headers.set('Access-Control-Allow-Methods', 'POST, GET, PUT, DELETE')
    #     return response

    if request.method == 'GET':
        jobname = jobname.replace('-', ' ')
        jobname = jobname.replace('_', ' ')
        number = 5
        array = buildarray(jobname,number)
        response = make_response(jsonify({'jobs' : array}))
        # response.headers.set('Access-Control-Allow-Origin', '*')
        # response.headers.set('Access-Control-Allow-Headers', 'Origin, X-Requested-With, Content-Type, Accept, Authorization')
        # response.headers.set('Access-Control-Allow-Methods', 'OPTIONS, POST, GET, PUT, DELETE')
        # response.headers.set('content-type', 'application/json')
        return response

# get method returns json object of requested degree
@app.route('/api/degrees/<degree>', methods=['GET','POST','OPTIONS'])
@cross_origin()
def getDegree(degree):
    response = []
    if request.method == 'GET':
        degree = degree.replace('-', ' ')
        degree = degree.replace('_', ' ')
        with open('/home/rmacwan/mysite/degrees.json', encoding='utf-8') as f:
            data = json.load(f)
            response = make_response(jsonify(data[degree]))
        return response

if __name__ == '__main__':
    app.run(debug=True)
