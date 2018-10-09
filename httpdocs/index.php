<!doctype html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="styles.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<style>
	.code{
	border:1px #BBB solid;
	background-color:#CCC;
	padding:5px;
	display:inline-block;
	margin:5px 0px;
}
.output{
	border:1px #DDD solid;
	background-color:#EEE;
	padding:5px;
	display:inline-block;
	margin:5px 0px;
}
h3{
	margin:5px 0px;
}
	</style>
<script>
$(document).ready(function(e) {
    $("input[name='q1']").keyup(function(e){
		$("#output").html("Loading!");
		$.ajax({
			url: "user.php?type=html&q="+$("input[name='q1']").val()
			}).done(function(data) {
			$("#output").html(data);
		});
	});
    $("input[name='q2']").keyup(function(e){
		$("#output").html("Loading!");
		$.getJSON("user.php?q="+$("input[name='q2']").val(), 
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

</script>

</head>
<body>
Get HTML
<input name="q1" type="text">
<br>
Get JSON
<input name="q2" type="text">
<br>
<div id="output" >
	<ul class="my-new-list"></ul>
</div>

</body>
</html>