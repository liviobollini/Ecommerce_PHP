/*Questa è la versione piu' completa definisco i file che voglio siano nella cache e nomino la cache . Se non cè rete vengono mostrati i file nella cache se cambio rinomino la cache e la versione precedente viene eliminata 
NB: i file sono da cambiare */
var CACHE_NAME = "gih-cache-v0";
var CACHED_URLS = [
  // Our HTML
  "index.php",
   "log.php",
    "registrati.php",
      "america_dinamica.php",
  // Stylesheets
  "/css/gih.css",
  "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css",
  "https://fonts.googleapis.com/css?family=Lato:300,600,900",
  // JavaScript
  "https://code.jquery.com/jquery-3.0.0.min.js",
  "/js/app.js",
  // Images
  "/img/page/america.jpg",
   "/img/page/bandiera.jpg",
  "/img/page/bretagna.jpg",
   "/img/page/gazzelle.jpg", 
  "/img/page/funivia.jpg",
   "/img/slider/mvalley.jpg"
   
 
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
          return caches.match("/index.html");
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
          if (CACHE_NAME !== cacheName && cacheName.startsWith("gih-cache")) {
            return caches.delete(cacheName);
          }
        })
      );
    })
  );
});

 
 