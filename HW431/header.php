<?php
echo '<div id="menu">
        <div class="list">
            <ul>
            <li>Assignments
                <ul>
            <li><a href="/~cs431s29/hw1/students.php">Assignment 1</a></li>
			<li><a href="/~cs431s29/hw2/classlist.php">Assignment 2</a></li>
			<li><a href="/~cs431s29/hw3/home.php">Assignment 3</a></li>
			<li><a href="/~cs431s29/hw4/home.php">Assignment 4</a></li>
                </ul>
            </li>
            </ul>
        </div>
        
        <div class="nav">
            <ul>
                <li><a href="..">Home</a></li>
                <li><a href="http://wang.ecs.fullerton.edu/cpsc431/">Class Website</a></li>
                <li><a href="">Link 3</a></li>
                <li><a href="">Link 4</a></li>        
				<li><a href="">Link 5</a></li> 
				<li><a href="">Link 6</a></li> 
            </ul>
        </div>
        
        <div class="search">
            <form action="/search" method="get">
                <input type="text" name="q" value="" class="input"/>
                <input type="image" src="" class="searchbox_submit" value="" />
            </form>
        </div>
    </div>';
?>