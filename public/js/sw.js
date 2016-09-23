

var cacheName = 'v1'; 


var cacheFiles = [
	
	'/',

	'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css',
	'https://fonts.googleapis.com/css?family=Lato:100,300,400,700',
	'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css',
	
	'/js/pouchdb-6.0.4.min.js',
	'/js/apps.js',
	'/home'

	
]
console.log('Started', self);
self.addEventListener('install', function(e) {
  
  e.waitUntil(

    	
	    caches.open(cacheName).then(function(cache) {

	    	
			console.log('[ServiceWorker] Caching cacheFiles');
			return cache.addAll(cacheFiles);
	    })
	); 

});

self.addEventListener('activate', function(event) {
     console.log('[ServiceWorker] Activated');

     event.waitUntil(

    	
		caches.keys().then(function(cacheNames) {

			return Promise.all(cacheNames.map(function(thisCacheName) {

				if (thisCacheName !== cacheNames) {
console.log(cacheNames);
					console.log('[ServiceWorker] Removing Cached Files from Cache - ', thisCacheName);
					return caches.delete(thisCacheName);
				}
			}));
		})
	); 
});
/*self.addEventListener('fetch', function(e) {
  console.log('Push message received', e);

  console.log('[ServiceWorker] Fetch', e.request.url);

	// e.respondWidth Responds to the fetch event
	  e.respondWith(

		// Check in cache for the request being made
		caches.match(e.request)


			.then(function(response) {

				// If the request is in the cache
				if ( response ) {
					console.log("[ServiceWorker] Found in Cache", e.request.url, response);
					// Return the cached version
					return response;
				}

				// If the request is NOT in the cache, fetch and cache

				var requestClone = e.request.clone();
				fetch(requestClone)
					.then(function(response) {

						if ( !response ) {
							console.log("[ServiceWorker] No response from fetch ")
							return response;
						}

						var responseClone = response.clone();

						//  Open the cache
						caches.open(cacheName).then(function(cache) {

							// Put the fetched response in the cache
							cache.put(e.request, responseClone);
							console.log('[ServiceWorker] New Data Cached', e.request.url);

							// Return the response
							return response;
			
				        }); // end caches.open

					})
					.catch(function(err) {
						console.log('[ServiceWorker] Error Fetching & Caching New Data', err);
					});


			}) // end caches.match(e.request)
	); // end e.respondWith
  // TODO
});*/
self.addEventListener('fetch', function(event) {

  event.respondWith(
    // try to return untouched request from network first
    fetch(event.request.url, { mode: 'no-cors' }).catch(function() {
      // if it fails, try to return request from the cache
      return caches.match(event.request).then(function(response) {
        if (response) {
          return response;
        }
        // if not found in cache, return default offline content
       /* if (event.request.headers.get('accept').includes('text/html')) {
          return caches.match('sw-offline-content');
        }*/
      })
    })

  );
      console.log(event);
      var requestClone = e.request.clone();
				fetch(requestClone)
					.then(function(response) {

						if ( !response ) {
							console.log("[ServiceWorker] No response from fetch ")
							return response;
						}

						var responseClone = response.clone();

						
						caches.open(cacheName).then(function(cache) {

							
							cache.put(e.request, responseClone);
							console.log('[ServiceWorker] New Data Cached', e.request.url);

							
							return response;
			
				        }); 

					})
					.catch(function(err) {
						console.log('[ServiceWorker] Error Fetching & Caching New Data', err);
					});
});
