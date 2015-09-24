<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Utah Tech Events - Calendar</title>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
    <!--<link rel="shortcut icon" href="includes/images/favicon.ico">-->
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="includes/styles.css?ver=1.1">
	<link rel="stylesheet" href="includes/category_styles.css">
</head>

<body>
	<?php include_once("includes/analyticstracking.php") ?>

	<section class="container">
		<section class="row">
			<div class="col-md-12">
				<h2 id="filter_text">Filter events by category</p>
			</div>
		</section>
		<section class="row">
			<div class="col-md-12 category_row">
				<span class="categories dotnet"><a>.NET</a></span>
				<span class="categories agile"><a>Agile</a></span>
				<span class="categories cplusplus"><a>C++</a></span>
				<span class="categories data"><a>Data Science</a></span>
				<span class="categories db"><a>Databases</a></span>
				<span class="categories dev"><a>Development</a></span>
				<span class="categories devops"><a>DevOps</a></span>
				<span class="categories func"><a>Functional</a></span>
				<span class="categories hack"><a>Hackerspace</a></span>
				<span class="categories java"><a>Java</a></span>
				<span class="categories js"><a>Javascript</a></span>
				<span class="categories mgmt"><a>Management</a></span>
			</div>
			<div class="col-md-12 category_row">	
				<span class="categories mobile"><a>Mobile Development</a></span>
				<span class="categories os"><a>Open Source</a></span>
				<span class="categories php"><a>PHP</a></span>
				<span class="categories python"><a>Python</a></span>
				<span class="categories ruby"><a>Ruby</a></span>
				<span class="categories sales"><a>Salesforce</a></span>
				<span class="categories security"><a>Security</a></span>
				<span class="categories saas"><a>Software as a Service</a></span>
				<span class="categories sql"><a>SQL</a></span>
				<span class="categories tech"><a>Tech</a></span>
				<span class="categories test"><a>Test Automation/QA</a></span>
			</div>
		</section>
		
		<section class="row">

			<div class="col-md-12">
			<?php
				date_default_timezone_set('America/Denver');
				$valid_months = array('january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december');

				if(isset($_GET['month']) && in_array(strtolower($_GET['month']), $valid_months) ){ //only show calendar for valid months 
					$json_to_show = 'includes/months/' . strtolower($_GET['month']) . '.inc.php';
				}else{  //default to showing the current month's calendar
					$json_to_show = 'includes/months/' . strtolower(date("F")) . '.inc.php';
				}
				require($json_to_show);
			?>
			</div>
		</section>

		<section class="row">
			<footer>
				<h4>Welcome to the Utah Tech Calendar</h4> 
				<p>Our goal in creating this calendar, was to make a one-stop shop where you can find all the local tech community events (currently in the Wasatch Front area).</p>
				<p>This is still in the beginning stages, so we hope you'll forgive the lack of tools & basic functionality at the moment.</p>
				<p>Thank you for your patience and if you like it, please, tell your friends!</p>
				<p id="copyright">&copy; Techie Grit 2015</p>
			</footer>
		</section>
	</section>

    <script src="includes/jquery-1.11.3.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="includes/scripts.js"></script>
</body>
</html>