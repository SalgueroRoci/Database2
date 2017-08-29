<!--Theme version 1.1 designed by Roci for ecs.fullerton.edu cs431-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

        <head>
            <title>CPSC 431 Projects</title>
            <link rel="shortcut icon" href="{Favicon}"/>
            <link rel="alternate" type="application/rss+xml" href="{RSS}"/>
            <meta name="description" content="{MetaDescription}" />
             
			<meta name="viewport" content="width=device-width, initial-scale=1.0">

       <link rel="stylesheet" type="text/css" href="../main.css">    
     
        </head>
    
     
    <body>
    
    <div id="container">
	
	
    <div id="top">   
    </div>
    
    
    <?php include '../header.php';?>       
    
    <!--main body-->
        
    <div id="main">
		<div class='margins'>
		<?php
			//Credit Binary Algorithm: http://www.algolist.net/Algorithms/Binary_search 
			//=========Get information from class list add to array 
				//Open File 
					$myfile = fopen("classlist.txt", "r") or die("Unable to open file!");
				//Read File and add into array 
					while(!feof($myfile)) {
						$line = fgets($myfile);
						list($id, $lname, $fname) = explode(",", $line);
						$students[] = array('CWID' => $id, 'firstName' => $fname, 'lastName' => $lname);
					}
				//Close File
					fclose($myfile);

			//Retrieve what kind of information was stored in selectedPage 
			//selectedPage is type of value (CWID, last name, first name), input is the value, type to hold selectedPage
			//Make search functions for first name search 
			$requested_page = $_POST['selectedPage'];
			$input = $_POST['value'];
			$type; 
			switch($requested_page) {
			  case "lnameLookup": $type = 'lastName';	break;
			  case "idLookup": $type = 'CWID';			break;
			  case "fnameLookup": $type = 'firstName';	break;
			  default : echo "No Info was entered";		break;
			}
			
			
			//Make search functions for search 
			function searchStudents($arr, $key, $val) {
				$foundIndexes = array(); 
				$counter = 0;
				
				foreach($arr as $unit) {

					if($key == 'firstName'){ //only compare by similar names
						if(compare($val,$unit[$key]) ) {
							array_push($foundIndexes, $counter); 
						}
					}
					else { //cwid and last name compare by exact
						if(compExact($val,$unit[$key]) ) {
							array_push($foundIndexes, $counter); 
						}
					}
					$counter++;
				}
				return $foundIndexes; 
			}
			
			//Returns true as long as the first letters in val2 is == to val1
			function compare($val1, $val2) {
				$val1 = strtolower($val1);
				$val2 = strtolower($val2);
				for($i = 0; $i < strlen($val1); $i++) {
					if($val1[$i] != $val2[$i])
						return false; 
				}
				return true; 
			}
			//returns true only if exactly the same 
			function compExact($val1, $val2) {
				$val1 = strtolower($val1);
				$val2 = strtolower($val2);
				if(strlen($val1) != strlen($val2))
					return false; 
				for($i = 0; $i < strlen($val1); $i++) {
					if($val1[$i] != $val2[$i])
						return false; 
				}
				return true; 				
			}

			//Print out the students 
				$foundStudents = searchStudents($students, $type, $input); 
				
				echo "<table><tr><th>CWID</th><th>First Name</th><th>Last Name</th></tr>";
				for($i = 0; $i < count($foundStudents); $i++) {
					echo "<tr><td>" . $students[$foundStudents[$i]]['CWID'] .
						 "</td><td>". $students[$foundStudents[$i]]['firstName'] . 
						 "</td><td>" . $students[$foundStudents[$i]]['lastName'] . "</td></tr>";
				}
				echo "</table>"; 
		?>
		</div>
    </div>
    
    
    
    
    <div id="footer">
       <a href="https://upload.wikimedia.org/wikipedia/commons/b/b0/Downtown_Fresno_Skyline.jpg">Header</a>
	   <a href="https://pixabay.com/p-1315291/?no_redirect">Background</a>
	    &copy;2017
    </div>
   </div>
    
    
    </body>
    </html>
