# Kelompok 9 Praktikum Prognet

Untuk **soal dan panduan, Upload Pengerjaan Laporan update di branch main aja** ada di directory **Prognet 2022/ **

Untuk **Kode Program Project E-commerce** ada di directory  PraktikumECommerce/ 

Untuk develop per modul dapat dibuat branch masing-masing modul seperti branch modul-1, modul-2, modul-3, modul-4, modul-5. Kalau programnya udah fix baru bisa dimasukin ke branch master atau branch main. 

Kalau misalnya ada update penting baru ada di branch main nantinya misalnya kek tema, update migration dll.

# Gunakan Database

Dapat digunakan database db_praktikum_prognet.sql yang sudah disediakan lalu nantinya dapat dilakukan import

# Develop nya dengan cara 

Buat database namanya PraktikumECommerce

    git clone https://github.com/gricowijaya/praktikum-prognet.git

    cd PraktikumECommerce/

    composer install && composer update && npm install && npm run dev

    cp .env.example .env 

# Konfigurasi .env

Konfig .env udah disiapin biar semua nama database dari satu komputer dengan komputer lainnya sama. kalau udah di copy bisa langsung

    php artisan key:generate

tambahin line ini di mailer nya 

MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=7614054437a94d
MAIL_PASSWORD=a14cd3f27f4aec
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="kelompok9praktikumprognet@gmail.com"
MAIL_FROM_NAME="${APP_NAME}"

# di mailtrap.io

Di Mailtrap masuk dengan akun gugel pake credential dibawah ini.

email    : kelompok9praktikumprognet@gmail.com
password : $123456789kelompok9

# Buat Mailer 

    Ada soal yang make mail itu bisa diedit di .env nya ntar paka mailtrap.io

**SEMANGAT**
