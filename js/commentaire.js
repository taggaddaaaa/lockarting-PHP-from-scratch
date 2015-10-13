$(document).ready(function()
{
	// Une fois que la page est intégralement chargée, le code ci-dessous est exécuté

	$('#stars').raty({ path: 'vues/lib/images' });
	$(".starcom").raty({
		score:function(){
			return $(this).attr("data-score");
		},
		path: 'vues/lib/images',
		readOnly : true
	});

});