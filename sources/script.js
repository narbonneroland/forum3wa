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
		e.preventDefault();

		if (login == '' || password == '' || validPassword == '')
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
	});
}

function init_btn_logoff ()
{
	$('#btn-deconnexion').off('click').click(function(e)
	{		
		var options={"url":"index.php?page=logoff"};

		$.ajax(options).done(function(res)
		{
			$("#connexion").html(res);
			init_btns_login ();
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
		
	});
}
function getMessageList()
{
	var id = $(this).find("a").attr("sujet");
	var cat = "message";
	$.ajax("index.php?page=content&id_sujet="+id+"&cat="+cat).done(function(resultat) {
		$(".liste").html(resultat);
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
		alert(auteur);
		var obj = "sujetaddform";
		var titre = $("#titre").val();
		var description = $("#description").val();
		var content = $('#sujet_content').val();

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
			alert(resultat);
			getThemeList();
		});
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
			alert("fin");
			getThemeList();
		});
	});
}