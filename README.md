<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">

</p>

## 🌱 Seeds

Ejecutar los seeds siguientes:

### 📌 Servicios
```bash
   php artisan db:seed --class=HospitalServiceSeeder
```

### 👤 Usuarios
```bash
   php artisan tinker
```
```php
use Illuminate\Support\Facades\Hash;
use App\Models\User;
User::create(['name' => 'Admin','email' => 'admin@***.com','password' => Hash::make('***'),]);
```


