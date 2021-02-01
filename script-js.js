if ("serviceWorker" in navigator) {
    navigator.serviceWorker.register("serviceworker.js").then(function(registration) {
        console.log("Service Worker registrato con scopo:", registration.scope);
    }).catch(function(err) {
        console.log("Service Worker registration fallita:", err);
    });
}


var enableNotificationsButtons = document.querySelectorAll('.enable-notifications');

function displayConfirmNotification() {
    var options = {
        body: 'Ti sei iscritto con successo alle nostre notifiche!',
        icon: 'Images/manifest/icon-192x192.png',
        image: 'Images/logo.png',
        dir: 'ltr',
        lang: 'it-IT', // BCP 47,
        vibrate: [100, 50, 200],
        badge: 'Images/manifest/icon-192x192.png',
    };
    new Notification('Benvenuto', options);
}

function askForNotificationPermission() {
    Notification.requestPermission(function(result) {
        console.log('scelta Utente', result);
        if (result !== 'granted') {
            console.log('Notifica NON accettata');
        } else {
            displayConfirmNotification();
        }
    });
}

if ('Notification' in window) {
    for (var i = 0; i < enableNotificationsButtons.length; i++) {
        enableNotificationsButtons[i].style.display = 'inline-block';
        enableNotificationsButtons[i].addEventListener('click', askForNotificationPermission);
    }
}