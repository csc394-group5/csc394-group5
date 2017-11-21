var http = require("http");
	mysql =require('mysql');
var port = 8081;
var output;
var saveResult = function(json){
	output+=json;
	return output;
}
var url = require("url");
	//CREATE SERVER &
	//HANDLE REQUESTS FROM CLIENT/

var s= http.createServer(function(request, response){

	// stop annoying browser double call.
	if (request.url === '/favicon.ico') {
    response.writeHead(200, {'Content-Type': 'image/x-icon'} );
    response.end();
    //console.log('favicon requested');
    return;
  }
  //if call was a GET method...
	if (request.method == 'GET') {
		
		// Get the request url
    var urlObj = url.parse(request.url, true);
		
	
	//
	// CALL JOB NEURAL NET FOR ?j=

	if (urlObj['query']['user'] != undefined) {
		if (urlObj['query']['type'] != undefined) {
        uid = urlObj['query']['user']; // take the 'j' from the URL querystring i.e. ?j=1
		response.writeHead(200, {"Content-Type": "application/json"});
		//console.log(uid + urlObj['query']['type']);
		// pull & parse USER information to pass to neural network
		var request = require("request");
	request("http://nicholash2.sgedu.site/app/api.php?u="+uid,function(error,response,body)
	{ 

if (urlObj['query']['type'] == 'job') {
	//include job match neural network (jnn.js)
	var jnn = require('./jnn');
	output = saveResult(jnn.getResults(urlObj['query']['user']));
	
} else if (urlObj['query']['type'] == 'degree') {
	//include degree match neural network (dnn.js)
	var dnn = require('./dnn');
	output = saveResult(dnn.getResults(urlObj['query']['user']));	
} else {
    console.log('invalid parameter');

}});
	//console.log(uid);
		//var test = jnn.getInfo(uid);
    }}}
		//console.log(uinfo);
	//call neural network, pass parsed keywords & respond with results JSON
	response.end(output);
	console.log("--------------");
}).listen(process.env.PORT || port);
console.log("Server is running...");
//console.log('Browse to '+process.env.PORT+' or localhost:'+port);


