/*versione per tutorial, nella cache ci sono i file che vengono utilizzati, 
se non cè rete vengono mostrati i file che sono nella cache. 
Se cerco un file che non era stato utilizzato e quindi non nella cache compare errore */
self.addEventListener("fetch", function(event) {
    event.respondWith(
        caches.open("cache-name").then(function(cache) {
            return fetch(event.request).then(function(networkResponse) {
                cache.put(event.request, networkResponse.clone());
                return networkResponse;
            }).catch(function() {
                return caches.match(event.request);
            });
        })
    );
});
/*fine cache */