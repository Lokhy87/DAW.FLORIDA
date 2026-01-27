const CACHE_NAME = "tienda-cache-v1";
const assets = [
  "index.html",
  "style.css",
  "script.js",
  "manifest.json",
  "assets/producto1.jpg",
  "assets/producto2.jpg",
  "assets/producto3.mp4",
  "assets/producto3.png",
  "icons/icon-192.png",
  "icons/icon-512.png",
];

self.addEventListener("install", (event) => {
  event.waitUntil(
    caches.open(CACHE_NAME).then((cache) => cache.addAll(assets))
  );
});

self.addEventListener("fetch", (event) => {
  event.respondWith(
    caches.match(event.request).then((resp) => resp || fetch(event.request))
  );
});
