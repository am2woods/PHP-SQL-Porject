<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Online Education - home</title>
<link href="style.css" rel="stylesheet" type="text/css" />
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
	
	
		<h2>titles/salary range</h2>
		<br />
		
		<?php
			$con=mysqli_connect("localhost:3306","root","","consultants");
			// Check connection
			if (mysqli_connect_errno())
			  {
				  echo "Failed to connect to MySQL: " . mysqli_connect_error();
			  }	

			$sql = "SELECT * FROM title ORDER BY description";  

			$result = mysqli_query($con, $sql);

			$i = 1;

			// ======================== SQL

			while($row = mysqli_fetch_array($result))
			  {
					/*Copy paste the line below this from our change to here */
				 
				  $title = $row['description']; 

				  $salary = floor($row['salaryRange1']/1000) . "k - " . floor($row['salaryRange2']/1000) . "k" ;				  
						
					// 1. search for $wildcard in $fullname
					// 2. underline  $wildcard in $fullname

					?>


					
					<div class="title-name">
					<a class="report" href='title-detail.php?titleId=<?php echo $i ?>'><?php $i ?><?php echo $title ?>, <?php echo $salary ?></a> </div>

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
 </body>
</html>