

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
	$("#btn-connexion").click(function(e)
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
	$("#form-subscribe").submit(function(e)
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
				$("#connexion").html(res);
				init_btns_login ();
			});
		}
	});
}

function init_btn_logoff ()
{
	$('#btn-deconnexion').click(function(e)
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
	$('#btn-accueil').click(function(e)
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
	$('#btn-subscribe').click(function(e)
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
	$('#btn_reload_login_form').click(function(e)
	{		
		var options={"url":"index.php?page=connect"};

		$.ajax(options).done(function(res)
		{
			$("#connexion").html(res);
			init_btns_login ();
		});
	});
}

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