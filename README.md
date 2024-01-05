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
<hr>
<h3>JWT api Authentication in laravel. package: tymon/jwt-auth:</h3>
<hr>
<h3>JWT api Auth Working Process:</h3>
<ul>
    <li>composer require tymon/jwt-auth</li>
    <li>Add this on provider array  "Tymon\JWTAuth\Providers\LaravelServiceProvider::class"</li>
    <li>run this php artisan vendor:publish --provider="Tymon\JWTAuth\Providers\LaravelServiceProvider"</li>
    <li>run this php artisan jwt:secret</li>
    <li>use this on User or Admin model "use Tymon\JWTAuth\Contracts\JWTSubject;" also implement this "implements JWTSubject"</li>
    <li>Add below code to Admin Model or User Model</li>
    
    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
</ul>
<ul>
    <li>Add below code to auth.php</li>

    'defaults' => [
    'guard' => 'api',
    'passwords' => 'users',
    ],
    ...

    'guards' => [
    'api' => [
    'driver' => 'jwt',
    'provider' => 'users',
    ],
    ],
</ul>
<ul>
    <li>Demo Route Code</li>
    
    Route::group([

    'middleware' => 'api',
    'namespace' => 'App\Http\Controllers',
    'prefix' => 'auth'], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});
</ul>

<ul>
    <li>Demo Controller Code</li>
    <li><a href="https://jwt-auth.readthedocs.io/en/docs/quick-start/">Demo Controller Code link</a></li>
    <li>Make API request through Postman</li>
</ul>


