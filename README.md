<p align="center">
    <a href="https://laravel.com" target="_blank">
        <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
    </a>
</p>
<p align="center">

</p>

> [!info] 
> La información que esta contenida dentro de `comillas`, se inserta individualmente, linea por linea.

## ⚙️ Dependencias

composer
node
npm install

npm install --global yarn

yarn install

## 🗄️ DataBase

php artisan migrate


### 🧑🏻‍💻 Usuarios

php artisan tinker

`
use Illuminate\Support\Facades\Hash;
`

`
use App\Models\User;
`

`
User::create(['name' => 'Admin','email' => 'root@gmail.com','password' => Hash::make('admin'),]);
`

## 💾 Rutas - Guardar imagenes/icon en la DB

php artisan storage:link


## 🪄 Run - En consolas diferentes

`
npm run dev
`

`
php artisan serve
`

🎉🪄🔑⚙️🔎📦🧰💾🗃️🧑🏻‍💻🗄️

