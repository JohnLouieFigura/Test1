<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>LitChecker</title>
	<link rel="stylesheet" type="text/css" href="css/result.css">
</head>
<body>


	<?php

				include 'header.php';

        error_reporting(0);
				session_start();
	
        // SEARCH PROCESS
	    if($_POST['btnsubmit']){
           
            $_SESSION['searching'] = $_POST['search'];
            header('Location: Result.php');    
		}
    ?>

	 <!-- SEARCH OPTIONS --> 
	 <div class="results container" style="margin-left:10%">
    <div >
      <form class="form-inline" name="search-area" method="POST">
        <input class="form-control" type="search" placeholder="Type something..." aria-label="Search" required name="search" style="width: 300px"; name="search">
        <!-- <br> -->
        <button class="btn btn-success" type="submit" name="btnsubmit" value="Search" style="width:100px;">Search</button>
    </form>
    </div>
    <br>
    <div class="option navi_search">
    	<a href="search_category.php" >
            <span class=""> Browse Catalog</span>
        </a> |
        <a href="Result.php" >
            <span class=""> All</span>
        </a>
        
    </div>
    <br>
  <div class="result-bar">

	<!-- SQL QUERY --> 

	<?php
        
        include 'config.php';

        if(isset($_GET['let']))
        $let = $_GET['let'];
       

        $sqlselect = mysqli_query($conn,"select id,title,date,category,type,link,author_1,author_2,author_3,author_4 from literature where category like '%$let%' "); 
       

    ?>


	<!-- SEARCH RESULT --> 
	
	<div class="results">
	<?php
        while ($results=mysqli_fetch_object($sqlselect)){
          echo "<div class='res2'>
					<ul><li><b>";
          echo"<a href='Display.php?let=$results->id'>$results->title ";
          echo "</a></li></b>";   

		  echo "<li><i>";
          echo "$results->author_1".", "."$results->author_2" .", "."$results->author_3" .", "."$results->author_4";
          echo "</li></i>";

          echo "<li><i>";
          echo "$results->date </li></i>
		 </ul>
		 </div> ";
        }



    if($sqlselectresult == 0){
			echo'No results found!';
		} 

    ?>
    
</div>
</div>

</body>
</html>