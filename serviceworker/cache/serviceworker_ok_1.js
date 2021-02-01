/*definisco un content se non cè rete vai a quel content*/
var responseContent = "<html>" +
  "<body>" +
  "<style>" +
  "body {text-align: center; background-color: #333; color: #eee;margin:0 auto; }" +
  "</style>" +
  "<h1>Sito Viaggi</h1>" +
  "<p>Abbiamo un problema con la tua connessione Internet </p>" +
  "<p>visita il nostro sito offline</p>" +
  "</body>" +
  "</html>";

self.addEventListener("fetch", function(event) {
  event.respondWith(
    fetch(event.request).catch(function() {
      return new Response(responseContent, {headers: {"Content-Type": "text/html"}});
    })
  );
}); 



 

 
 

 

