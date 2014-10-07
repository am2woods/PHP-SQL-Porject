<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Online Education - home</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<script src="./jquery.js"></script>
</head>
<body>
<div id="mainPan">   
  <?php include "include-left-menu.php" ?>
  <div id="rightPan">
  	
	<?php include "include-header.php" ?>
		
    <div id="bodyPan">
	
		<?php 
			function formatk ($money) {
				$returnMoney = (int)($money/1000);
				return $returnMoney . "k";
			}
		?>
	
	
		<h2>people/title/salaries</h2>
		<br />
		
		
		
		<?php
			$con=mysqli_connect("localhost:3306","root","","consultants");
			// Check connection
			if (mysqli_connect_errno())
			  {
				  echo "Failed to connect to MySQL: " . mysqli_connect_error();
			  }	


			$displayMode = -999;
			$wildCardCriteria = "";

			if ( isset( $_GET["type"] ) ) {
				$displayMode = $_GET["type"];
			} elseif ( isset( $_GET["wildCard"] ) ) {
				$wildCardCriteria = $_GET["wildCard"];
			}	

			switch ($displayMode)
			{
				case 1:
				  $sqlInjection = "WHERE currentSalary >= 100000";
				  break;
				case 2:
				 $sqlInjection = "WHERE currentSalary >= 50000";
				  break;
				case 3:
				  $sqlInjection = "WHERE gender = 'F'";
				  break;
				case 4:
				  $sqlInjection = "WHERE gender = 'M'";
				  break;
				case 5:
				  $sqlInjection = "";
				  break;
				default:
				  $sqlInjection = "";
			}

			echo "Searh Criteria ($wildCardCriteria)<br><br>";

			$sql = "SELECT * FROM people $sqlInjection ORDER BY firstName";
			$wildCard =  "SELECT * FROM people 
						  WHERE lastName LIKE '%$wildCardCriteria%' 
						  OR firstName LIKE '%$wildCardCriteria%'";

			if ( $wildCardCriteria ) {
				$sql = $wildCard;
			}

			$result = mysqli_query($con, $sql);

			$i = 1;

			// ======================== SQL

			while($row = mysqli_fetch_array($result))
			  {
					/*Copy paste the line below this from our change to here */
				 
				  $fullname = $row['lastName'] . ", " . $row['firstName']; /* Concatenated the comma */
				  //echo $fullname;
				  $salary = floor($row['currentSalary']/1000) . "k";
				  $peopleId = $row['peopleId'];			  
						
					/* $gender = $row['gender']; 
					$class = ""; 	/* in order to highlight males and females as groups, we need the $gender/$class. 
				  if ($gender == "F") {
					$class = "-female";
					} */
					
					$class = $row ["gender"] == 'F' ? "-female" : ""; 
					$star = $row ["currentSalary"] > 80000 ? "*" : "";

					// 1. search for $wildcard in $fullname
					// 2. underline  $wildcard in $fullname



					?>


					
					<div class="peoples-name<?php echo $class ?>">
					<span class="report" href='people-detail.php?peopleId=<?php echo $i ?>'>
					<img id="id-<%=$peopleId%>" data-fullName="<%=$fullname%>"data-id="<%=$peopleId%>" class="delete" width="15" length="15" src="./images/delete-icon-md.png" /><?php $i ?> <?php echo $fullname ?>, <?php echo $salary ?> <?php echo $star ?> </span> </div>

			  <?php
			   $i++;
			  }
			  

			mysqli_close($con);
			// ======================== END SQL	

			?>
		


		
		
	  <div id="bodylowerPan">
		  <div id="bodylowerLeftPan">
		  	<h3>People</h3>
			<p>Online Education is a free, tableless, W3C-compliant web design layout by Template World. 
			This template has been tested and proven compatible with all major browser environments and
			operating systems. You are free to modify the design to suit your tastes in any way you like.</p>
			<ul class="list">
				<li><a href="#">Lorem ipsum dolor sit amet,consectetuer</a></li>
				<li><a href="#">adipiscing elit.Morbifert urna dui,posuere.</a></li>
				<li><a href="#">convallis vitae,</a></li>
			</ul>
			<p class="more"><a href="#">view more</a></p>
		  </div>
		  
		  <div id="bodylowerRightPan">
		  	<h4>search:</h4>
			<ul>
				<li><a href="?type=1">100,000 or greater</a></li>
				<li><a href="?type=2">50,000 or greater</a></li>
				<li><a href="?type=3">Display All Female Employees</a></li>
				<li><a href="?type=4">Display All Male Employees</a></li>
				<li class="lastlink"><a href="?type=5">All Employees </a></li>
			</ul>
			<p class="more"><a href="#">People List</a></p>
		  </div>
		</div>
	</div>
	</div>
  </div>
  <? include "include-footer.php" ?>  
  <script>
		  	$( "img.delete" ).click(function() {
		  		//do something here
		  		var id = $(this).attr("data-id");
		  		var fullName = $(this).attr("data-fullName");
		  		alert("you just clicked on an image for " +id +", name: " +fullName);

		  		//start delete process 
				$.get( "peopleService.php", { peopleId: id } )
  				.done(function( data ) {

  					var currentImage = $("#id-" +id);
  					currentImage.attr("src", "./images/Lock-icon.png");
    				//alert( "Data Loaded: " + data );
  				});
		  		//end delete
		});
  </script>
 </body>
</html>