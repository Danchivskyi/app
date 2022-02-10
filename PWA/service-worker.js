self.addEventListener('install', e => {
  e.waitUntil(
  caches.open('cn_blog').then(cache => {
  return cache.addAll([
  'offline.html',
  'favicon.jpg',
  'main.css',
  'scripts.js'
  ])
  .then(() => self.skipWaiting());
  })
  )
 });
 self.addEventListener('activate', event => {
  event.waitUntil(self.clients.claim());
 });
 self.addEventListener('fetch', event => {
  event.respondWith(
  caches.match(
  event.request, {
  ignoreSearch : true
  }
  ).then(response => {
  return response || fetch(event.request);
  }).catch(function(error) {
  console.log('Pobieranie nie powiodło się; zwracanie wersji offline.', error);
  })
  );
});
