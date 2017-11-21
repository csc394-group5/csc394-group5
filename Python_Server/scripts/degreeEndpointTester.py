# Simple script to test degree endpoint on the pythonanywhere server

import json
import requests

# Local degree tester
def getDegree(degree):
    with open('degrees.json', encoding='utf-8') as f:
        data = json.load(f)
        print(data[degree])

# pythonanywhere endpoint degree tester
def getDegreeServer(degree):
    request = requests.get("https://rmacwan.pythonanywhere.com/api/degrees/{}".format(degree)).text
    print(request)

if __name__ == '__main__':
    degree = "MS Information Systems"
    getDegreeServer(degree)