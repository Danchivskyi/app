<!DOCTYPE html>
<html lang="pl" dir="ltr">
<head>
 <meta charset="utf-8" />
 <title>PHP -PWA</title>
 <link rel="dane" href="dane.json">
 <script type="text/javascript">
 if('serviceWorker' in navigator) {
 navigator.serviceWorker.register('service-worker.js', { scope:
'/' })
 .then(function(registration) {
 console.log('Service Worker jest zarejestrowany');
 }
 );
 navigator.serviceWorker.ready.then(function(registration) {
  console.log('Service Worker jest gotowy');
 });
 }
 </script>
</head>
<body>
 <h2>Politechnika Rzeszowska im. Ignacego Łukasiewicza</h2>
 <ol>
 <li>WYDZIAŁ BUDOWNICTWA, INŻYNIERII ŚRODOWISKA I ARCHITEKTURY</li>
 <li>WYDZIAŁ BUDOWY MASZYN I LOTNICTWA</li>
 <li>WYDZIAŁ CHEMICZNY</li>
 <li>WYDZIAŁ ELEKTROTECHNIKI I INFORMATYKI</li>
 <li>WYDZIAŁ MATEMATYKI I FIZYKI STOSOWANEJ</li>
 <li>WYDZIAŁ ZARZĄDZANIA</li>
 </ol>
</body>
</html>
