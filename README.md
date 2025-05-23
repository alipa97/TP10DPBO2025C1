# TP10DPBO2025C1
Saya Alifa Salsabila dengan NIM 2308138 mengerjakan soal Tugas Praktikum 10 dalam mata kuliah DPBO untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin

# Deskripsi Program
Aplikasi web sederhana untuk mencatat dan mengelola Love History (riwayat cinta), Crush (daftar orang yang disukai), dan Love Status (status hubungan).
Dibangun menggunakan bahasa PHP native dengan pola arsitektur MVVM (Model-View-ViewModel) agar kode lebih terstruktur dan mudah dikembangkan.

# Struktur Database Lovers

### 1. crush_target
Menyimpan data orang yang menjadi target "crush".
- id (int, PK) — ID unik.
- name (varchar) — Nama crush.

### 2. love_status
Menyimpan daftar status hubungan cinta.
- id (int, PK) — ID unik.
- status_name (varchar) — Nama status, misal "Jadian", "Teman lv2", "PDKT".

3. love_history
Mencatat riwayat hubungan cinta seseorang dengan crush tertentu.
- id (int, PK) — ID unik.
- lover_name (varchar) — Nama orang yang punya crush.
- crush_id (int, FK) — Referensi ke crush_target.id.
- start_date (date) — Tanggal mulai ngedate.
- status_id (int, FK) — Referensi ke love_status.id.

## config/Database.php
- Koneksi database menggunakan PDO ke MySQL.
- Informasi host, username, password, dan nama database disimpan di sini.
- Digunakan oleh semua model untuk akses database.

## model/CrushTarget.php
- Model untuk tabel crush_target.
- CRUD dasar: getAll() — mengambil semua data crush, getById($id) — mengambil data crush berdasarkan id, create($name) — tambah crush baru, update($id, $name) — update nama crush, delete($id) — hapus crush berdasarkan id.

## model/LoveStatus.php
- Model untuk tabel love_status.
- CRUD dasar: getAll(), getById($id), create($status_name), update($id, $status_name), delete($id).

## model/LoveHistory.php
- Model untuk tabel love_history.
- Query mengambil data dengan join ke crush_target dan love_status untuk menampilkan nama crush dan status lengkap.
- CRUD lengkap: getAll(), getById($id), create(...), update(...), delete($id).

## viewmodel/LoveStatusViewModel.php
- Mengelola data status cinta.
- Method CRUD lengkap: getLoveStatusList(), getLoveStatusById($id), addLoveStatus($statusName), updateLoveStatus($id, $statusName), deleteLoveStatus($id)

# viewmodel/CrushViewModel.php
- Mengelola data Crush (orang yang disukai).
- Method CRUD lengkap: getCrushList(), getCrushById($id), addCrush($name), updateCrush($id, $name), deleteCrush($id).

# viewmodel/LoveHistoryViewModel.php
- Menghubungkan View dengan Model untuk data riwayat cinta.
- Method penting: getLoveHistoryList() — mendapatkan daftar riwayat cinta, getLoveHistoryById($id) — mendapatkan detail untuk edit, addLoveHistory(...) — tambah data baru, updateLoveHistory(...) — update data, deleteLoveHistory($id) — hapus data, getCrushes() — mengambil daftar crush (untuk dropdown), getLoveStatuses() — mengambil daftar status cinta (untuk dropdown).

## views/template/header.php & footer.php
-Bagian layout halaman, termasuk HTML dasar, stylesheet, dan elemen konsisten di semua halaman.

## views/love_status_form.php
- tampilan form tambah/edit status cinta

## views/love_status_list.php
- Daftar status cinta dengan tombol tambah, edit, hapus.

## views/crush_form.php
- Form tambah/edit data crush (nama crush).

## views/crush_list.php
- Menampilkan daftar crush dengan tombol tambah, edit, dan hapus.

## views/love_history_list.php
- Tampilkan tabel daftar riwayat cinta lengkap dengan opsi edit dan hapus.
- Menampilkan kolom seperti nama pemilik cinta, crush, status, dan tanggal mulai ngedate.

## views/love_history_form.php
- Form tambah dan edit riwayat cinta.
- Input: nama pemilik, pilihan crush (dropdown), tanggal mulai ngedate, pilihan status cinta (dropdown).

## index.php
- Titik masuk aplikasi yang menerima request entity dan action.
- Memanggil ViewModel sesuai entitas yang dipilih (loveHistory, crush, loveStatus).
- Mengambil data lewat ViewModel.
- Memanggil View yang sesuai untuk menampilkan UI.

# Penjelasan Alur Program (MVVM)

## 1. index.php 
Adalah router utama yang menentukan ViewModel dan View mana yang akan dipakai berdasar parameter URL entity dan action.

## 2. ViewModel
Bertugas menghubungkan View dan Model, mengolah data untuk ditampilkan dan menangani input dari View.

## 3. Model 
Bertanggung jawab untuk interaksi langsung dengan database (query, CRUD).

## 4. View
Menampilkan halaman HTML yang diisi dengan data dari ViewModel.

## 5. Jalur CRUD berjalan seperti ini:
- User request halaman (misal list data)
- index.php memilih ViewModel sesuai entity
- ViewModel ambil data dari Model
- Data dikirim ke View untuk ditampilkan
- Untuk create/update/delete, form submit ke index.php, kemudian ViewModel memanggil Model untuk mengubah data, lalu redirect.
