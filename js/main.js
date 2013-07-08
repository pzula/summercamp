$(document).ready(function() {
	$('#campus').on('change', function() {
		var qString = 'campus=' +$(this).val();
        $.get('http://localhost/summercamp/inc/fetch.php', qString, processResponse);
	});

	function processResponse(data) {
        $('#resultsGoHere').html(data);
    }

});
