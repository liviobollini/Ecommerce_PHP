/*Prima cache se non cè interntet nella cache 2 file index.php e offline.php vai al file che è nelle cache */
/*registrare service worker*/
self.addEventListener('install', function(event) {
    self.skipWaiting();
  console.log('AGGIORNAMENTO service worker installato',event);
});
/*------------------------------*/
//aggiornare service worker /
self.addEventListener('activate', (event) => { console.log('updated service worker activated', event); });
/*------------------------------*/
/*caching: se non cè internet usa la cache*/
/*------------------------------*/
// self.addEventListener('fetch', (event) => {
//   event.respondWith( caches.match(event.request).then((response) => {
//
// return response || fetch(event.request).then((response) =>
// { console.log('Non eri on line e quindi abbiamo usato la cache!!');
// return caches.open('version1').then((cache) => {
//   cache.put(event.request, response.clone());
//   return response;
// });
// });
// })
// );
// });

 /*fine cache se non cè internet usa la cache*/
/*------------------------------*/
 /*se non è on line e la tua chiamata è index.php vai a offline.html */

self.addEventListener('install', (event) => {
 event.waitUntil(
   caches.open('version1').then((cache) => {
     return cache.addAll(
       [
         'index.php',
          'offline.html'
       ]);
   })
 );
});
self.addEventListener('fetch', (event) => {
 if(!navigator.onLine && event.request.url.indexOf('index.php') !== -1) {
   event.respondWith(showOfflineLanding(event));
 }
 else {
   event.respondWith(pullFromCache(event));
 }

});
function showOfflineLanding(event) {
 return caches.match(new Request('offline.html'));
}

function pullFromCache(event) {
 return caches.match(event.request).then((response) => {
   return response || fetch(event.request).then((response) => {
       return caches.open('version1').then((cache) => {
         cache.put(event.request, response.clone());
         return response;
       });
     });
 });
}

/*fine se non sei on line vai offline.html*/
/*------------------------------*/
