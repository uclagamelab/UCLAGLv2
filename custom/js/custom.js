jQuery(function($)
{
	$('#rangeA, #rangeB').datetimepicker(
		{
			ampm:true,
			separator: ' at ',
			stepMinute: 5,
			numberOfMonths: 3
		});
});