$(document).ready(function()
{
	init_btns_login(); // Initialisation des boutons connexion / Deconnexion
});

function init_btns_login ()
{
	init_btn_login ();
	init_btn_logoff ();
	init_btn_subscribe ();
}

function init_btn_login ()
{
	$('#btn-connexion').click(function(e)
	{		
		var login=$('#login').val();
		var password=$('#password').val();
		e.preventDefault();	
		var options={
			"url":"index.php?page=login",
			"method":"POST",
			"data":{"login":login,"password":password}
		}

		$.ajax(options).done(function(res)
		{
			$("#connexion").html(res);
			init_btns_login ();
		});
	});
}

function init_btn_logoff ()
{
	$('#btn-deconnexion').click(function(e)
	{		
		e.preventDefault();	
		var options={"url":"index.php?page=deco"}

		$.ajax(options).done(function(res)
		{
			$("#connexion").html(res);
			init_btns_login ();
		});
	});
}

function init_btn_subscribe ()
{
	$('#btn-subscribe').click(function(e)
	{		
		e.preventDefault();	
		var options={"url":"index.php?page=subscribe"}

		$.ajax(options).done(function(res)
		{
			$("#connexion").html(res);
			init_btns_login ();
		});
	});
}


