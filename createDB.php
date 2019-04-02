<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Creating a DB</title>

    <style>
        table, th, td {
        border: 1px solid black;
    }
    </style>
</head>
<body>
<h1>My first PHP page</h1>

<p>Connecting, Creating a DB, Creating a Table, Inserting Data, Getting Last ID, Inserting Multiple vs Prepared, SELECT Data, DELETE data, UPDATE data, LIMIT data with <a href="https://www.w3schools.com/php7/php7_mysql_intro.asp">W3 Schools mySQL</a> and <a href="https://www.sequelpro.com">Sequal Pro</a></p>

<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "myFirstDB";

// #1 Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";


echo "<br>";
// #2 Create database
// After creation - add $dbname = "theName"; to top and just $dbname end of $conn string

// $sql = "CREATE DATABASE myFirstDB";
// if ($conn->query($sql) === TRUE) {
//     echo "Database created successfully";
// } else {
//     echo "Error creating database: " . $conn->error;
// }


echo "<br>";
// #3 Create table MyGuests in the myFirstDB database

// $sql = "CREATE TABLE MyGuests (
//     id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
//     firstname VARCHAR(30) NOT NULL,
//     lastname VARCHAR(30) NOT NULL,
//     email VARCHAR(50),
//     reg_date TIMESTAMP
//     )";
    
//     if ($conn->query($sql) === TRUE) {
//         echo "Table MyGuests created successfully";
//     } else {
//         echo "Error creating table: " . $conn->error;
//     }


echo "<br>";
// #4 Insert one record into table MyGuests
    
// $sql = "INSERT INTO MyGuests (firstname, lastname, email)
// VALUES ('John', 'Doe', 'john@example.com')";
    
// if ($conn->query($sql) === TRUE) {
//     echo "New record created successfully";
// } else {
//     echo "Error: " . $sql . "<br>" . $conn->error;
// }


echo "<br>";
// #5 Insert one record and echo what the last ID inserted was
    
// $sql = "INSERT INTO MyGuests (firstname, lastname, email)
// VALUES ('Jane', 'Doe', 'jane@example.com')";
    
// if ($conn->query($sql) === TRUE) {
//     $last_id = $conn->insert_id;
//     echo "New record created successfully. Last inserted ID is: " . $last_id;
// } else {
//     echo "Error: " . $sql . "<br>" . $conn->error;
// }
    

echo "<br>";
// #6 Insert muiltiple records

// $sql = "INSERT INTO MyGuests (firstname, lastname, email)
// VALUES ('June', 'Doe', 'june@example.com');";
// $sql .= "INSERT INTO MyGuests (firstname, lastname, email)
// VALUES ('Mary', 'Moe', 'mary@example.com');";
// $sql .= "INSERT INTO MyGuests (firstname, lastname, email)
// VALUES ('Julie', 'Dooley', 'julie@example.com')";

// if ($conn->multi_query($sql) === TRUE) {
//     echo "New records created successfully";
// } else {
//     echo "Error: " . $sql . "<br>" . $conn->error;
// }


echo "<br>";
// #7 Prepared statements reduce parsing time as the preparation on the query is done only once (although the statement is executed multiple times)
// Insert a question mark (?) where we want to substitute in an integer, string, double or blob value
// The "sss" argument lists the types of data that the parameters are: i - integer, d - double, s - string, b - BLOB
// BLOB: binary large object that can hold a variable amount of data. The four types are TINYBLOB, BLOB, MEDIUMBLOB, and LONGBLOB.
// BLOB example: Photos, media files

// prepare and bind
/*$stmt = $conn->prepare("INSERT INTO MyGuests (firstname, lastname, email) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $firstname, $lastname, $email);

// set parameters and execute
$firstname = "Jake";
$lastname = "Doe";
$email = "jake@example.com";
$stmt->execute();

$firstname = "Mellie";
$lastname = "Moe";
$email = "mellie@example.com";
$stmt->execute();

$firstname = "Jules";
$lastname = "Dooley";
$email = "jules@example.com";
$stmt->execute();

echo "New records created successfully";

$stmt->close();*/


echo "<br>";
// #8 Query! num_rows() checks if there are more than zero rows returned.
// If there are more than zero rows returned, the function fetch_assoc() puts all the results into an associative array that we can loop through. The while() loop loops through the result set and outputs the data from the id, firstname and lastname columns.

// $sql = "SELECT id, firstname, lastname FROM MyGuests";
// $result = $conn->query($sql);

// if ($result->num_rows > 0) {
//     // output data of each row
//     while($row = $result->fetch_assoc()) {
//         echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
//     }
// } else {
//     echo "0 results";
// }


echo "<br>";
// #8b Query! Same query as above but place in HTML Table (add Style for table in header)

// $sql = "SELECT id, firstname, lastname FROM MyGuests";
// $result = $conn->query($sql);

// if ($result->num_rows > 0) {
//     echo "<table><tr><th>ID</th><th>Name</th></tr>";
//     // output data of each row
//     while($row = $result->fetch_assoc()) {
//         echo "<tr><td>".$row["id"]."</td><td>".$row["firstname"]." ".$row["lastname"]."</td></tr>";
//     }
//     echo "</table>";
// } else {
//     echo "0 results";
// }


echo "<br>";
// #9 Delete a record
// The WHERE clause specifies which record or records that should be deleted. If you omit the WHERE clause, all records will be deleted!

// $sql = "DELETE FROM MyGuests WHERE id=1";

// if ($conn->query($sql) === TRUE) {
//     echo "Record deleted successfully";
// } else {
//     echo "Error deleting record: " . $conn->error;
// }


echo "<br>";
// #10 Update a record
// The WHERE clause specifies which record or records that should be updated. If you omit the WHERE clause, all records will be updated!

// $sql = "UPDATE MyGuests SET lastname='Doe' WHERE id=5";

// if ($conn->query($sql) === TRUE) {
//     echo "Record updated successfully";
// } else {
//     echo "Error updating record: " . $conn->error;
// }


echo "<br>";
// LIMIT clause that is used to specify the number of records to return.
// $sql = "SELECT * FROM Orders LIMIT 30"; - return the first 30 records.
// $sql = "SELECT * FROM Orders LIMIT 10 OFFSET 15"; - return only 10 records, start on record 16 (OFFSET 15)
// $sql = "SELECT * FROM Orders LIMIT 15, 10"; - shorter syntax to achieve the same result:

//conn->close(); present for all to run
$conn->close();
?>





</body>
</html>