$(document).ready(function(){  

	$('.report').on("click", function(){
		return confirm("voulez vous vraiment signaler ce commentaire ?");

	});

	$('.delete').on("click", function(){
		return confirm("voulez vous vraiment supprimer cet article ?");

	});

	$('.deleteCommentButton').on("click", function(){
		return confirm("voulez vous vraiment supprimer ce commentaire ?");

	});

	//Affiche le formulaire de connection administrateur
	$('#displayConnectForm').on("click", function(){
		$('#connectForm').show();
	});

	//Cache le formulaire de connection administrateur
	$('div').on("click", function(){
		$('#connectForm').hide();
	});

})