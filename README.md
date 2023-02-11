# Screenshots
<p align="center">
  <img alt="Light" src="https://i.postimg.cc/HLjcWFM4/Snipaste-2022-12-26-13-47-15.png" width="45%">&nbsp;
  <img alt="Dark" src="https://i.postimg.cc/X7QYZQ42/Snipaste-2022-12-26-13-47-21.png" width="45%">
  <img alt="Login" src="https://i.postimg.cc/8zcXDPZy/Snipaste-2022-12-26-13-58-34.png" width="45%">&nbsp;
  <img alt="Register" src="https://i.postimg.cc/wMbJkHDv/Snipaste-2022-12-26-13-59-48.png" width="45%">
  <img alt="Dashboard" src="https://i.postimg.cc/XJqYk5Lf/Snipaste-2022-12-26-14-01-12.png" width="45%">&nbsp;
  <img alt="User" src="https://i.postimg.cc/wj9ys7CV/Snipaste-2022-12-26-14-01-58.png" width="45%">
  <img alt="User" src="https://i.postimg.cc/DwWZGLC1/Snipaste-2022-12-26-14-10-29.png" width="45%">&nbsp;
  <img alt="Permission" src="https://i.postimg.cc/QC6PkB6T/Snipaste-2022-12-26-14-04-01.png" width="45%">
  <img alt="Modal Form" src="https://i.postimg.cc/vmcWc4nK/Snipaste-2022-12-26-14-08-50.png" width="45%">&nbsp;
  <img alt="Modal Confirm" src="https://i.postimg.cc/7L3q1VSJ/Snipaste-2022-12-26-14-11-02.png" width="45%">
  <img alt="Toast Notification Success" src="https://i.postimg.cc/pXF4ndfp/Snipaste-2022-12-26-14-11-53.png" width="45%">&nbsp;
  <img alt="Toast Notification Error" src="https://i.postimg.cc/TPp4fY3d/Snipaste-2022-12-26-14-13-50.png" width="45%">
</p>

# Features
- Role Based Access Control
- Responsive Design
- Modal Form
- Bulk Action
- Light/Dark Mode
- Toast Notification
- Rich Feature Datatable Serverside
- Tooltip
- Localization (EN/ID)
- SSR (Server Side Rendering)
# Requirements
- Php 8
- Composer
- Mysql
- Apache
# Installation
``` bash
git clone https://github.com/erikwibowo/Laravel-Brive.git
cd Laravel-Brive
composer update
npm install
cp .env.example .env
php artisan key:generate

SETTING UP DB CONNECTION IN .env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=brive
DB_USERNAME=root
DB_PASSWORD=

php artisan migrate:fresh --seed

START THE SERVER
npm run dev
php artisan serve
```
## Login With
### Superadmin
``` bash
email : superadmin@superadmin.com
password : superadmin
```
### Admin
``` bash
email : admin@admin.com
password : admin
```
### Operator
``` bash
email : operator@operator.com
password : operator
```
# Packages
- [Vue](https://vuejs.org/)
- [Inertia](https://inertiajs.com/)
- [Tailwind](https://tailwindcss.com/)
- [Spatie](https://spatie.be/docs/laravel-permission/v5/introduction)
- [Floating Vue](https://floating-vue.starpad.dev/)
- [VueUse](https://vueuse.org/)
- [Hero Icons](https://heroicons.com/)
- [HeadlessUI](https://headlessui.com/)
# Build With
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>