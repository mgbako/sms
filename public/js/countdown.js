	var total_seconds = 60 * parseInt($("[name='time']").val() );
	var minutes = parseInt(total_seconds / 60);
	var seconds = parseInt(total_seconds % 60);

	function checkTime(){
		time = minutes + ' : ' + seconds;
		$("#count").val(minutes);
		
		if(minutes => 10)
		{
			$('#counts').addClass('alert-info');
		}
		else
		{
			$('#counts').removeClass('alert-info');
			$('#counts').addClass('alert-danger');
		}

		if(total_seconds == 0){
			$('form#myform').submit();
			/*console.log('wat');*/
		}
		else{

			total_seconds = total_seconds - 1;
			minutes = parseInt(total_seconds / 60);
			seconds = parseInt(total_seconds % 60);

			setTimeout("checkTime()", 1000);
		}
	}

(function(){
'use strict';

	setTimeout("checkTime()", 1000);

	$("#results").text($('#scores').val());

}());
	