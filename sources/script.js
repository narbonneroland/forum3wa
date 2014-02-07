$(document).ready(function()
{
	init_btn_login();
});

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
			//alert(res);
			$("#connexion").html(res);
		});
	});
}
