cara penggunaan 

Clone Projek
  git clone " https://github.com/Kazestrip24/digiprint.git "
  Masuk ke folder dengan perintah
  
  cd nama_projek
  Copy .env.example menjadi .env kemudia edit database dan api key nya
  composer install
  php artisan key:generate
  php artisan migrate
