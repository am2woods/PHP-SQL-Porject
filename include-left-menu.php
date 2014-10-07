<!-- FileName: include-left-menu.php -->
<!-- It'll never run by itself; it'll run in conjunction to other pages. -->
<link href="addon.css" rel="stylesheet" type="text/css" />

<?
		function select ($menuItem) {
		
		$whichMenu = "home";
		if (isset($_GET["menu"])) {
			$whichMenu = $_GET["menu"];
			}
			
		if ($whichMenu == $menuItem)
			return "selected";
			
			return ""; 
}
?>

<div id="leftPan"> <!-- We took this from home.php, to implement it on the individual pages -->
  	<ul class="one">
		<li class="<?phpselect('home')?>">	
			<a href="home.php?menu=home">Home</a></li> <!--changing the URL -->
		<li class="<?phpselect('aboutus')?>">	
			<a href="aboutus.php?menu=aboutus">about us</a></li>
		<li class="<?phpselect('services')?>">
			<a href="services.php?menu=services">services</a></li>
			<!-- Added people by copy pasting, adding a people php file in our folder -->
		<li class="<?phpselect('people')?>">
			<a href="people.php?menu=people">people</a></li>
		<li class="<?phpselect('titles')?>">
			<a href="titles.php?menu=titles">titles</a></li>
		<li class="<?phpselect('salaries')?>">
			<a href="salaries.php?menu=salaries">salaries</a></li>	
		<li class="<?phpselect('university')?>">
			<a href="university.php?menu=university">university</a></li>
		<li class="<?phpselect('books')?>">
			<a href="books.php?menu=books">books</a></li>
		<li class="<?phpselect('discount')?>">
			<a href="discount.php?menu=discount">discount</a></li>
		<li class="<?phpselect('releases')?>">
			<a href="releases.php?menu=releases">releases</a></li>
		<li class="<?phpselect('contact')?>">
			<a href="contact.php?menu=contact">contact</a></li>
		<li class="<?phpselect('project-people')?>">
			<a href="project-people.php?menu=project-people">people & projects</a></li>
	</ul>
	<div id="fastformPan">
	<form action="" method="get" class="formone">
		<h2>search</h2>
  	  <select name="category" id="category"><option>CATAGORY</option></select>
		
	  <select name="author" id="author"> <option>AUTHOR</option></select>
	  <label>English</label>
	  <input name="search" type="radio" class="check" value="search" />
	  <label>French</label>
	   <input name="search" type="radio" class="check" value="French" />
	   <div id="submitPan">
	   <input type="submit" class="input" value="SEARCH" />
	   </div>
	</form>
	</div>
	<h3>new books</h3>
	<ul class="two">
		<li><a href="#">Loremipsum sit</a></li>
		<li><a href="#">Ametcon</a></li>
		<li><a href="#">Adipiscing elit </a></li>
		<li><a href="#">Morbifert urnadui </a></li>
		<li><a href="#">Posuereac</a></li>
		<li><a href="#">Convallis vitae</a></li>
	</ul>
	<div id="secondformPan">
		<form action="" method="get" class="formtwo">
			<h2>search</h2>
			<input name="wildCard" type="text" />
			<input name="" type="submit" class="input" value="SUBMIT" />
		</form>
	</div>
  </div>
 
