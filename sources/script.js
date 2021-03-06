$(document).ready(function()
{
	init_btns_login(); // Initialisation des boutons connexion / Deconnexion
	getThemeList();
});

function init_btns_login ()
{
	init_form_login();
	init_btn_login();
	init_btn_logoff();
	init_btn_accueil()
	init_btn_subscribe();
	init_btn_subscribe_valid();
	init_btn_reload_login_form();
}

function init_form_login ()
{
	$("#form_login").submit(function(e)
	{		
		var login=$('#login').val();
		var password=$('#password').val();

		if (login.match(/[\[\]\(\)<\$>;,.\'\"@& ]/) || password.match(/[\[\]\(\)<\$>;\'\"& ]/))
		{
			alert ('Utilisation de caractères non autorisés');
		}
		else
		{
			e.preventDefault();	
			var options={
				"url":"index.php?page=login",
				"method":"POST",
				"data":{"login":login,"password":password}
			};

			$.ajax(options).done(function(res)
			{
				$("#connexion").html(res);
				init_btns_login ();
			});
		}
	});
}

function init_btn_login ()
{
	$("#btn-connexion").off('click').click(function(e)
	{
		e.preventDefault();	
		var options={"url":"index.php?page=connect"};

		$.ajax(options).done(function(res)
		{
			$("#connexion").html(res);
			init_btns_login ();
		});
	});
}

function init_btn_subscribe_valid ()
{
	$("#form-subscribe").off('submit').submit(function(e)
	{
		var login=$('#new-login').val();
		var password=$('#new-password').val();
		var validPassword=$('#confirm-password').val();

		if (login.match(/[\[\]\(\)<\$>;,.\'\"@& ]/) || password.match(/[\[\]\(\)<\$>;\'\"& ]/) || validPassword.match(/[\[\]\(\)<\$>;\'\"& ]/))
		{
			alert ('Utilisation de caractères non autorisés');
		}
		else
		{
			e.preventDefault();

			if (login.trim() == '' || password.trim() == '' || validPassword.trim() == '')
			{
				alert ("Tous les champs doivent être renseignés.");
			}
			else if (password != validPassword)
			{
				alert ("Les mots de passe ne sont pas identiques.");
			}
			else
			{
				var options={
					"url":"index.php?page=record",
					"method":"POST",
					"data":{"login":login,
							"password":password,
							"validation":validPassword}
				};

				$.ajax(options).done(function(res)
				{
					if (res == "ERR-INVALID-POST")
						alert ("Tous les champs doivent être renseignés.");
					else if (res == "ERR-INVALID-PASSWORD")
						alert ("Les mots de passe ne sont pas identiques.");
					else if (res == "ERR-USER-ALREADY-EXISTS")
						alert ("Login déjà utilisé.");
					else $("#connexion").html(res);
					init_btns_login ();
				});
			}
		}
	});
}

function init_btn_logoff ()
{
	$('#btn-deconnexion').off('click').click(function(e)
	{
		$.ajax("index.php?page=logoff").done(function(res)
		{
			window.location.reload();
		});
	});
}

function init_btn_accueil ()
{
	$('#btn-accueil').off('click').click(function(e)
	{		
		var options={"url":"index.php?page=content"};

		$.ajax(options).done(function(res)
		{
			$("#content").html(res);
			init_btns_login ();
			$(".descriptionTheme").click(getSujetList);
		});
	});
}

function init_btn_subscribe ()
{
	$('#btn-subscribe').off('click').click(function(e)
	{		
		var options={"url":"index.php?page=subscribe"};

		$.ajax(options).done(function(res)
		{
			$("#connexion").html(res);
			init_btns_login ();
		});
	});
}

function init_btn_reload_login_form ()
{
	$('#btn_reload_login_form').off('click').click(function(e)
	{		
		var options={"url":"index.php?page=connect"};

		$.ajax(options).done(function(res)
		{
			$("#connexion").html(res);
			init_btns_login ();
		});
	});
}

// RECUPERATION des listes
function getThemeList()
{
	var cat = "theme";
	$.ajax("index.php?page=content&cat="+cat).done(function(resultat) {
		$(".liste").html(resultat);
		$(".descriptionTheme").click(getSujetList);
		$(".pathindex").click(getThemeList);
	});
}

function getSujetList()
{
	var id = $(this).find("a").attr("theme");
	var cat = "sujet";
	$.ajax("index.php?page=content&id_theme="+id+"&cat="+cat).done(function(resultat) {
		$(".liste").html(resultat);
		$(".descriptionSujet").click(getMessageList);
		$("#btn-newsujet").click(showFormSujet);
		$("#btn-editsujet").click(showFormSujet);
		$(".pathindex").click(getThemeList);
		$(".paththeme").click(getSujetList);
	});
}

function getMessageList()
{
	var id = $(this).find("a").attr("sujet");
	//alert(id);
	var cat = "message";
	$.ajax("index.php?page=content&id_sujet="+id+"&cat="+cat).done(function(resultat) {
		$(".liste").html(resultat);
<<<<<<< HEAD
		$(".pathindex").click(getThemeList);
		$(".paththeme").click(getSujetList);
		$(".pathsujet").click(getMessageList);
		init_btn_message(id);
=======
		//init_btn_message(id);
>>>>>>> f23fe447f515287564a41846dfd3dedec7271221
	});
}

function getMessage(id)
{
	var cat = "message";
	$.ajax("index.php?page=content&id_sujet="+id+"&cat="+cat).done(function(resultat) {
		//alert(resultat);
		$(".liste").html(resultat);
		//init_btn_message(id);
	});
}

// AJOUT et MODIFICATION de Sujets
function showFormSujet(){

	if ($("#connexion").find("p").attr("iduser") == undefined)
		alert ("Vous devez être connecté pour pouvoir ajouter un nouveau sujet");
	else
	{
		var obj = "showform";
		var id_theme=$("#btn-newsujet").attr("theme");
		
		$.ajax("index.php?page=form&objet="+obj).done(function(resultat) {
			$(".liste").html(resultat);
			$("#btn-valid-formAdd").click(formSujetAdd(id_theme));
			$("#btn-valid-formModif").click(formSujetModif);
		});
	}
}

function formSujetAdd(id_theme)
{

	$("#formSujetAdd").submit(function(e) {
	e.preventDefault();
		var auteur=$("#connexion").find("p").attr("iduser");
		//alert(auteur);
		var obj = "sujetaddform";
		var titre = $("#titre").val();
		var description = $("#description").val();
		var content = $('#sujet_content').val();

		if (titre.trim() == '' || description.trim() == '' || content.trim() == '')
		{
			alert ("Tous les champs doivent être renseignés.");
		}
		else
		{
			var options = { "url" : "index.php?page=form&objet="+obj,
							"method" : "POST",
							"data" : {
								//"objet" : obj,
								"id_theme":id_theme,
								"titre" : titre,
								"description" : description,
								"id_auteur" : auteur,
								"content" : content
							}
			};
			$.ajax(options).done(function(resultat) {
				getMessage(resultat);
			});
		}
	});
}

function formSujetModif()
{
	$("#formSujetModif").submit(function(e) {
	e.preventDefault();

		var obj = "sujetmodifform";
		var titre = $("#titre").val();
		var description = $("#description").val();

		var options = { "url" : "index.php?page=form&objet="+obj,
						"method" : "POST",
						"data" : {
							//"objet" : obj,
							"titre" : titre,
							"description" : description
						}
		};
		$.ajax(options).done(function(resultat) {
			//alert("fin");
			getThemeList();
		});
	});
}