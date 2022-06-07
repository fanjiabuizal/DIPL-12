<li>Nama Aplikasi: Oleh-Shop (Admin)
<li>Fungsi: Untuk menjual oleh oleh

Kelompok 12:
1. Kevin Adrian Manurung - 1301190392
2. Imam Rasyidin Saputra - 1301194448
3. Christhofer Laurent Juliant - 1301190379


Sebelum dijalankan harus melakukan :
1. Clone Project melalui github
2. Buka cmd berdasarkan lokasi projectnya
3. Ketik di cmd : "composer install"
4. Ketik di cmd : "composer update"
5. Nyalakan xampp dan buat database bernama "oleh_shop_database"
6. Ketik di cmd : "php artisan migrate:fresh --seed"= Untuk membuat database yang sudah dibuat sebelumnya menggunakan migrate dan meletakkan seedernya
7. Ketik di cmd : "php artisan storage:link" = Untuk membuat link storage pada public karena terdapat gambar dari database yang disimpan pada storage
8. Ketik di cmd : "php artisan serve" di cmd
9. Buka Localhost:8000 di tab browser baru
