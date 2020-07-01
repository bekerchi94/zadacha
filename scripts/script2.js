 function setstat(id)
 {
	ch=document.getElementById("setch"+id);
	chl=document.getElementById("setchl"+id);
	
	if(ch.checked==true)
	{
		chl.innerHTML='выполнено';		
	}
	
	else
	{
		chl.innerHTML='еще не выполнено';		
	}

    var form_data = new FormData();
    form_data.append('setch', id);
    $.ajax({
                url: './?vv',
                dataType: 'text',
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function(data)
				{

                }
			});

 }


function edid(id)
{
	 bb=document.getElementById("b"+id);
	 ta=document.getElementById("ta"+id);
	 if(bb.getAttribute("str")=='r')
	 {
		bb.setAttribute("str", "s");
		bb.innerHTML="Сохранить";
		ta.setAttribute("contenteditable", "true");
	 }else
		 
	 if(bb.getAttribute("str")=='s')
	 {
		bb.setAttribute("str", "r");
		bb.innerHTML="Редактировать";
		document.getElementById("red"+id).innerHTML="отредактировано администратором";
		ta.setAttribute("contenteditable", "false");

	text=ta.innerHTML;

    var form_data = new FormData();
    form_data.append('setid', id);
	form_data.append('settext', text);
    $.ajax({
                url: './?vv',
                dataType: 'text',
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function(data)
				{				
					if(data)
					{
						str = '<input type="hidden" id="res" value="ok"/>';
						k=data.search(str);
						if(k>0)
						{
							alert("Сохранено!");
						}else
						{
							document.getElementById("adminl").remove();
							document.getElementById("admina").remove();
							alert("Произошла ошибка, войдите чтобы продолжить!");
							location.href="./?vv";
						}
					}
                }
			});		



	 }	 

}