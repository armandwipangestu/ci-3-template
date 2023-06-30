<h1 align="center">Codeigniter 3.1.13 - Template</h1>
<p align="center">Repository ini merupakan template dari framework Codeigniter versi 3.1.13, template ini mempunyai fitur seperti authentication (masuk dan daftar), role user, menu dan submenu management</p>

<img src="" alt="Codeigniter 3.1.13 - Template">

# Daftar Isi

-   [Teknologi Yang Digunakan](#teknologi-yang-digunakan)
-   [Dependency](#dependency)
-   [Cara Install](#cara-install)
-   [Fitur](#fitur)

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

<details>
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

-   import database dari template repository ini ke dalam phpmyadmin

> **Catatan**:
> File sql nya berada di lokasi `ci-3-template/database/template.sql`

</details>

<details>
<summary><strong>Menjalankan Aplikasi</strong></summary>

Jalankan service Apache (Web Server) dan MySQL (Database) kemudian buka url pada browser
dengan alamat nya adalah `localhost/ci-3-template`

</details>
