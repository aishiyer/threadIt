<?php
    $myFile = fopen("classlist431.txt" , "r") or die("Unable to open file!");
    $data = array();

while ($line = fgets($myFile, 4096))
{
    list($ID, $LastName, $FirstMiddle) = explode("," , $line);
    
    $arrayLine=array("id" => $ID, "lastname" => $LastName, "firstmiddle" => $FirstMiddle);
    $data[$ID] = $arrayLine;   
}
 asort($data);

    echo "<table style='background:#fff;color:#000;' border='5px'>";
    echo "<tr>";
    echo "<th style='margin:2px; padding:10px;'> ID </th>";
    echo "<th style='margin:2px; padding:10px;'> Last Name</th>";
    echo "<th style='margin:2px; padding:10px;'> First Name Middle Name </th>";
    echo "</tr>";
$count = 0;
foreach($data as &$lineArr)
{
    if($count %5 == 0 && $count != 0)
    {
        echo "</table><br/><br/>";
        echo "<table style='background:#fff;color:#000;' border='5px'>";
        echo "<tr>";
        echo "<th style='margin:2px; padding:10px;'> ID </th>";
        echo "<th style='margin:2px; padding:10px;'> Last Name</th>";
        echo "<th style='margin:2px; padding:10px;'> First Name Middle Name </th>";
        echo "</tr>";
    }
    $ID = $lineArr["id"];
    $LastName = $lineArr["lastname"];
    $FirstMiddle = $lineArr["firstmiddle"];
    
    echo "<tr>";
    print "<td> $ID </td>";
    print "<td> $LastName</td>";
    print "<td> $FirstMiddle</td>";
    echo "</tr>";
    $count++;
}  
echo "</table>";
fclose($myFile);    
?>