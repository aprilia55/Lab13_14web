# 📘 Laporan Praktikum Pemrograman Web

## Praktikum 13 & 14

**Topik:** Pencarian Data (Search) dan Pagination pada Aplikasi Web PHP

---

## 👤 Identitas Mahasiswa

* **Nama:** Alfarizki Aprilia Putri
* **NIM:** 312410455
* **Kelas:** TI.24.A5
* **Mata Kuliah:** Pemrograman Web

---

## 🧾 Deskripsi Praktikum

Praktikum ini merupakan penggabungan dari **Praktikum 13 (Pagination)** dan **Praktikum 14 (Pencarian Data)**. Pada praktikum ini dilakukan pengembangan fitur pencarian data dan pagination pada aplikasi web berbasis PHP dan MySQL. Fitur pagination digunakan untuk membatasi jumlah data yang ditampilkan dalam satu halaman, sedangkan fitur pencarian digunakan untuk mempermudah pengguna dalam mencari data barang berdasarkan nama.

---

## 🎯 Tujuan Praktikum

1. Memahami konsep pagination menggunakan LIMIT dan OFFSET pada query MySQL.
2. Mengimplementasikan pagination pada aplikasi web.
3. Membuat fitur pencarian data menggunakan klausa WHERE dan LIKE.
4. Mengintegrasikan fitur pencarian dengan pagination.
5. Menampilkan data secara terstruktur dan user friendly.

---

## 🗂️ Struktur Folder Project

```
project/
├── assets/
│   └── style.css
├── class/
│   └── database.php
├── module/
│   └── artikel/
│       ├── list.php
│       ├── add.php
│       ├── edit.php
│       └── delete.php
├── template/
│   ├── header.php
│   └── footer.php
├── index.php
└── database.sql
```

---

## ⚙️ Praktikum 13 – Pagination

Pagination digunakan untuk membatasi jumlah data yang ditampilkan pada halaman web. Pada praktikum ini, pagination dibuat dengan memanfaatkan query **LIMIT** dan **OFFSET** pada MySQL.

### Langkah-langkah:

1. Menentukan jumlah data per halaman.
2. Menghitung total data menggunakan query `COUNT(*)`.
3. Menghitung jumlah halaman.
4. Menampilkan data sesuai halaman aktif menggunakan LIMIT dan OFFSET.
5. Membuat navigasi halaman (Previous, Next, dan nomor halaman).

### Contoh Query Pagination:

```sql
SELECT * FROM data_barang LIMIT 5 OFFSET 0;
```

---

## 🔍 Praktikum 14 – Pencarian Data

Pencarian data dilakukan dengan menambahkan klausa **WHERE** pada query untuk memfilter data berdasarkan input pengguna.

### Langkah-langkah:

1. Membuat form pencarian menggunakan metode GET.
2. Mengambil keyword pencarian dari input user.
3. Menambahkan filter pencarian pada query SQL.
4. Menggunakan klausa LIKE agar pencarian bersifat fleksibel.

### Contoh Query Pencarian:

```sql
SELECT * FROM data_barang WHERE nama LIKE '%keyword%';
```

---

## 🔗 Integrasi Search & Pagination

Pada project ini, fitur pencarian dan pagination digabungkan sehingga hasil pencarian tetap dapat dibagi ke dalam beberapa halaman. Parameter pencarian tetap dikirimkan saat berpindah halaman.

---

## 🖼️ Screenshot Hasil Program

> Tambahkan screenshot hasil program pada folder `screenshots/`

* Halaman Data Barang
  ![Data Barang](screenshots/data-barang.png)

* Fitur Pencarian Data
  ![Search](screenshots/search.png)

* Pagination
  ![Pagination](screenshots/pagination.png)

---

## ✅ Hasil yang Dicapai

* Pagination berjalan sesuai jumlah data.
* Pencarian data berdasarkan nama barang berfungsi dengan baik.
* Tampilan data lebih rapi dan terstruktur.
* Aplikasi berjalan tanpa error.

---

## 📝 Kesimpulan

Berdasarkan hasil Praktikum 13 dan 14, dapat disimpulkan bahwa penggunaan pagination dan fitur pencarian sangat membantu dalam pengelolaan data dalam jumlah besar. Pagination membuat tampilan data lebih terstruktur, sedangkan fitur pencarian mempermudah pengguna dalam menemukan data yang diinginkan secara cepat dan efisien.

---
