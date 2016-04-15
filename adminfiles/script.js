var licznik=0;
var menu_l_rekordow=0;
var menu_id_kategori;
var last_id=0;
var nowa_kategoria =0;

$(document).ready(function(){
	$(".plus").click(function(){
		$( "#dania" ).append( '<div id="'+(++last_id) +'" class="dish_record"> <a class="menu_cros"></a> nazwa :<input class="nazwa" style="width:400px;" value=""></input><br> składniki (opcjonalne) :<input class="skladniki" style="width:400px;" value=""></input><br>cena :<input class="cena" style="width:400px;" value=""></input></div>' );
		licznik++;
		
		
	});
	
	
	
	$(".save").click(function(){
		
			for(var i=0; i < menu_l_rekordow; i++){
				
				var rekord =  $("#dania div").eq(i);
				var id = rekord.attr("id");
				var nazwa = rekord.children(".nazwa").val();
				var skladniki = rekord.children(".skladniki").val();
				var cena = rekord.children(".cena").val();
				
		      $.ajax({
                    type:'GET',
                    url:'adminfiles/ajax_index.php?type=0&id_rekordu='+id+'&nazwa='+nazwa+'&skladniki='+skladniki+'&cena='+cena,
                    dataType: "HTML",
                   beforeSend: function(){
                       
                   },
                   success: function(obj){
						
                   },
                   error : function(){
                       content.html("<p>Przepraszamy, ale strona jest chwilowo niedostępna</p>");
                   },
                   complete: function(){
                      // loader.hide();
                   }
              });
			
			}
		
			for(var i= menu_l_rekordow; i < menu_l_rekordow+licznik; i++){
				
				
				
				var rekord =  $("#dania div").eq(i);
				var id = rekord.attr("id");
				var nazwa = rekord.children(".nazwa").val();
				var skladniki = rekord.children(".skladniki").val();
				var cena = rekord.children(".cena").val();
				
				
						
		      $.ajax({
                    type:'GET',
                    url:'adminfiles/ajax_index.php?type=1&id_rekordu='+id+'&nazwa='+nazwa+'&skladniki='+skladniki+'&cena='+cena+'&id_kategori='+menu_id_kategori,

                    dataType: "HTML",
                   beforeSend: function(){
                       
                   },
                   success: function(obj){
						
                   },
                   error : function(){
                       alert("błąd zapisu");
                   },
                   complete: function(){
                      // loader.hide();
                   }
              });
			  
			  
			}
			
			var nazwa_kategori = $("#category_name").val();
			 $.ajax({
                    type:'GET',
                    url:'adminfiles/ajax_index.php?type=3&nowa_kategoria='+nowa_kategoria+'&nazwa_kategori='+nazwa_kategori+'&id_kategori='+menu_id_kategori,

                    dataType: "HTML",
                   beforeSend: function(){
                       
                   },
                   success: function(obj){
						
                   },
                   error : function(){
                       alert("błąd zapisu");
                   },
                   complete: function(){
                      // loader.hide();
                   }
              });
			
			menu_l_rekordow+=licznik;
			alert("zapisano zmiany");
	
	});
	
	$('#dania').on('click', '.menu_cros', function(){
	 
		
			var id_to_delete = $(this).parent().attr("id");
					if(id_to_delete> last_id){
						licznik--;
						$(this).parent().hide("slow");
						return;
					}					
		      $.ajax({
                    type:'GET',
                    url:'adminfiles/ajax_index.php?type=2&id_rekordu='+id_to_delete,

                    dataType: "HTML",
                   beforeSend: function(){
                       
                   },
                   success: function(obj){
						menu_l_rekordow--;
                   },
                   error : function(){
                       alert("błą zapisu");
                   },
                   complete: function(){
                      // loader.hide();
                   }
              });
			$(this).parent().hide("slow");
    });
	
	$('.category_record').on('click', '.menu_cros', function(){
		
		var id_kategori_delete = $(this).parent().attr("class");
		
		
		$( "#dialog-confirm" ).dialog({
			resizable: false,
			height:240,
			width:400,
			modal: true,
			buttons: {
			"Tak, usuń": function() {
			$( this ).dialog( "close" );
				window.location.href = "http://mammarosa.com.pl/adminindex.php?category=1&delete="+id_kategori_delete;
			},
			Cancel: function() {
			$( this ).dialog( "close" );
			}
			}
		});
   

   });
	
$('body').on('click', '.save2', function(){
	
		
		var text1 = $("#1").val(); 
		var text2 = $("#2").val();
		var pn = $("#pn").val();
		var pt = $("#pt").val();
		var nd = $("#nd").val();
		var tel = $("#tel").val();
		var nip = $("#nip").val();
		var adres = $("#adres").val();
		
		$.ajax({
                    type: "POST",
					url:"adminfiles/ajax_index.php",
					data: { text1: text1, text2: text2,pn:pn,pt:pt,nd:nd,tel:tel,nip:nip,adres:adres,type:4 },
         
					dataType: "html",	
         
                   beforeSend: function(){
                       
                   },
                   success: function(obj){
						alert("zapisano zmiany");
                   },
                   error : function(){
                       alert("fail");
                   },
                   complete: function(){
                      // loader.hide();
                   }
              });
			  
	
	});
	
});



