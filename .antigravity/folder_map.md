# Peta Folder & Fungsi Dasar Laravel (Percobaan-1)

## Fungsi Folder Utama
*   **app/Http/Controllers**
    Menyimpan logika dan jembatan pemroses (Controller). Controller bertugas menangani alur dari URL (*route*), menyiapkan data (seperti Array data CV), lalu mengirimkannya ke tampilan layar (*view*).
*   **resources/views**
    Tempat bernaungnya lapisan tampilan pengguna (*User Interface*). Laravel menggunakan format tambahan `.blade.php` di dalam sini untuk memudahkan percampuran format HTML murni dengan data/perintah khusus Laravel secara rapi.
*   **routes**
    Pusat kendali URL web. Semua alamat yang akan diakses pengguna harus "didaftarkan" pemetaannya di sini (melalui `web.php`).
*   **public**
    Ini adalah jalur utama terdepan yang dapat diakses oleh browser pengunjung. Segala file publik berwujud aset multimedia (seperti logo, font, dan file foto `myfoto.jpeg`) wajib diletakkan di sini, bukan di folder lain untuk mencegah risiko keamanan.

---

## File yang Dibuat & Diubah Selama Percobaan-1
Berikut adalah daftar modifikasi pada kode inti proyek:
1.  **`app/Http/Controllers/CVProfileController.php`** 
    *(Baru & Diubah)*: Dihasilkan via *artisan*, berfungsi memuat data array asosiatif (Nama, NIM, Pengalaman, Pendidikan) dan diarahkan ke *view*.
2.  **`routes/web.php`** 
    *(Diubah)*: Menonaktifkan *route* bawaan Laravel dan diarahkan ulang ke fungsi `index()` pada `CVProfileController` dengan tambahan fungsi *naming* `name('cv.profile')`.
3.  **`resources/views/layouts/app.blade.php`**
    *(Baru)*: Berkas master *layout* (template dasar HTML) untuk mengimplementasikan integrasi gaya Bootstrap 5.3 CDN dan kerangka utamanya (seperti Navbar).
4.  **`resources/views/welcome.blade.php`**
    *(Diubah)*: Menjadi struktur halaman depan yang membentangkan data array profil tadi ke dalam kotak *Card* bersistem pilar grid Bootstrap yang 100% *Mobile First* (responsif diuji hingga resolusi iPhone).

*(Tambahan: Konfigurasi pendamping pada folder `.antigravity/` mencakup `instructions.md`, `memory.md`, dan file `folder_map.md` ini).*
