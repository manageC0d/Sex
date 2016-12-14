$(document).ready(function(){
	$('.muted_video').click(function(){
		if($(this).hasClass('mute')){
			$(this).removeClass('mute');
			$('video').prop('muted', true);
		}else{
			$(this).addClass('mute');	
			$('video').prop('muted', false);
		}
	});
	
	//Block Links
	function blockLinks(){
		if($(window).width()<1601){
			$('.block_links').css({
				'left':0,
				'marginLeft':($(window).width() - 1324)/2	
			});	
		}else{
			$('.block_links').css({
				'left':0,
				'marginLeft':($(window).width() - 887)/2	
			});	
		}
	}
	blockLinks();
	$(window).resize(function(){
		blockLinks();
	});
	
});