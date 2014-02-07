$(document).ready(function()
{

});

function init_btn_login ()
{
	$('#btn-login').click(function(e)
	{		
		var login=$('#input-login').val();
		var password=$('#input-password').val();
		e.preventDefault();	
		var options={
			"url":"index.php?page=login.php",
			"method":"POST",
			"data":{"login":login,"password":password}
		}
		$.ajax(options).done(function(res)
		{
			alert(res);
		});
	});
}
