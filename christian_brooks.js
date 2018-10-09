// JavaScript Document
$(document).ready(function(e) {//make sure all JS runs after page finishes loading
	
    $(".myTable tr:even").css("background-color", "orange");//make even rows orange
	
	$("input[name=likecats").on("change", function(){
		$("#cats").removeAttr("disabled");//remove disabled attribute
		if(this.value == "no")
		{
			$("#cats").attr("disabled", "disabled");//make the textbox disabled if "No" is selected
		}
	});
});