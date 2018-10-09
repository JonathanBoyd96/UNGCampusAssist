<?
echo form_label("Get as HTML:", "first").
	form_input("ajaxHTML", set_value("ajaxHTML"), 
		array("data-url"=> site_url("Pages/ajaxSend"))).
	"<br>";
echo form_label("Get as JSON:", "first").form_input("ajaxLastNameJSON", set_value("ajaxLastNameJSON"))."<br>";
?>
