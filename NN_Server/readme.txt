--NN_Server--

This folder containts a nodeJS server written from scratch (\NN_Server\server.js)
this server takes requests from the website front end, pulls profile data, passes it to our brain.js neural network interfaces (written from scratch) i.e. (\NN_Server\jnn.js & \NN_Server\dnn.js) and posts classification results to the application database.

Request Example:
i.e.    localhost:8081/?user=541&type=job
	localhost:8081/?user=541&type=degree
user= specifies user ID
type= specifies type of classification being performed.. i.e Job or Degree

