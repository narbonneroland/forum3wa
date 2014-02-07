$(document).ready(function()
{
	init_btns_login(); // Initialisation des boutons connexion / Deconnexion
});

function init_btns_login ()
{
	init_form_login ();
	init_btn_login ();
	init_btn_logoff ();	
	init_btn_subscribe ();
	init_btn_subscribe_valid ();
	init_btn_reload_login_form ();
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
		}

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
		var options={"url":"index.php?page=connect"}

		$.ajax(options).done(function(res)
		{
			$("#connexion").html(res);
			init_btns_login ();
		});
	});
}

function init_btn_subscribe_valid ()
{
	$("#form_subscribe").submit(function(e)
	{		
		var login=$('#new-login').val();
		var password=$('#new-password').val();
		var validPassword=$('#confirm-password').val();
		e.preventDefault();
		var options={
			"url":"index.php?page=record",
			"method":"POST",
			"data":{"login":login,
					"password":password,
					"validation":validPassword}
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
		var options={"url":"index.php?page=subscribe"}

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
		var options={"url":"index.php?page=connect"}

		$.ajax(options).done(function(res)
		{
			$("#connexion").html(res);
			init_btns_login ();
		});
	});
}


