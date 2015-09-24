$(function () {
		/**
		/** Enable the tooltip in Bootstrap to show the User Group for each event
		**/
	  	$('[data-toggle="tooltip"]').tooltip();


		/**
		/** use AJAX function to find JSON file for current month
		/** read through the data and load into HTML table
		**/
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
				  		items += ' '+event_object[i].category+'"><a href="'+event_object[i].link+'" target="_blank" data-toggle="tooltip" title="'+event_object[i].group+'">'+event_object[i].event_name+'</a></section>';
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


		/**
		/** Filtering by Categories
		**/
		$('span.categories').click(function(){
			event.preventDefault();
			var class_array = $(this).attr('class').split(" ");

			var category = class_array[1];
			var is_active = class_array[2];

			console.log(is_active);

			if(is_active === 'active'){

				$("section.event_name").each(function(index){
					$(this).show();
					$(this).prev('section.time').show();
				})

				//remove the active class to this category
				$(this).removeClass("active");

			}else{

				$("section.event_name").each(function(index){
					var classes = $(this).attr('class').split(" ");
					console.log(classes);
					console.log(jQuery.inArray(category, classes));

					if(jQuery.inArray(category, classes) < 0){
						$(this).hide();
						$(this).prev('section.time').hide();
					}
				})
				//add the active class to this category
				$(this).addClass("active");

			}
			
		});
	})