if ("serviceWorker" in navigator) {
    navigator.serviceWorker.register("serviceworker.js").then(function(registration) {
        console.log("Service Worker registrato con scopo:", registration.scope);
    }).catch(function(err) {
        console.log("Service Worker registration fallita:", err);
    });
}



//accettazione delle notifiche 
//utente accetta notifiche e quindi nello schermo apppare una notifice: Ti sei iscritto. Benvenuto
// var enableNotificationsButtons = document.querySelectorAll('.notifiche');

// function mostraNotifiche() {
//     if ('serviceWorker' in navigator) {
//         var options = {
//             body: 'Benvenuto!',
//             icon: 'Images/manifest/icon-192x192.png',
//             dir: 'ltr',
//             lang: 'en-US', // BCP 47,
//             vibrate: [100, 50, 200],
//             tag: 'conferma-notifica',
//             renotify: true,
//             actions: [
//                 { action: 'confirm', title: 'conferma', icon: 'Images/manifest/icon-192x192.png' },
//                 { action: 'cancel', title: 'cancella', icon: 'Images/manifest/icon-192x192.png' }
//             ]
//         };

//         navigator.serviceWorker.ready
//             .then(function(swreg) {
//                 swreg.showNotification('Ti sei iscritto alle nostre notifiche!!', options);
//             });
//     }
// }
// //cliicando su check box di log si arriva a questa funzione 
// //che conferma utente accetta le notifiche
// function permessoNotifiche() {
//     Notification.requestPermission(function(result) {
//         console.log('Scelta Utente', result);
//         if (result !== 'granted') {
//             console.log('Nessun permesso alle notifiche');
//         } else {
//             mostraNotifiche();
//         }
//     });
// }
// //questa funzione mostra il pulsante accetta notifiche (log.php) se le notifiche sono abilitate 
// if ('Notification' in window) {
//     for (var i = 0; i < enableNotificationsButtons.length; i++) {
//         enableNotificationsButtons[i].style.display = 'inline-block';
//         enableNotificationsButtons[i].addEventListener('click', permessoNotifiche);
//     }
// }