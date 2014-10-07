<%
	// filename: peopleService.php
	// url address: peopleService.php?peopleId=1000

	$peopleId = $_GET["peopleId"];
	

	$con=mysqli_connect("localhost","root","","consultants");
	// Check connection
	if (mysqli_connect_errno()) {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	mysqli_query($con,"DELETE FROM People WHERE peopleId =$peopleId ");

	mysqli_close($con);

	echo "Delete person with the Id of $peopleId";


%>