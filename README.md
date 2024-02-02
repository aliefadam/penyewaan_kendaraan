## Vehicle Manager

Aplikasi Manajemen Penyewaan Kendaraan adalah solusi komprehensif untuk mengelola proses penyewaan kendaraan. Dengan mendukung dua peran utama, yaitu Admin dan Pihak Penyetuju, aplikasi ini dirancang untuk memberikan pengalaman pengguna yang efisien dan responsif, baik pada desktop maupun perangkat mobile.

## Fitur Utama

1. Pengelola Pemesanan :
    - Admin dapat dengan mudah menginput pemesanan kendaraan melalui antarmuka yang ramah pengguna.
    - Kemampuan untuk menentukan driver untuk setiap pemesanan, memberikan fleksibilitas dan kontrol penuh kepada admin.
2. Pihak Penyetuju :
    - Pihak yang menyetujui memiliki tugas untuk memberikan persetujuan atau penolakan terhadap setiap pemesanan.
    - Penggunaan dua tingkat persetujuan (level 1 dan level 2) untuk memastikan proses persetujuan yang tepat.
3. Antarmuka Responsif :
    - Aplikasi dirancang agar responsif, memberikan pengalaman pengguna yang optimal baik pada desktop maupun perangkat mobile.
4. Riwayat Penyewaan :
    - Admin dapat dengan mudah melihat dan melacak riwayat penyewaan kendaraan untuk referensi dan analisis.
    - Fitur penyaringan dan pencarian mempermudah penemuan informasi spesifik.

## Informasi Teknis

-   **Database Version:** MySQL 15.1
-   **PHP Version:** 8.1.1
-   **Framework:** Laravel Framework 10.43.0

## Instalasi

Berikut adalah langkah-langkah untuk menginstal proyek ini:

1. Silakan lakukan cloning proyek ini atau unduh secara langsung.
2. Ekstrak file dan letakkan dalam folder penyimpanan pilihan Anda.
3. Buka terminal anda
4. Jika file .env belum ada, mereka perlu menyalin file .env.example menjadi .env dan kemudian mengonfigurasikan pengaturan database dan konfigurasi lainnya di dalam file tersebut, yaitu dengan cara mengetikkan "cp .env.example .env"
5. ketikkan perintah "php artisan key:generate" untuk menghasilkan kunci aplikasi yang diperlukan.
6. Selanjutnya, ketikkan "php artisan migrate --seed" di terminal. Penggunaan opsi "--seed" di sini memastikan bahwa data dari DatabaseSeeder.php juga disertakan dalam proses migrasi, mengisi basis data dengan data dummy.
7. Terakhir, jalankan "php artisan serve" untuk memulai server pengembangan dan mengakses aplikasi melalui browser.

## Daftar Username dan password tiap role

-   Admin:

1. email: admin@gmail.com
   password: admin123

-   Pihak yang menyetujui:

1. email: bowo@gmail.com
   password: bowo123
2. email: tomy@gmail.com
   password: tomy123
3. email: eva@gmail.com
   password: eva123
4. email: rudi@gmail.com
   password: rudi123
5. email: nina@gmail.com
   password: nina123

## Panduan Penggunaan Aplikasi

1. Pertama-tama, aplikasi ini akan membawa Anda ke halaman login. Silakan login menggunakan email dan password yang telah disediakan di atas.
2. Jika login sebagai admin, Anda akan diarahkan ke halaman admin; namun, jika login sebagai pihak yang memberikan persetujuan, Anda akan diarahkan ke halaman yang sesuai.
3. Sebagai contoh, jika login sebagai admin:
    - Terdapat 3 menu, yaitu menu dashboard, tambah penyewaan, dan riwayat penyewaan.
    - Pada menu dashboard, akan ditampilkan grafik penyewaan kendaraan.
    - Pada menu tambah penyewaan, admin dapat menginput penyewaan kendaraan melalui formulir yang mencakup informasi seperti jenis kendaraan, driver, dan persetujuan dari level 1 dan 2.
        - Data yang ditambahkan pada menu tambah penyewaan akan terlihat pada menu riwayat penyewaan.
    - Pada menu riwayat penyewaan, terdapat tabel yang berisi riwayat data penyewaan yang telah ditambahkan oleh admin (data yang ditampilkan diurutkan secara menurun berdasarkan waktu penambahan admin).
        - Fitur filter memungkinkan pengguna memfilter data berdasarkan rentang tanggal tertentu:
            - Pilih tanggal mulai pada input "Dari:" dan tanggal akhir pada input "Sampai:".
            - Tekan tombol filter untuk menerapkan filter.
        - Tombol "Tampilkan Semua" mengembalikan tampilan ke seluruh data.
        - Terdapat opsi untuk mengekspor data dalam format file excel (.xlsx) dengan menekan tombol export, mengambil data yang ditampilkan di tabel.
4. Jika admin menambahkan satu data penyewaan, rincian pihak persetujuan level 1, misalnya "Bowo", dapat dilihat pada halaman riwayat penyewaan. Bowo harus login dengan email dan password yang disediakan untuk memberikan tanggapan kepada admin.
5. Jika "Bowo" sudah login, halaman menampilkan daftar permintaan penyewaan kendaraan, dengan opsi untuk memberikan respons "Terima" atau "Tolak" pada kolom "Aksi".
    - Tombol "Terima" meneruskan permintaan ke pihak persetujuan level 2 dengan status "Menunggu Persetujuan Pihak Level 2".
    - Tombol "Tolak" mengubah status permintaan menjadi "Ditolak", dan permintaan tidak akan diteruskan ke Pihak Persetujuan Level 2.
6. Kembali login sebagai admin untuk melihat perubahan status pada halaman riwayat penyewaan.
    - Jika status menjadi "Menunggu Persetujuan Pihak Level 2", pihak persetujuan level 2, misalnya "Eva", harus melakukan tindakan serupa dengan yang dilakukan "Bowo". "Eva" perlu login untuk memberikan tanggapan.
    - Jika statusnya "Ditolak", pihak persetujuan level 2 tidak akan menerima permintaan penyewaan.
7. Jika "Eva" sudah login, halaman menampilkan daftar permintaan penyewaan kendaraan yang telah disetujui oleh pihak persetujuan level 1, yaitu "Bowo".
    - "Eva" dapat memberikan respons dengan menekan tombol "Terima" atau "Tolak". Jika "Terima", status akan berubah menjadi "Pengajuan Penyewaan Diterima"; jika "Tolak", status akan menjadi "Ditolak".
8. Silakan login sebagai admin untuk melihat perubahan status tersebut.
