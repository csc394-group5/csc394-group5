# Neural Netowrk Matching

**NN_Server**

This folder containts a nodeJS server written from scratch [\NN_Server\server.js](https://github.com/csc394-group5/csc394-group5/blob/master/NN_Server/server.js).
This server takes requests from the website front end, pulls profile data, passes it to our brain.js neural network interfaces (written from scratch); [job match](https://github.com/csc394-group5/csc394-group5/blob/master/NN_Server/jnn.js) & [degree match](https://github.com/csc394-group5/csc394-group5/blob/master/NN_Server/dnn.js) and posts classification results to the application database.

Request Example:
i.e.    
'''
localhost:8081/?user=541&type=job
localhost:8081/?user=541&type=degree
user= specifies user ID
type= specifies type of classification being performed.. i.e Job or Degree
'''

