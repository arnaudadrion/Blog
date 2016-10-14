$(document).ready(function(){
	getAll();
	$('a').click(getOne);
	$('form').submit(authentification);

});
//récupération des articles et affichage
function getAll(){
	$.ajax({
		url:'http://localhost:8888/blog/articles/getAll/',
		type:'GET',
		dataType:'json',
		success: function(articles){
			$('div.formulaire').hide();
			$('div#addComment').hide();
			$('div.comments').empty();
			$('div.article').hide();
			$('div.articles').show();		
			for(i=0; i<articles.length; i++){
				var index = i+1;
				$('div#'+index+'>div').html(articles[i].titre+articles[i].contenu);	
				//$(articles[i].titre+articles[i].contenu+'<a id="suite" href="../getOne/?id='+index+'">lire la suite</a>').appendTo('div.content');
			};
		}
	});
}
//récupération d'unarticle et affichage, gestion d'apparition et disparition des div après chargement initial de la page 
function getOne(event){
	event.preventDefault();
	$.ajax({
		url: event.target.href,
		type: 'GET',
		dataType: 'json',
		success: function(article){
			$('div.articles').hide();
			if (sessionStorage['user']){
				$('div#addComment').show();
			}
			$('div.article').show();
			$('div.formulaire').show();
			$('div.texte').html(article[0].titre+article[0].contenu);
			if(article[0].content !=null){
				for( i=0; i<article.length; i++){
					$('<p><strong>'+article[i].pseudo+'</strong></p><p>'+article[i].content+'</p>').appendTo('div.comments');
				};
			};
			if(typeof(user) !='undefined'){

			}
			$('a#retour').click(function(){
				getAll();
			});
		}
	});
}
//authentification
function authentification(event){
	event.preventDefault();
	console.log(event);
	$.ajax({
		url: $(this).attr('action'),
		type: 'POST',
		dataType: 'json',
		data:$(this).serialize(),
		success: function(user){
			$('div.identification').hide();				
			alert('vous etes identifié '+user['pseudo']);
			sessionStorage.setItem('user', user['pseudo']);
			$('div.pseudo').text('bonjour '+user['pseudo']);
		}
	});
}

//
function addComment(event){
	event.preventDefault();
}