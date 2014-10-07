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
	
	
		<h2>Project Name / Budget</h2>
		<br />
		
		<?php
			$con=mysqli_connect("localhost:3306","root","","consultants");
			// Check connection
			if (mysqli_connect_errno())
			  {
				  echo "Failed to connect to MySQL: " . mysqli_connect_error();
			  }	

			$sql = "select  p.lastname, pr.projectName, p.currentSalary /2000 as hourlyWage  
					from projectAssignments pa 
					inner join people p 
					on pa.peopleId = p.peopleId
					inner join project pr 
					on pr.projectId = pa.projectId;";  

			$result = mysqli_query($con, $sql);

			$i = 1;

			// ======================== SQL

			while($row = mysqli_fetch_array($result))
			  {
					/*Copy paste the line below this from our change to here */
				 
				  $lastname = $row["lastname"];

				  $projectName = $row["projectName"]; 
					
				  $currentSalary = $row["hourlyWage"];				  
						
					// 1. search for $wildcard in $fullname
					// 2. underline  $wildcard in $fullname

					?>


					
					<div class="peoples-name">
					<a class="report" href='title-detail.php?titleId=<?php echo $i ?>'>
					<?php $i ?>
					<?php echo $projectName ?>, 
					<?php echo $lastname ?>, 
					$<?php echo number_format($currentSalary,2) ?>
					</a> </div>

			  <?php
			   $i++;
			  
			  }
			  

			$unionSQL = "select avg(currentSalary) as moneyInfo, 
'Avg (F) Salary' as description 
from People where gender = 'f'
union
select avg(currentSalary) as moneyInfo, 
'Avg (m) Salary' as description 
from People where gender = 'm'
union
select avg(currentSalary) as moneyInfo, 
'Avg (B) Salary' as description 
from People
union
select max(currentSalary) as moneyInfo, 
'max (F) Salary' as description 
from People where gender = 'f'
union
select max(currentSalary) as moneyInfo, 
'max (m) Salary' as description 
from People where gender = 'm'
union
select max(currentSalary) as moneyInfo, 
'max (B) Salary' as description 
from People";
			
			
			$result = mysqli_query($con, $unionSQL); 
			
			while($row = mysqli_fetch_array($result))
			{ 
			print_r($result);
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
		  	<h4>Summary:</h4>
			<ul style="height:200px; width:200px;">
			
			<% while ($row = mysqli_fetch_array($result)) %>
			<li><a href="?type=1"
				<%= formatk($row['moneyInfo'] ) %>
				<%= $row ['description'] %>	
			</a></li>
			
			<% }
			mysqli_close($con);
			%>		
			?>
			
			</ul>
			
		  </div>
		</div>
	</div>
	</div>
  </div>
  <? include "include-footer.php" ?>  
 </body>
</html>