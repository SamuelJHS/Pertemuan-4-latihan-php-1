Web todolist

masuk form login jika gak punya akun klik "tidak punya akun?"

![image alt](https://github.com/SamuelJHS/Pertemuan-4-latihan-php-1/blob/main/Todolist/login.png)

masuk ke form registrasi

![image alt](https://github.com/SamuelJHS/Pertemuan-4-latihan-php-1/blob/main/Todolist/Registrasi.png)

mengisi username dan password untuk bisa login

![image alt](https://github.com/SamuelJHS/Pertemuan-4-latihan-php-1/blob/main/Todolist/terisi%20register.png)

jika sudah maka user baru akan ketambah

![image alt](https://github.com/SamuelJHS/Pertemuan-4-latihan-php-1/blob/main/Todolist/user%20baru.png)

nah setelah register baru bisa login disini isi username dan password yang baru dibuat

![image alt](https://github.com/SamuelJHS/Pertemuan-4-latihan-php-1/blob/main/Todolist/terisi%20login.png)

setelah login masuk ke todolist

![image alt](https://github.com/SamuelJHS/Pertemuan-4-latihan-php-1/blob/main/Todolist/todolist.png)

disini kita isi todolist nya "makan"

![image alt](https://github.com/SamuelJHS/Pertemuan-4-latihan-php-1/blob/main/Todolist/terisi%20todolist.png)

lalu ketambah "makan" pada todolist nya  

![image alt](https://github.com/SamuelJHS/Pertemuan-4-latihan-php-1/blob/main/Todolist/tambah%20todolist.png)

bisa juga isi todolist nya "Main Game" lalu ke tambah jadi dua todolist nya

![image alt](https://github.com/SamuelJHS/Pertemuan-4-latihan-php-1/blob/main/Todolist/tambah%20dua.png)

jika klik selesai pada bagian "makan" maka akan mencoret teks nya 

![image alt](https://github.com/SamuelJHS/Pertemuan-4-latihan-php-1/blob/main/Todolist/coret%20selesai.png)

jika klik hapus pada bagian makan maka akan di tanya "Yakin ingin hapus?"

![image alt](https://github.com/SamuelJHS/Pertemuan-4-latihan-php-1/blob/main/Todolist/hapus%20todolist.png)

jika yakin maka teks "makan" akan ke hapus

![image alt](https://github.com/SamuelJHS/Pertemuan-4-latihan-php-1/blob/main/Todolist/terhapus.png)

saat masuk sebagai admin

![image alt](https://github.com/SamuelJHS/Pertemuan-4-latihan-php-1/blob/main/Todolist/admin%20login.png)

maka akan masuk ke daftar todolist yang melihat tugas todolist nya

![image alt](https://github.com/SamuelJHS/Pertemuan-4-latihan-php-1/blob/main/Todolist/table_todolists.png)

jika klik ubah pada user id 2 di tugas "makan" akan memunculkan form ubah data todolist

![image alt](https://github.com/SamuelJHS/Pertemuan-4-latihan-php-1/blob/main/Todolist/ubah%20tugas.png)

jika klik hapus pada user id 3 di tugas "belajar" akan memunculkan pesan "yakin?"

![image alt](https://github.com/SamuelJHS/Pertemuan-4-latihan-php-1/blob/main/Todolist/hapus%20tugas.png)

jika yakin maka tugas "belajar" akan terhapus

![image alt](https://github.com/SamuelJHS/Pertemuan-4-latihan-php-1/blob/main/Todolist/data%20berkurang.png)

ini adalah table user dengan kode berikut

CREATE TABLE user (
    id INT(11) NOT NULL AUTO_INCREMENT,
    username VARCHAR(200) NOT NULL,
    password VARCHAR(255) NOT NULL,
    PRIMARY KEY (id)
);

![image alt](https://github.com/SamuelJHS/Pertemuan-4-latihan-php-1/blob/main/Todolist/query%20user.png)

ini adalah table todolist dengan kode berikut

CREATE TABLE todolist (
    id INT(11) NOT NULL AUTO_INCREMENT,
    user_id INT(11) NOT NULL,
    tugas VARCHAR(255) NOT NULL,
    status TINYINT(1) NOT NULL,
    PRIMARY KEY (id),
    INDEX (user_id)
);

![image alt](https://github.com/SamuelJHS/Pertemuan-4-latihan-php-1/blob/main/Todolist/query%20todolist.png)
