<?php
try {
    mysql_connect('50.62.209.199:3306','csbrooks','Slade135!');
    mysql_select_db("csbrooks_class_examples");
 
$uname=$_POST['user'];
$passwrd=$_POST['pass'];
$query="select * from Login where username='$uname' and password='$passwrd' ";
$result=mysql_query($query);
$rows = mysql_fetch_array($result);
if($rows){
echo "You have Logged in successfully" ;
//foreach($result as $rows){
        echo "</br>";
echo "Username: ".$rows['username']. " </br>";
echo "Password: ".$rows['password']. " </br>";
//
}else{
echo "Wrong";
}
}catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>