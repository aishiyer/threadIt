<?php
    
    $myFile = fopen("classlist431.txt" , "r") or die("Unable to open file!");


echo fread($myFile, filesize("classlist431.txt"));

fclose($myFile);
    
    
    
    
    
    
    
?>