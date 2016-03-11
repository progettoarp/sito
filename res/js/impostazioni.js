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
    	var txt ="<tr class='ui-sortable-handle not-saved'><td class='priority'>"+(rowCount+1)+"</td><td>"+b+"</td><td>"+a+"</td><td>"+n+"</td><td><a class='btn btn-delete btn-danger'>Elimina</a></td></tr>";
        $("#diagnosis_list > tbody").append(txt);
        $('#add-news > div > div > ul > li > .selected').addClass("disabled");
        //$('#add-news div select').find(":selected").attr("disabled","disabled");
        //alert("Ripetizione: "+n+" subtext: "+a+" text: "+b); 
<<<<<<< HEAD
    });
	if($("#citta-cerca").val()=="")
	{
		$("#a-meteo").addClass("btn-not-active");
	}
	$("#a-meteo").on("click",function(){
    	var c = $('#citta-trovate').find(":selected").val();
    	var c2=c.split(",");
		var rowCount = $('#localita_list > tbody > tr').length;
		var z = $('#citta-trovate').find(":selected").attr("zmw");
		var lnk="http://api.wunderground.com/api/25d937211f68c2d5/forecast/q/zmw:"+z+".json";
    	var txt ="<tr class='ui-sortable-handle not-saved'><td id='"+lnk+"' class='priority'>"+(rowCount+1)+"</td><td>"+c2[0]+"</td><td class='cap-mod'> </td><td class='prov-mod'> </td><td>"+c2[1].trim()+"</td> <td><a class='btn btn-delete btn-danger'>Elimina</a></td></tr>";
        $("#localita_list > tbody").append(txt); 
    });
	
	$(function () {
			$(".cap-mod").dblclick(function (e) {
			   e.stopPropagation();      //<-------stop the bubbling of the event here
			   var currentEle = $(this);
			   var value = $(this).html();
			   updateCap(currentEle, value);
			   $(this).parent().addClass("not-saved");
			});
		});

		function updateCap(currentEle, value) {
		  $(currentEle).html('<input class="thVal" type="text" value="' + value + '" />');
		  $(".thVal").focus();
		  $(".thVal").keyup(function (event) {
			  if (event.keyCode == 13) {
				  $(currentEle).html($(".thVal").val());
			  }
		  });

		  $(document).click(function () { // you can use $('html')
				$(currentEle).html($(".thVal").val());
		  });
		}
		
		
			$("#localita_list tbody").on("dblclick", "tr > .prov-mod,tr > .cap-mod",function (e) {
			   e.stopPropagation();      //<-------stop the bubbling of the event here
			   var currentEle = $(this);
			   var value = $(this).html();
			   updateCap(currentEle, value);
			   $(this).parent().addClass("not-saved");
			});
			function updateProv(currentEle, value) {
		  $(currentEle).html('<input class="thVal" type="text" value="' + value + '" />');
		  $(".thVal").focus();
		  $(".thVal").keyup(function (event) {
			  if (event.keyCode == 13) {
				  $(currentEle).html($(".thVal").val());
			  }
		  });

		  $(document).click(function () { // you can use $('html')
				$(currentEle).html($(".thVal").val());
		  });
		}
		
		$(function () {
			$(".num-mod").dblclick(function (e) {
			   e.stopPropagation();      //<-------stop the bubbling of the event here
			   var currentEle = $(this);
			   var value = $(this).html();
			   updateVal(currentEle, value);
			   $(this).parent().addClass("not-saved");
			});
		});

		function updateVal(currentEle, value) {
		  $(currentEle).html('<input class="thVal" type="number" min=1 value="' + value + '" />');
		  $(".thVal").focus();
		  $(".thVal").keyup(function (event) {
			  if (event.keyCode == 13) {
				  $(currentEle).html($(".thVal").val());
			  }
		  });

		  $(document).click(function () { // you can use $('html')
				$(currentEle).html($(".thVal").val());
		  });
		}
	
=======
    });    
    
>>>>>>> 1e384caa1e147157a35b6a906c16be3ae7452a67
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
<<<<<<< HEAD

function ajaxMeteo(my_url)
{
	var iTab=new Array();

	//ottenimento dati dalla pagina
	$('#localita_list > tbody  > tr').each(function() {
    	var tot="";
        var cont=0;
        $(this).find('td').each (function() {
			if(cont<5)
            {
              tot+=$(this).text();
				if(cont==0)
				{
					tot+= "!" + $(this).attr("id");
				}
              if(cont<4)
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
			//alert(msg);
        	if(msg=="Aggiunto"){
            	location.href="impostazioni.php";
                return;
            }
        },
           
        error: function()
        {
          alert("Chiamata fallita, si prega di riprovare...");
        }
      });
}

function ajaxPopupNews(id,my_url,div,type)
{
	var iCat;
	var iLink;
	var iNum;
	if(type!='get')
	{
		//ottengo le nuove informazioni da salvare
		iCat=$("#popup-categoria").val();
		iLink=$("#popup-link").val();
		iNum=$("#popup-numero").val();
	}
	$.ajax({
    	type: "POST",
        url: my_url,
     	data: {idNews:id, action:type, categoria:iCat, link:iLink, num:iNum},
        success: function(msg)
        {
			//alert(msg);
			if(msg!='saved')
			{
				document.getElementById(div).innerHTML = msg;
			}
			else
			{
				location.href="impostazioni.php";
                return;
			}
			$("#mod-news").click(function(){
				var x=$("#popup-categoria").val();
				var x1=$("#popup-link").val();
				if(x!=""&&x1!="")
				{
					ajaxPopupNews(id,'res/php/popupNews.php',"",'save');
				}	
			});
        },
           
        error: function()
        {
          alert("Chiamata fallita, si prega di riprovare...");
        }
      });
}

function saveGenerali(my_url,type)
{
	var mLang;
	var mNotte;
	var iNotte;
	var fNotte;
	var mMuto;
	var lOre;
	var lNotizie;
	var lMeteo;
	var lBorsa;
	//assegnazione valori
	mLang=$('.flag-selected').attr('lingua');
	if($("#cmn-toggle-1").is(":checked"))
		mNotte=1;
	else
		mNotte=0;
	iNotte=$('#inizio-notte input').val();
	fNotte=$('#fine-notte input').val();
	if($("#cmn-toggle-2").is(":checked"))
		mMuto=1;
	else
		mMuto=0;
	lOre=$("#intervallo-ore select :selected").val();
	if($("#cmn-toggle-notizie-1").is(":checked"))
		lNotizie=1;
	else
		lNotizie=0;
	if($("#cmn-toggle-meteo-1").is(":checked"))
		lMeteo=1;
	else
		lMeteo=0;
	if($("#cmn-toggle-borsa-1").is(":checked"))
		lBorsa=1;
	else
		lBorsa=0;
	
	$.ajax({
    	type: "POST",
        url: my_url,
     	data: {action:type, lingua:mLang, mod_notte:mNotte, ini_notte:iNotte, fin_notte:fNotte, mod_muto:mMuto,	leg_ore:lOre, leg_notizie:lNotizie,	leg_meteo:lMeteo, leg_borsa:lBorsa},
        success: function(msg)
        {
			//alert(msg);
			if(msg=='saved')
			{
				location.href="impostazioni.php";
                return;
			}	
       },
           
        error: function()
        {
          alert("Chiamata fallita, si prega di riprovare...");
        }
      });
}
=======
>>>>>>> 1e384caa1e147157a35b6a906c16be3ae7452a67
 
 
 