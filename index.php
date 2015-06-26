<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Utah Tech Events - Calendar</title>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
    <!--<link rel="shortcut icon" href="includes/images/favicon.ico">-->
	<!--<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">-->
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="includes/styles.css">
</head>

<body ng-app>
	<section class="container">
		<section class="row">
			<div class="span12">
			<?php
				require('includes/months/july.inc.php');
			?>
			</div>
		</section>

		<section class="row">
			<footer>&copy; Stacie Farmer 2015</footer>
		</section>
	</section>

    <script src="includes/jquery-1.11.3.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script>
    $(function () {
	  	$('[data-toggle="tooltip"]').tooltip();

	  //use AJAX function to find JSON file for current month
	  //read through the data and load into HTML table
	  	$.getJSON( "includes/months/july_events.json", function( data ) {
		  var items = [];
		  /*$.each( data, function( key, val ) {
		    items.push( "<li id='" + key + "'>" + val + "</li>" );
		  });*/
		  if (data) console.log(data);
		  else console.log('not working');
		 
		  /*$( "<ul/>", {
		    "class": "my-new-list",
		    html: items.join( "" )
		  }).appendTo( "body" );*/
	  		//console.log(data);
		});
	})
    </script>
</body>
</html>