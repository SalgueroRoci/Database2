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
		<div class= "margins"> 
			<form action="searchStudents.php" method="POST" name="theClass" id="theClassRoom">
				<input type="text" name="value" maxlength="25"></input>
				<select  name="selectedPage">
					<option value="idLookup">CWID</option>
					<option value="fnameLookup">First name</option>
					<option value="lnameLookup">Last Name</option>
				</select>
			<input type="submit" value="Load page" />
			</form>
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
