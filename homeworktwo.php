<?php
   //make a variable that holds a selected option
    if(isset($_POST['field'])) $optionToSelect = $_POST['field'];
    else $optionToSelect = "fname";

//the searchID looks through the given $array and for each item that matches the $value in the ID field the function
function searchID(Array $data, $value)
{
    foreach ($data as $lineArr)
    {
        if ($lineArr["id"] == $value)
        {
            $ID = $lineArr["id"];
            $FirstMiddle = $lineArr["firstmiddle"];
            $LastName = $lineArr["lastname"];
    
            echo "<tr>";
            print "<td> $ID </td>";
            print "<td> $FirstMiddle</td>";
            print "<td> $LastName</td>";
            echo "</tr>";
        }
    }
}

//searchFirstName searches through the given $array and matches (partially) in $value in the first name field and prints a table row of data, returning a count of found item
function searchFirstName(Array $data, $value)
{
    foreach ($data as $lineArr)
    {
        $strOne = strtolower($lineArr["firstmiddle"]);
        $strTwo = strtolower($value);
        
        if (stristr($strOne, $strTwo) != FALSE)
        {
            $ID = $lineArr["id"];
            $FirstMiddle = $lineArr["firstmiddle"];
            $LastName = $lineArr["lastname"];
            
            echo "<tr>";
            print "<td> $ID </td>";
            print "<td> $FirstMiddle</td>";
            print "<td> $LastName</td>";
            echo "</tr>";
        }
    }
}

//searchLastName searches through the given $array and matches in $value in the last name field, prints out a table row of data, returning a count of found item
function searchLastName(Array $data, $value)
{  
    foreach ($data as $lineArr)
    {
        if (strcasecmp($lineArr["lastname"], $value) == 0)
        {
            $ID = $lineArr["id"];
            $FirstMiddle = $lineArr["firstmiddle"];
            $LastName = $lineArr["lastname"];
    
            echo "<tr>";
            print "<td> $ID </td>";
            print "<td> $FirstMiddle</td>";
            print "<td> $LastName</td>";
            echo "</tr>";
        }
    }
}
?>

<body>
<h2>Assignment 2</h2>
<div class="alert_yellow">This PHP script reads the class list from the file and allows the user to find a student record. The user has the option to find a student by first/middle name, last name or by ID. If multiple records are found, the script will display all the results.</div>
<br/>
 <form name="searching" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
 Search for: <input type="text" name="find" /> in 
 <Select NAME="field">
 <Option <?php if ($optionToSelect =='fname') echo 'selected ' ?>VALUE="fname">First Name</option>
 <Option <?php if ($optionToSelect =='lname') echo 'selected ' ?>VALUE="lname">Last Name</option>
 <Option <?php if ($optionToSelect =='id') echo 'selected ' ?>VALUE="id">ID</option>
 </Select>
 <input type="hidden" name="search" value="yes" />
 <input type="submit" name="searching" value="Search" />
 </form>
<p>

<?php
//read the file
$myFile = fopen("classlist431.txt" , "r") or die("Unable to open file!");
$data = array();

while ($line = fgets($myFile, 4096))
{
    list($ID, $LastName, $FirstMiddle) = explode("," , $line);
    
    $arrayLine=array("id" => $ID, "lastname" => $LastName, "firstmiddle" => $FirstMiddle );
    $data[$ID] = $arrayLine;   
}
    asort($data);    
    
 

//display results
if ($_POST["search"] =="yes")
{
    $searching = $_POST['find'];
    if ($searching == "")
    {
        echo "<p>Please enter a valid search.";
        exit;
    } else
    {
        //switch statement
        switch ($_POST['field']) {
            case "fname":
                echo "<h3>Searching by First/Middle Name ($searching)</h3>";
                echo "<table style='background:#fff;color:#000;' border='5px'>";
                echo "<tr>";
                echo "<th style='margin:2px; padding:10px;'> ID </th>";
                echo "<th style='margin:2px; padding:10px;'> First Name Middle Name </th>";
                echo "<th style='margin:2px; padding:10px;'> Last Name</th>";
                echo "</tr>";
                echo "Found".searchFirstName($data, $searching)." entry/ies <hr />";
                echo "</table>";
                break;
            case "lname":
                echo "<h3>Searching by Last Name ($searching)</h3>";
                echo "<table style='background:#fff;color:#000;' border='5px'>";
                echo "<tr>";
                echo "<th style='margin:2px; padding:10px;'> ID </th>";
                echo "<th style='margin:2px; padding:10px;'> First Name Middle Name </th>";
                echo "<th style='margin:2px; padding:10px;'> Last Name</th>";
                echo "</tr>";
                echo "Found".searchLastName($data, $searching)." entry/ies <hr />";
                echo "</table>";
                break;
            case "id":
                echo "<h3>Searching by ID ($searching)</h3>";
                echo "<table style='background:#fff;color:#000;' border='5px'>";
                echo "<tr>";
                echo "<th style='margin:2px; padding:10px;'> ID </th>";
                echo "<th style='margin:2px; padding:10px;'> First Name Middle Name </th>";
                echo "<th style='margin:2px; padding:10px;'> Last Name</th>";
                echo "</tr>";
                echo "Found".searchID($data, $searching)." entry/ies <hr />";
                echo "</table>";
                break;  
        }
    }
}
?>