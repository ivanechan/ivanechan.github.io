<?php
mysql_connect("localhost","root","");
mysql_select_db("commentbox");
if (isset($_POST['name'])) {
    $name = $_POST['name'];
}
if (isset($_POST['comment'])) {
    $comment=$_POST['comment'];
}
if (isset($_POST['submit'])) {
	$submit=$_POST['submit'];
}
 
$dbLink = mysql_connect("localhost","root","");
    mysql_query("SET character_set_client=utf8", $dbLink);
    mysql_query("SET character_set_connection=utf8", $dbLink);

if(!empty($_POST['submit'])){
if($name&&$comment)
{
$insert=mysql_query("INSERT INTO commenttable (name,comment) VALUES ('$name','$comment') ");
echo "<meta HTTP-EQUIV='REFRESH' content='0; url=commentindex.php'>";
}
else
{
echo "please fill out all fields";
}
}
?>


<?php
$dbLink = mysql_connect("localhost","root","");
    mysql_query("SET character_set_results=utf8", $dbLink);
    mb_language('uni');
    mb_internal_encoding('UTF-8');
 
$getquery=mysql_query("SELECT * FROM commenttable ORDER BY id DESC");
while($rows=mysql_fetch_assoc($getquery))
{
$id=$rows['id'];
$name=$rows['name'];
$comment=$rows['comment'];
echo $name . '<br/>' . '<br/>' . $comment . '<br/>' . '<br/>' . '<hr size="1"/>'
;}
?>
 