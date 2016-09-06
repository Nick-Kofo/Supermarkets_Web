(function($){
  $(function(){

    $('.button-collapse').sideNav();

  }); // end of document ready
})(jQuery); // end of jQuery name space

//goBack button
$(document).ready(function(){
	$('goBack').click(function(){
		parent.history.back();
		return false;
	});
});
