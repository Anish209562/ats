<style>
.popup{ width:auto; height: auto;  position: fixed; z-index: 99999999999999; right: 0; margin-top: 100px; padding: 10px; background: #317d09;
    color: #fff;
    font-family: -webkit-pictograph; display: none; }	
</style>

<div class="popup"><span id="popmsg">Successfully Submited</span></div>
<script>
	var m;
function popup(m){
$(document).ready(function(e){
	$("#popmsg").text(m);
	$(".popup").css("background","#317d09");
$(".popup").css("display","block");
$(".popup").delay(2000).fadeOut(1000);

});
}
	var m;
function popup2(m){
$(document).ready(function(e){
	$("#popmsg").text(m);
	$(".popup").css("background","#bb0c0c");
$(".popup").css("display","block");
$(".popup").delay(2000).fadeOut(1000);

});
}
</script>