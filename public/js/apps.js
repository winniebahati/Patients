


if ('serviceWorker' in navigator)
{


	
	navigator.serviceWorker.register('./js/sw.js').then (function(registration) {
		

	})

	.catch(function(err){
		console.log('Error has occured',err);
	})
}
