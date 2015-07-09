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
	<link rel="stylesheet" href="includes/styles.css">
</head>

<body>
	<?php include_once("includes/analyticstracking.php") ?>

	<section class="container">
		<section class="row">
			<div class="span12">
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
    <script>
    $(function () {
	  	$('[data-toggle="tooltip"]').tooltip();

	  //use AJAX function to find JSON file for current month
	  //read through the data and load into HTML table
	  	var month_data_file = "includes/months/" + $('.month_name').text().toLowerCase() + "_events.json?ver=1.1";
	  	$.getJSON( month_data_file, function( data ) {

			var items = "";
			var start_day = $('#start_date').val(); //Sunday = 0, Monday = 1, Tuesday = 2, etc

		  	items += '<tr>';
		  	var day_counter = 0;
		  	while(day_counter < start_day){
		  		//add empty cells to account for the start date of the month
		  		items += '<td></td>';
		  		day_counter++;
		  	}

		  	$.each( data, function( day, time_object ) {
		  		//loop through each time in the day
		  		items += '<td><section>';
		  		items += '<section class="date">'+day+'</section>';

		  		$.each( time_object, function( time, event_object ) {
		  			//loop through each event at that time
		  			items += '<section class="time">'+time+'</section>';

				  	for (var i in event_object) {
				  		//console.log(event_object[i].group); //put this in a new section under the time
				  		items += '<section class="event_name';
				  		if(i === 0){ //only add this formatting (class) for the first event at that time
				  			items += ' first';
				  		}
				  		items += '"><a href="'+event_object[i].link+'" target="_blank" data-toggle="tooltip" title="'+event_object[i].group+'">'+event_object[i].event_name+'</a></section>';
				  	}
		  		});
		  		items += '</section></td>';

				day_counter++;
		  		if(day_counter === 7) { //if it's the end of the week, start a new row
		  			items += '</tr><tr>';
		  			day_counter = 0;
		  		}
		  	});
	  		if(day_counter < 7) { //if there are days left in the week, make them empty
	  			while(day_counter < 7){
			  		items += '<td></td>';
			  		day_counter++;
	  			}
	  			items += '</tr><tr>';
	  			day_counter = 0;
	  		}
		  	items += '</tr>';
		 
		  $("tbody").html(items);
		});
	})
    </script>
</body>
</html>