$(document).ready(function() {
    $('[id^=detail-]').hide();
    
    if($('#add-ripetizioni input').val()<=0)
        	$("#btn-confirm a").addClass("btn-not-active");
    
    if($("#cmn-toggle-1").is(":checked"))
        {
        	$('#inizio-notte input').prop('readonly', false);
            $('#fine-notte input').prop('readonly', false);
            $('#container-inizio').removeClass('uncheckable');
            $('#container-fine').removeClass('uncheckable');
        }
        else
		{
        	$('#inizio-notte input').prop('readonly', true);
            $('#fine-notte input').prop('readonly', true);
            $('#container-inizio').addClass('uncheckable');
            $('#container-fine').addClass('uncheckable');
        }
     if($("#cmn-toggle-2").is(":checked"))
        {
        	$('#container-intervallo-ore').addClass('uncheckable');
            $('#intervallo-ore select').prop('readonly', true);
        }
        else
		{
        	$('#container-intervallo-ore').removeClass('uncheckable');
            $('#intervallo-ore select').prop('readonly', false);
        }
 
    $('.toggle').click(function() {
        $input = $( this );
        $target = $('#'+$input.attr('data-toggle'));
        $target.slideToggle();
    });
    
        
    
    $('#cmn-toggle-1').change(function() {
        if($(this).is(":checked"))
        {
        	$('#inizio-notte input').prop('readonly', false);
            $('#fine-notte input').prop('readonly', false);
            $('#container-inizio').removeClass('uncheckable');
            $('#container-fine').removeClass('uncheckable');
        }
        else
		{
        	$('#inizio-notte input').prop('readonly', true);
            $('#fine-notte input').prop('readonly', true);
            $('#container-inizio').addClass('uncheckable');
            $('#container-fine').addClass('uncheckable');
        }
    });
    
    $('#cmn-toggle-2').change(function(){
		if($("#cmn-toggle-2").is(":checked"))
        {
        	$('#container-intervallo-ore').addClass('uncheckable');
            $('#intervallo-ore select').prop('disabled', true);
        }
        else
		{
        	$('#container-intervallo-ore').removeClass('uncheckable');
            $('#intervallo-ore select').prop('disabled', false);
        }   
   });
    
	$('.flag').click(function(){
		$('.flag-selected').removeClass('flag-selected');
		$(this).addClass("flag-selected");
		var lingua=$(this).attr("lingua");
		if(lingua=="it")
			$("#lingua-sel").text("Italiano");
		else if(lingua=="en")
			$("#lingua-sel").text("Inglese");
		else if(lingua=="es")
			$("#lingua-sel").text("Spagnolo");
		else if(lingua=="td")
			$("#lingua-sel").text("Tedesco");
	});
    
    $('#add-ripetizioni input').change(function(){
    	if($(this).val()<=0)
        	$("#btn-confirm a").addClass("btn-not-active");
        else
            $("#btn-confirm a").removeClass("btn-not-active");
    });
    
	$("#a-news").on("click",function(){
    	var a = $('#add-news div select').find(":selected").attr("data-subtext");
    	var b = $('#add-news div select').find(":selected").text();
    	var n = $('#add-ripetizioni input').val();
        var rowCount = $('#diagnosis_list > tbody > tr').length;
    	var txt ="<tr class='ui-sortable-handle not-saved'><td class='priority'>"+(rowCount+1)+"</td><td>"+b+"</td><td>"+a+"</td><td>"+n+"</td><td><a class='btn btn-delete btn-mod btn-not-active'>Modifica</a><a class='btn btn-delete btn-danger'>Elimina</a></td></tr>";
        $("#diagnosis_list > tbody").append(txt);
        $('#add-news > div > div > ul > li > .selected').addClass("disabled");
        //$('#add-news div select').find(":selected").attr("disabled","disabled");
        //alert("Ripetizione: "+n+" subtext: "+a+" text: "+b); 
    });    
    
 });

function ajaxNews(my_url)
{
	var iTab=new Array();

	//ottenimento dati dalla pagina
	$('#diagnosis_list > tbody  > tr').each(function() {
    	var tot="";
        var cont=0;
        $(this).find('td').each (function() {
			if(cont<4)
            {
              tot+=$(this).text();
              if(cont<3)
                  tot+="-";
              }
            cont++;
		});  
		iTab.push(tot);
	});
	var iJSONel=JSON.stringify(iTab);
	
    $.ajax({
    	type: "POST",
        url: my_url,
     	data: {JSONel:iJSONel},
        success: function(msg)
        {
        	if(msg=="Aggiunto"){
            	alert("impostazioni.php");
                return;
            }
        },
           
        error: function()
        {
          alert("Chiamata fallita, si prega di riprovare...");
        }
      });
}
 
 
 