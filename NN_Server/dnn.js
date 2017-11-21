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
    Animation: 0,
    Applied_Technology: 1,
    Business_Information_Technology: 2,
	Computational_Finance: 3,
	Computer_Science: 4,
	Cybersecurity: 5,
	Digital_Communication_and_Media_Arts: 6,
	E_Commerce_Technology: 7,
	Experience_Design: 8,
    Film_and_Television: 9,
  },
  
  classes_array = Object.keys(ANN_Classes), //['Computer_Systems_Analyst', 'Data_Scientist', 'Database_Administrator', 'IT_Security','Mobile_App_Developer','Animator'],
  texts = [
  //Animation
  "Design Design Design Design Design Design Design Design Drawing Drawing Drawing Drawing Drawing",
  //Applied Technology
  "Java R Python Math C# Teamwork Organization Communication Analyze Problem Solving",
  //Business_Information_Technology
  "Excel Excel Excel Excel Excel Excel Teamwork Teamwork Teamwork Teamwork Communication  Communication Communication Independent Analyze Problem Solving",
  //Computational_Finance
  "Teamwork Organization Communication Independent Analyze Public Speaking",
  //Computer_Science
  "C# C++ C++ C++ C++ Python Python Python Python AJAX Java Java Java Java Java Java Java Teamwork Communication Analyze Independent",
  //Cybersecurity
  "Teamwork Communication Organization Analyze Independent",
  //Digital_Communication_and_Media_Arts
  "Design Communication Design Communication",
  //E_Commerce_Technology
  "TCP/IP",
  //Experience_Design
  "Design Design Design Design JavaScript Javascript CSS CSS CSS CSS Python",
  //Film_Television
  "Film Design Design Design Speaking Speaking Speaking"	],
	
  dict = mimir.dict(texts),
  traindata = [
    [mimir.bow(texts[0], dict), ANN_Classes.Animation],
    [mimir.bow(texts[1], dict), ANN_Classes.Applied_Technology],
    [mimir.bow(texts[2], dict), ANN_Classes.Business_Information_Technology],
    [mimir.bow(texts[3], dict), ANN_Classes.Computational_Finance],
    [mimir.bow(texts[4], dict), ANN_Classes.Computer_Science],
	[mimir.bow(texts[5], dict), ANN_Classes.Cybersecurity],
	[mimir.bow(texts[6], dict), ANN_Classes.Digital_Communication_and_Media_Arts],
	[mimir.bow(texts[7], dict), ANN_Classes.E_Commerce_Technology],
	[mimir.bow(texts[8], dict), ANN_Classes.Experience_Design],
	[mimir.bow(texts[9], dict), ANN_Classes.Film_and_Television],
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
var sql = "INSERT INTO Results (UserID,Degree"+count+",DegreeResult"+count+") VALUES("+uid+",'"+getArray[i].key+"','"+getArray[i].value+"') ON DUPLICATE KEY UPDATE Degree"+count+" = '"+getArray[i].key+"' ,DegreeResult"+count+" = '"+getArray[i].value+"'    "
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