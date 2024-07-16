<script>
    document.addEventListener('livewire:init', () => {
        initSW();
    })

    function initSW() {
        if (!"serviceWorker" in navigator) {
            //service worker isn't supported
            console.log('oi')
            return;
        }

        //don't use it here if you use service worker
        //for other stuff.
        if (!"PushManager" in window) {
            //push isn't supported
            console.log('noi')
            return;
        }

        //register the service worker
        navigator.serviceWorker.register('{{ asset('sw.js') }}')
            .then(() => {
                console.log('serviceWorker installed!')
                initPush();
            })
            .catch((err) => {
                console.log(err)
            });
    }

    function initPush() {
        if (!navigator.serviceWorker.ready) {
            return;
        }

        new Promise(function (resolve, reject) {
            const permissionResult = Notification.requestPermission(function (result) {
                resolve(result);
            });

            if (permissionResult) {
                permissionResult.then(resolve, reject);
            }
        })
            .then((permissionResult) => {
                if (permissionResult !== 'granted') {
                    throw new Error('We weren\'t granted permission.');
                }
                subscribeUser();
            });
    }

    function subscribeUser() {
        navigator.serviceWorker.ready
            .then((registration) => {
                const subscribeOptions = {
                    userVisibleOnly: true,
                    applicationServerKey: 'BJZmq18jOWYQ96NiPXS35SOrThfjSREOfpIdYI87T1aqpoPQ1Y0R9MZR6owV8n36ZdxoXVtvZ8vP8QrGHuCyTMY'
                };

                console.log('subscribe on push manager')
                return registration.pushManager.subscribe(subscribeOptions);

            })
            .then((pushSubscription) => {
                console.log('received: ', JSON.stringify(pushSubscription))
                storePushSubscription(pushSubscription);
            });
    }

    function storePushSubscription(pushSubscription) {
        const token = document.querySelector("meta[name=csrf-token]").getAttribute('content');
        console.log(token)

        fetch('/push', {
            method: 'POST',
            body: JSON.stringify(pushSubscription),
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
                'X-CSRF-Token': token
            }
        })
            .then((res) => {
                return res.json();
            })
            .then((res) => {
                console.log(res)
            })
            .catch((err) => {
                console.log(err)
            });
    }
</script>
