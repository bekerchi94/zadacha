$(document).ready(function() 
{
	$('#voyti').on("click",function(){
	
		var name=$('#adname').val();
		var pass=$('#adpass').val();	
		
			if((name.length==0)||(pass.length==0))
			{
				$('#loginer').html("Ошибка!!!      Заполните все поля!");	
			}else
			{
				$('#form2').submit();
			}		
	});	
	

    $('#form1').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            email: {
                validators: {
                    emailAddress: {
                        message: 'неправильный адрес электронной почты'
                    }
                }
            }
        }
    });
	
	$('#sohr').on('click',function(){
		var name=$('#name').val();
		var email=$('#emaill').val();	
		var text=$('#textl').val();	
		if((name.length<2)||(email.length<2)||(text.length<2))
		{
			$('#verr').html("Ошибка!!!      Заполните все поля!");	
		}else
		{
			$('#form1')[0].submit();
		}		
		
	});
	



});