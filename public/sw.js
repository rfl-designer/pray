self.addEventListener('push', (event) => {
    const notification = event.data.json();
    // {"title": "HI", "body": "check this out", "url": "https://google.com"}
    console.log(notification);

    event.waitUntil(self.registration.showNotification(notification.title, {
        body: notification.body,
        data: {
            notifURL: notification.data.notiURL
        }
    }));

});

self.addEventListener('notificationclick', (event) => {
    event.waitUntil(clients.openWindow(event.notification.data.notifURL));
})
