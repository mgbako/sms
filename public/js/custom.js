(function($){
'use strict';

	//get radio count
	var count = 0;
	var checked = 0;

	function countBoxes(){
		var divider = $('#quest').children("div").children("input[type=radio]").length/ $('#quest').length;
		count = $("input[type='radio']").length / divider;

		console.log(count);
	}

	countBoxes();
	$(":radio").click(countBoxes);

	// Count Checks
	function countChecked(){
		checked = $('input:checked').length;

		var percentage = parseInt( ( (checked / count) * 100), 10);

		if(percentage < 50){
	      $(".ui-progressbar-value").css({
	        'background':'Red'
	      });
	    }
	    else if(percentage < 100){
	      $(".ui-progressbar-value").css({
	        'background':'yellow'
	      });
	    }
	    else{
	       $(".ui-progressbar-value").css({
	        'background':'lightgreen'
	      });
	    }

		$(".progress-bar").progressbar({
			value: percentage
		});

		$(".progressbar-label").text(percentage + "%");
	}

	countChecked();
	$(":radio").click(countChecked);

	/*Count Down Function*/
	function counter(time, url)	{
		var interval = setInterval(function(){

			$('#counter').text(time);
			time = time - 1;

			if(time <= 0){
				//clearInterval(interval);
				window.location = url;
				clearInterval(interval);
			}
		}, 1000);

	}

	$('#countdown').countdown({date: '15 August 2015 15:53:00'});

}(jQuery));