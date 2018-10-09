// JavaScript Document
$(document).ready(function(e) {
    $("input[name='ajaxHTML']").keyup(function(e){
		$("#output").html("Loading!");
		$.ajax({
			url: $("input[name='ajaxHTML']").attr("data-url")+"/"+$("input[name='ajaxHTML']").val()
			}).done(function(data) {
			$("#output").html(data);
		});
	});
    $("input[name='ajaxLastNameJSON']").keyup(function(e){
		$("#output").html("Loading!");
		$.getJSON("http://termproject.christianbrooks.net/Pages/ajaxSend/"+$("input[name='ajaxLastNameJSON']").val()+"/object", 
			function( data ){
				var items = [];
				$.each( data, function( key, val ) {//for each row
					items.push( "<li id='" + key + "'><ul>");
					$.each(val, function(key2, val2){//for each column in a row
						items.push( "<li id='" + key2 + "'>" + key2 + " : " + val2 + "</li>" );
					});
					items.push( "</ul></li>");
				});
				$("#output").html($( "<ul/>", {
				"class": "my-new-list",
				html: items.join( "" )
				}));
		});
	});
});