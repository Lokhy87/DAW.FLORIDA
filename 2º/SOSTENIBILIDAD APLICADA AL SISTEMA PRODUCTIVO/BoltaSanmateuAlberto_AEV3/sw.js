const CACHE_NAME = "kitesurf-pwa-v1";

const FILES_TO_CACHE = [
    "/",
    "/index.html",
    "/carrito.html",
    "/style.css",
    "/script.js",
    "/manifest.json",
    "/assets/kite1.webp",
    "/assets/kite2.webp",
    "/assets/Board1.webp",
    "/assets/Board2.webp",
    "/assets/boots.webp",
    "/assets/straps.webp",
    "/assets/harness1.webp",
    "/assets/harness2.webp",
    "/assets/neoprene1.webp",
    "/assets/neoprene2.webp",
    "/assets/Video_kite.mp4"
];

// Instalación: cachear archivos
self.addEventListener("install", event => {
    event.waitUntil(
        caches.open(CACHE_NAME).then(cache => {
            return cache.addAll(FILES_TO_CACHE);
        })
    );
});

// Activación: limpiar cachés antiguas
self.addEventListener("activate", event => {
    event.waitUntil(
        caches.keys().then(keys =>
            Promise.all(
                keys.map(key => {
                    if (key !== CACHE_NAME) {
                        return caches.delete(key);
                    }
                })
            )
        )
    );
});

// Fetch: servir desde caché o red
self.addEventListener("fetch", event => {
    event.respondWith(
        caches.match(event.request).then(response => {
            return response || fetch(event.request);
        })
    );
});
