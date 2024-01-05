<h1>Role & Permission Using Spatie Package also JWT api token generated package.</h1>
<hr>
<h3>Spatie Role Permission Working Process:</h3>
<ul>
    <li> composer require spatie/laravel-permission</li>
    <li> add this on provider from app.php providers' => [
    Spatie\Permission\PermissionServiceProvider::class ]</li>
    <li>run this php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"</li>
    <li>run this php artisan config:clear</li>
    <li>run this  php artisan migrate</li>
    <li>Add this on User or Admin Model use Spatie\Permission\Traits\HasRoles;</li>
    <li>use HasRole</li>
    <li>Check UserSeeder or AdminSeeder code</li>
    <li>Check RolePermission Seeder code</li>
    <li>Check PostController to see how to control access through middleware</li>
</ul>

