
jQuery(document).ready(function($) {
   
   /* home page header */
   $("#home-meu").click(function(){
      $(".saeon-header").removeClass("sn-noscroll");
   });

   /* search */
	$('body').on('submit', '#sasdisearch', function(e){
		e.preventDefault();
		
		var searchterm = $('.sasdisearch').val();
      var searchurl = 'http://www.sasdi.net/search.aspx?noframe=true&anytext='
      //var searchurl = 'https://catalogue.saeon.ac.za/records?terms=' 
		console.log(searchurl + searchterm);
		window.open(searchurl + searchterm,'_blank');
	});
});
