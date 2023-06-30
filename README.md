<h1 align="center">Codeigniter 3.1.13 - Template</h1>
<p align="center">Repository ini merupakan template dari framework Codeigniter versi 3.1.13, template ini mempunyai fitur seperti authentication (masuk dan daftar), role user, menu dan submenu management</p>

<img src="https://github.com/armandwipangestu/ci-3-template/assets/64394320/ad797866-502e-42cd-b6b2-944815039eb8" alt="Codeigniter 3.1.13 - Template">

# Daftar Isi

-   [Teknologi Yang Digunakan](#teknologi-yang-digunakan)
-   [Dependency](#dependency)
-   [Cara Install](#cara-install)
-   [Fitur](#fitur)
    -   [Authentication (Masuk atau Daftar akun)](#authentication-masuk-atau-daftar-akun)
    -   [Role User](#role-user)
    -   [Menu dan Submenu Management](#menu-dan-submenu-management)

## Teknologi Yang Digunakan

Template ini dibuat menggunakan beberapa teknologi, diantaranya adalah:

> **Catatan**:
>
> -   `Codeigniter` disini berfungsi sebagai framework backend
>
> -   `Stisla` berfungsi sebagai template dari framework frontend yaitu `Bootstrap`

-   [Codeigniter Versi 3.1.13](https://codeigniter.com/userguide3/installation/downloads.html)
-   [Stisla Versi 2.2.0](https://github.com/stisla/stisla/releases/tag/v2.2.0)
-   [Bootstrap Versi 4.2.1](https://blog.getbootstrap.com/2018/12/21/bootstrap-4-2-1/)
-   [jQuery Versi 3.3.1](https://blog.jquery.com/2018/01/20/jquery-3-3-1-fixed-dependencies-in-release-tag/)
-   [Datatables Versi 1.13.4](https://cdn.datatables.net/1.13.4/)
-   [Sweetalert Versi 11.7.12](https://github.com/sweetalert2/sweetalert2/releases/tag/v11.7.12)
-   [PHP Dotenv for Codeigniter](https://github.com/agungjk/phpdotenv-for-codeigniter)

## Dependency

> **Catatan**:
>
> -   `Yarn` disini berfungsi sebagai package manager untuk mendownload dependency dari template `Stisla`.
>
> -   Untuk PHP, MySQL dan Apache bisa di install dengan bundle seperti `XAMPP` / `MAMP` / `LAMP`
>
> -   `Git` berfungsi untuk melakukan clone atau mendownload repository ini

-   [Yarn](https://yarnpkg.com/)
-   [PHP 5 ~ 8.0](https://www.php.net/releases/8.0/en.php)
-   [MySQL 5.1+](https://downloads.mysql.com/archives/community/)
-   [Apache](https://httpd.apache.org/)
-   [Git](https://git-scm.com/downloads)

## Cara Install

<details open>
<summary><strong>Clone atau Download Repository ini</strong></summary>

```
git clone https://github.com/armandwipangestu/ci-3-template.git
```

</details>

<details>
<summary><strong>Copy .env.example menjadi .env.development</strong></summary>

-   Masuk atau pindah ke directory `ci-3-template`

```
cd ci-3-template
```

-   Copy file `.env.example` menjadi `.env.development`

```
cp .env.example .env.development
```

-   Menambahkan informasi mengenai database di file `.env.development`

```
DB_HOSTNAME=localhost
DB_USERNAME=root
DB_PASSWORD=
DB_NAME=template
APP_NAME="Nama Aplikasi"
```

</details>

<details>
<summary><strong>Install dependency template stisla</strong></summary>

-   Masuk atau pindah ke directory `template/stisla`

```
cd template/stisla
```

-   Install Dependency

```
yarn
```

-   Membuat folder `pages/`

```
yarn dist
```

</details>

<details>
<summary><strong>Membuat database</strong></summary>

-   Membuat Database baru

![image](https://github.com/armandwipangestu/ci-3-template/assets/64394320/f0012304-6953-44eb-984d-08a0d7075fc7)

-   Import database dari template repository ini ke dalam phpmyadmin

> **Catatan**:
> File sql nya berada di lokasi `ci-3-template/database/template.sql`

![image](https://github.com/armandwipangestu/ci-3-template/assets/64394320/0f4713df-0ad6-4aa2-8b1c-f1b0365886fb)

<br />

![image](https://github.com/armandwipangestu/ci-3-template/assets/64394320/7d93ef50-7494-4f71-a002-a9702c38d56c)

<br />

![image](https://github.com/armandwipangestu/ci-3-template/assets/64394320/50043ffe-2246-48ea-bd90-0ef391e8a611)

</details>

<details>
<summary><strong>Menjalankan Aplikasi</strong></summary>

Jalankan service Apache (Web Server) dan MySQL (Database) kemudian buka url pada browser
dengan alamat nya adalah `localhost/ci-3-template`

![image](https://github.com/armandwipangestu/ci-3-template/assets/64394320/5b77ff93-a51c-4530-9e1e-67430b804d63)

Untuk login kalian bisa menggunakan akun berikut ini:

-   Role Admin

![image](https://github.com/armandwipangestu/ci-3-template/assets/64394320/96fae3f4-f9db-4c27-a89b-af05b82e0843)

```
Email: admin@admin.com
Passowrd: 123
```

-   Role User

![image](https://github.com/armandwipangestu/ci-3-template/assets/64394320/e8956061-7d20-422b-a216-782ed4de94bb)

```
Email: user@user.com
Passowrd: 123
```

atau kalian juga bisa melakukan registrasi atau daftar untuk akun sendiri

</details>

## Fitur

### Authentication (Masuk atau Daftar akun)

-   Daftar

https://github.com/armandwipangestu/ci-3-template/assets/64394320/1ae60ea8-903a-4978-884e-7e442faf7ed2

-   Masuk

https://github.com/armandwipangestu/ci-3-template/assets/64394320/0fbaef13-0222-421f-a1b1-43d7f38f5754

### Role User

Pada template ini, memiliki fitur role user. Untuk default atau bawaan terdapat 2 role user, yaitu `Administrator` dan `Member`

![image](https://github.com/armandwipangestu/ci-3-template/assets/64394320/de6f6d5f-990a-4a02-86de-e0d44d07dba3)

### Menu dan Submenu Management

Untuk membuat, mengubah, meghapus `Menu` dan `Submenu` pada template ini sudah disediakan fitur untuk me-manage hal tersebut.

Sehingga sudah tidak usah lagi menyentuh kode untuk menambahkan menu atau submenu pada sidebar

| Menu Management                                                                                                  | Submenu Management                                                                                               |
| ---------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------- |
| ![image](https://github.com/armandwipangestu/ci-3-template/assets/64394320/9bbf105f-9466-456f-92a2-7d116d399a70) | ![image](https://github.com/armandwipangestu/ci-3-template/assets/64394320/f1908be1-c64f-4a03-96bb-b7c1d00c9466) |
