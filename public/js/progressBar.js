(function(){
'use strict';

	//get radio count
	var count = 1;
	var checked = 1;


	countBoxes();
	$(":radio").on('click', countBoxes);

	// Count Checks
	

	countChecked();
	$(":radio").on('click', countChecked);

	/**
	 * GUI i for Multiple Select
	 */
}());

	function countBoxes(){
		var divider = $('ol').children("li").length / $('ol').length;
		count = Math.floor($("input[type='radio']").length / divider);
	}

	function countChecked(){
		var checked = $('input:checked').length;
		var totalQ = $('#totalQ');
		var percentage = parseInt( ( (checked / count) * 100), 10);

		if(percentage <= 25){
			$('.progress-bar').addClass('progress-bar-danger');
		}
		else if(percentage <= 50){
			$('.progress-bar').removeClass('progress-bar-danger');
			$('.progress-bar').addClass('progress-bar-warning');
		}
		else if(percentage < 100){
			$('.progress-bar').removeClass('progress-bar-warning');
			$('.progress-bar').addClass('progress-bar-info');
		}
		else{
			$('.progress-bar').removeClass('progress-bar-info');
			$('.progress-bar').addClass('progress-bar-success');
		}
		$('.progress-bar').css('width', percentage + '%');
		$('#counter').text(percentage + "%");
	}