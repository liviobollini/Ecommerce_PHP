/*Nomino una cache e ci metto 2 immagini e un file indexoffline.html se non cè rete vai al file. La cache viene numerata e ogni volta che faccio cambiamenti la versione precedente viene cancellata*/
var CACHE_NAME = "gih-cache-v2";
var CACHED_URLS = [
   "indexoffline.html",  
  "img/slider/mvalley.jpg",
  "img/logo/logo.png"
];

self.addEventListener("install", function(event) {
  event.waitUntil(
    caches.open(CACHE_NAME).then(function(cache) {
      return cache.addAll(CACHED_URLS);
    })
  );
});

self.addEventListener("fetch", function(event) {
  event.respondWith(
    fetch(event.request).catch(function() {
      return caches.match(event.request).then(function(response) {
        if (response) {
          return response;
        } else if (event.request.headers.get("accept").includes("text/html")) {
          return caches.match("indexoffline.html");
        }
      });
    })
  );
});

self.addEventListener("activate", function(event) {
  event.waitUntil(
    caches.keys().then(function(cacheNames) {
      return Promise.all(
        cacheNames.map(function(cacheName) {
          if (CACHE_NAME !== cacheName &&  cacheName.startsWith("gih-cache")) {
            return caches.delete(cacheName);
          }
        })
      );
    })
  );
});
