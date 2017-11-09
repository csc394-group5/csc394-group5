<html>
<body>
<script> 
 //Functions to open database


 getStudents = function()
      {
       db.transaction(function(transaction) {
            transaction.executeSql('SELECT UserID, FirstName, LastName from Users)
        });
    };
 
 selectedRowValues = function(transaction,results)
    {
         for(var i = 0; i < results.rows.length; i++)
         {
             var row = results.rows.item(i);
             resultCount = 1;
             userString = (row['LastName']) + ", " + (row['FirstName']) + " - " + (row[UserID]);
             $('.Input').append(userString);
         }
    };
</script>
<h1>Select a student:</h1>
<select class="options">
<option>--Student Name--</option>
</select>
<p><input type="submit" value="Submit" /></p>
</body>
</html>
