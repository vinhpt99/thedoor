

$(document).ready(function() {
	var check = localStorage.getItem('loading');
	if(check == null){
		setTimeout(function(){
		$('body').addClass('loaded');
		$('h1').css('color','#222222');
	}, 10000);
	localStorage.setItem('loading','chuoi');
	}else{
		setTimeout(function(){
			$('body').addClass('loaded');
			$('h1').css('color','#222222');
		}, 3000);
	}
	
	
});
window.localStorage.removeItem('loading');