<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
 <div class="topnav w3-bar">
  <a href="http://termproject.christianbrooks.net/" class="w3-bar-item w3-button w3-hide-small">Log out</a>
  <a href="<? echo site_url("Pages/form"); ?>" class="w3-bar-item w3-button w3-hide-small">Insert Your Info</a>
  <a href="<? echo site_url("Pages/signup"); ?>" class="w3-bar-item w3-button w3-hide-small">Sign Up</a>
  <a href="<? echo site_url("Pages/ajaxReceive"); ?>" class="w3-bar-item w3-button w3-hide-small">Search</a>
  <a href="<? echo site_url("Pages/chart"); ?>" class="w3-bar-item w3-button w3-hide-small">Chart</a>
  <a href="<? echo site_url("Pages/facebook"); ?>" class="w3-bar-item w3-button w3-hide-small">Feedback</a>

  <a href="javascript:void(0)" class="w3-bar-item w3-button w3-right w3-hide-large w3-hide-medium" onclick="myFunction()">&#9776;</a>
</div>

<div id="demo" class="w3-bar-block w3-red w3-hide w3-hide-large w3-hide-medium">
  <a href="http://termproject.christianbrooks.net/" class="w3-bar-item w3-button">Log out</a>
  <a href="<? echo site_url("Pages/form"); ?>" class="w3-bar-item w3-button">Insert Info</a>
  <a href="<? echo site_url("Pages/signup"); ?>" class="w3-bar-item w3-button">Sign Up</a>
  <a href="<? echo site_url("Pages/ajaxReceive"); ?>" class="w3-bar-item w3-button">Search</a>
  <a href="<? echo site_url("Pages/chart"); ?>" class="w3-bar-item w3-button">Chart</a>
  <a href="<? echo site_url("Pages/facebook"); ?>" class="w3-bar-item w3-button">Feedback</a>
</div>
<br>

<script>
function myFunction() {
    var x = document.getElementById("demo");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else { 
        x.className = x.className.replace(" w3-show", "");
    }
}	


</script>

