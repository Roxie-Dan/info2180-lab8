<?php
mysql_connect(
"0.0.0.0",
"roxie_dan"
);
mysql_select_db("world");
$all=$_Request['all'];
if($all=='true' and $_REQUEST['format']=='xml'){
  $LOOKUP = null;
}
else{
$LOOKUP = $_REQUEST['lookup'];
}
echo $LOOKUP;

# execute a SQL query on the database
$results = mysql_query("SELECT * FROM countries WHERE name LIKE '%$LOOKUP%';");
//print $results;
# loop through each country
if($all != 'true'){
while ($row = mysql_fetch_array($results)) {
  ?>
  <li> <?php echo $row["name"]; ?>, ruled by <?php echo $row["head_of_state"]; ?> </li>
  <?php
  }
}
else{
  $string ='<ul> <countrydata>';
  while ($row=mysql_fetch_array($results)){
    $string.='<li>';
    $strig.='<country>';
    $string.='<name>';
    $string.=$row["name"];
    $string.='</name>';
    $string.='<ruler>';
    $string.=$row["head_of_state"];
    $string.='</ruler>';
    $sring.='</country>';
    $string.= '</li>';
    
  }
  $string.= '</countrydata></ul>';
  // $xmlString = utf8_encode($string);
  echo $xml= new SimpleXMLElement($string);
  echo $xml -> asXML();
  echo $string;
}
?>