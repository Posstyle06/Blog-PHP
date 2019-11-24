$(document).ready(function(){  

	$('.report').on("click", function(){
		return confirm("voulez vous vraiment signaler ce commentaire ?");

	});

	$('#delete').on("click", function(){
		return confirm("voulez vous vraiment supprimer cet article ?");

	});



})