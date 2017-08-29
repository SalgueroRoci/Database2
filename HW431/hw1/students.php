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
		<div class="student_tables" > 
			<?php 
			//Open File 
				$myfile = fopen("class.txt", "r") or die("Unable to open file!");
			//Read File and add into array 
				while(!feof($myfile)) {
					$line = fgets($myfile);
					list($id, $lname, $fname) = explode(",", $line);
					$studentID[] = $id; 
					$students[] = array('CWID' => $id, 'firstName' => $fname, 'lastName' => $lname);

				}
			
			//Sort Array 
				array_multisort($studentID, SORT_ASC, $students); 
			//Display tables
				for ($tables=0, $index=0; $tables < (int) count($students)/5; $tables++) {
					echo "<table><tr>
						<th>ID</th>
						<th>First Middle Name</th>
						<th>Last Name</th>
						</tr>";
					for($i = 0; $i <5 ; $i++, $index++) {
						echo "<tr><td>" . $students[$index]['CWID'] . "</td>" . 
							"<td>" . $students[$index]['firstName'] . "</td>" . 
							"<td>" . $students[$index]['lastName'] . "</td></tr>";
					}
					echo "</table>";
				}
				
				/*Alternate: 
				$counter = 0; 
				foreach($students as $user) {
					if($counter == 0) {
						echo "<table><tr>
						<th>ID</th>
						<th>First Middle Name</th>
						<th>Last Name</th>
						</tr>";
					}
						echo "<tr><td>" . $user['CWID'] . "</td>" . 
							"<td>" . $user['firstName'] . "</td>" . 
							"<td>" . $user['lastName'] . "</td></tr>";	
						$counter++; 
					
					if($counter >= 5) {
						$counter = 0; 
						echo "</table>";						
					}
					
				} echo "</table>";
				*/
				
			//Done~
				fclose($myfile);
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
