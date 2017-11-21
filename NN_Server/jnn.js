function results(input) {
var mimir = require('mimir'),
brain = require('brain');
const fs = require('fs');
var string;
var data="";

function setData(value) {
  data += value +" ";
  //console.log(data);
  return data.value;
}
/* few utils for the example */

function vec_result(res, num_classes) {
  var i = 0,
    vec = [];
  for (i; i < num_classes; i += 1) {
    vec.push(0);
  }
  vec[res] = 1;
  return vec;
}

function maxarg(array) {
  return array.indexOf(Math.max.apply(Math, array));
}

function getclass(array,arg) {
  return array.indexOf(arg);
}
var sort_by = function(field, reverse, primer){

   var key = primer ? 
       function(x) {return primer(x[field])} : 
       function(x) {return x[field]};

   reverse = !reverse ? 1 : -1;

   return function (a, b) {
       return a = key(a), b = key(b), reverse * ((a > b) - (b > a));
     } 
}


function getArray(array){
var resultArr = [];
for(i=0; i<array.length; i++){
//resultArr.push(classes_array[getclass(array,array[i])]+array[i]);
//resultArr.push(array[i]);
resultArr.push({
        key: classes_array[getclass(array,array[i])],
        value: array[i],
    });
//console.log(classes_array[getclass(array,array[i])],array[i]);
}
return resultArr;
}

function getMap(array){
var map = {};
for(i=0; i<array.length; i++){
//console.log(classes_array[getclass(array,array[i])]);
//console.log(array[i]);
map[array[i]] = classes_array[getclass(array,array[i])];
}

return map
}

function getValue(object, value) {
  return object[value];
}

function saveMap(m){
    fs.writeFile("network.json", JSON.stringify(m), function(err) {
        if(err)
            return console.log(err);
			console.log("The Network Map was saved!");
    });
}

// train data
var ANN_Classes = {
    Computer_Systems_Analyst: 0,
    Data_Scientist: 1,
    Database_Administrator: 2,
	IT_Security: 3,
	Mobile_App_Developer: 4,
	Quality_Assurance: 5,
	Software_Developer: 6,
	Network_Specialist: 7,
	User_Experience: 8,
	Web_Developer: 9,
  },
  
  classes_array = Object.keys(ANN_Classes), //['Computer_Systems_Analyst', 'Data_Scientist', 'Database_Administrator', 'IT_Security','Mobile_App_Developer','Animator'],
  texts = [
  //Computer_Systems_Analyst
  "Java Oracle C++ Python Software Engineering Teamwork Analyze Communication Independent",
  //Data_Scientist
  "Java R Python Math C# Teamwork Organization Communication Analyze Problem Solving",
  //Database_Administrator
  "Oracle MySQL MySQL MySQL MySQL MySQL MySQL MySQL MySQL MySQL MySQL MongoDB NOSQL Teamwork Communication Independent Analyze Problem Solving",
  //IT_Security
  "TCP/IP Firewall Penetration Testing Pen SQL Injection DDOS MITM Teamwork Organization Communication Independent Analyze Public Speaking",
  //Mobile_App_Developer
  "C# C++ AJAX Java Unity Android android ANDROID IOS ios IoS xCode XCODE xcode Teamwork Communication Analyze Independent",
  //Quality_Assurance
  "Teamwork Communication Organization Analyze Independent",
  //Software_Developer
  "C++ C++ C++ C++ C++ C++ C++ C++ Java Java Java Java Java Java Java C# C# C# C# Python Python Python Python Python Organization Problem Solving Organization Analyze Independent",
  //Network_Specialist
  "TCP/IP TCP/IP TCP/IP TCP/IP TCP/IP TCP/IP TCP/IP TCP/IP LAN LAN LAN LAN LAN LAN LAN LAN",
  //User_Experience
  "Design Design Design Design JavaScript Javascript CSS CSS CSS CSS Python",
  //Web_Developer
  "PHP PHP PHP PHP PHP PHP PHP PHP Javascript Javascript Javascript HTML HTML HTML HTML HTML CSS CSS CSS CSS MySQL MySQL MySQL MySQL MySQL Teamwork Communication Organization Analyze Independent"
	],
	
  dict = mimir.dict(texts),
  traindata = [
    [mimir.bow(texts[0], dict), ANN_Classes.Computer_Systems_Analyst],
    [mimir.bow(texts[1], dict), ANN_Classes.Data_Scientist],
    [mimir.bow(texts[2], dict), ANN_Classes.Database_Administrator],
    [mimir.bow(texts[3], dict), ANN_Classes.IT_Security],
    [mimir.bow(texts[4], dict), ANN_Classes.Mobile_App_Developer],
	[mimir.bow(texts[5], dict), ANN_Classes.Quality_Assurance],
	[mimir.bow(texts[6], dict), ANN_Classes.Software_Developer],
	[mimir.bow(texts[7], dict), ANN_Classes.Network_Specialist],
	[mimir.bow(texts[8], dict), ANN_Classes.User_Experience],
	[mimir.bow(texts[9], dict), ANN_Classes.Web_Developer],

  ]
  var test_bow_ui = mimir.bow(input, dict);

var net = new brain.NeuralNetwork(),
  ann_train = traindata.map(function (pair) {
    return {
      input: pair[0],
      output: vec_result(pair[1], 9)
    };
  });
var map=net.train(ann_train);
//map = saveMap(JSON.stringify(map));

console.log('------------------- ANN (brain) ----------------------');
var predict = net.run(test_bow_ui);
var json = JSON.stringify(getArray);

//generate and sort array...
var getArray = getArray(predict);
getArray = getArray.sort(function(a, b){
    return b.value-a.value
})

console.log("Best Match: " + classes_array[maxarg(predict)]);
console.log("Match %: " + getValue(predict,maxarg(predict)) + "\n");

  var con = mysql.createConnection({  
  host: "nicholash2.sgedu.site", 
  user: "nichol29_app", 
  password: "Capstone5$", 
  database : 'nichol29_application'  
}); 

// UPDATE RESULT TABLE
var updateResult = con.connect(function(err) {
  if (err) throw err;
  var count = 1;
  for (var i in getArray) {
  //console.log("Connected!");
  if ( count < 6){
var sql = "INSERT INTO Results (UserID,Job"+count+",JobResult"+count+") VALUES("+uid+",'"+getArray[i].key+"','"+getArray[i].value+"') ON DUPLICATE KEY UPDATE Job"+count+" = '"+getArray[i].key+"' ,JobResult"+count+" = '"+getArray[i].value+"'    "
  con.query(sql, function (err, result) {
    if (err) throw err;
	});
  
	console.log(getArray[i].key);
    console.log(getArray[i].value+"\n---------------------------");
	count++;
  }}
  con.end(); 
});

return json;
};

exports.getResults = function(uid){
mysql = require('mysql');
var resultsJSON;

function formatData(data){
var string="";
data = data.split(" ");
var stringArray = new Array();
for(var i =0; i < data.length; i++){
	//stringArray.push(data[i]);

	for (var n =0; n < data[i+1]; n++){
	string += data[i] +" ";
	//stringArray.push(data[i]);
    }}
	
	return string;
}
var data="";
function setData(value) {
  data += value +" ";
  //console.log(data);
  return data.value;
}

var connection = mysql.createConnection({  
  host: "nicholash2.sgedu.site", 
  user: "nichol29_app", 
  password: "Capstone5$", 
  database : 'nichol29_application'  
}); 
connection.connect(function(err) {
  if (err) throw err;
  console.log("Connected!");
});

var query = 'SELECT UserID, TechSkill1, TechSkill1Weight, TechSkill2, TechSkill2Weight, TechSkill3, TechSkill3Weight, TechSkill4, TechSkill4Weight, TechSkill5, TechSkill5Weight FROM Users WHERE UserID ='+uid;
var report = connection.query(query, function(err, rows, fields) {
    if (err) throw err;
    for (var i in rows) {
		console.log('UserID: ', rows[i].UserID);
        //console.log('Skill1: ', rows[i].TechSkill1);
		setData(rows[i].TechSkill1);
		//console.log('Skill1Weight: ', rows[i].TechSkill1Weight);
		setData(rows[i].TechSkill1Weight);
		//console.log('Skill2: ', rows[i].TechSkill2);
		setData(rows[i].TechSkill2);
		//console.log('Skill2Weight: ', rows[i].TechSkill2Weight);
		setData(rows[i].TechSkill2Weight);
		//console.log('Skill3: ', rows[i].TechSkill3);
		setData(rows[i].TechSkill3);
		//console.log('Skill3Weight: ', rows[i].TechSkill3Weight);
		setData(rows[i].TechSkill3Weight);
		//console.log('Skill4: ', rows[i].TechSkill4);
		setData(rows[i].TechSkill4);
		//console.log('Skill4Weight: ', rows[i].TechSkill4Weight);
		setData(rows[i].TechSkill4Weight);
		//console.log('Skill5: ', rows[i].TechSkill5);
		setData(rows[i].TechSkill5);
		//console.log('Skill5Weight: ', rows[i].TechSkill5Weight);
		setData(rows[i].TechSkill5Weight);
    }
	connection.end();  
 
  console.log('-------KEYWORD HASH--------');	
	console.log(formatData(data));
	
//print JSON
resultsJSON = results(formatData(data));
return;
});
return ;

}