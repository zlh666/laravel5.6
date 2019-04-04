<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin'], function () {
    Route::get('login', 'Admin\LoginController@showLoginForm');
    Route::post('login', 'Admin\LoginController@login');
    Route::post('logout', 'Admin\LoginController@logout');

    Route::get('/', 'Admin\HomeController@index');
});

Route::get('fac', 'TestFactoryController@fac');
Route::get('main', 'TestSingleController@main');
Route::get('proto', 'PrototypePatternDemoController@main');
/*
 * 数据操作3种方式
 */
Route::get('test','TestController@test');
Route::get('logo','TestController@create_logo');
Route::get('shop','TestController@create_shop');
Route::get('card','TestController@create_card');
Route::get('code','TestController@create_card_code');
Route::get('token','TestController@update_access_token');
Route::get('add','TestController@add_code_to_user');
/*
 * github login
 */
Route::get('login/github', 'Auth\LoginController@redirectToProvider');
Route::get('login/github/callback', 'Auth\LoginController@handleProviderCallback');

/*
 * passport api 认证
 */

Route::get('/redirect', function () {
    $query = http_build_query([
        'client_id' => '5',
        'redirect_uri' => 'http://laravel5.6.com/auth/callback',
        'response_type' => 'code',
        'scope' => '',
    ]);

    return redirect('http://laravel5.6.com/oauth/authorize?' . $query);
});
Route::get('/auth/callback', function (Illuminate\Http\Request $request) {
    $http = new GuzzleHttp\Client;

    $response = $http->post('http://laravel5.6.com/oauth/token', [
        'form_params' => [
            'grant_type' => 'authorization_code',
            'client_id' => '5',  // your client id
            'client_secret' => 'V556rLZ3g4tUXxfdANn3YA46XF8Z4oZercpeXH7k',   // your client secret
            'redirect_uri' => 'http://laravel5.6.com/auth/callback',
            'code' => $request->code,
        ],
    ]);
    //return access_token
    return json_decode((string) $response->getBody(), true);
});

/*
 * 引入类三种方式测试
 */
class Baz
{
}

class Bar
{
    public $baz;

    public function __construct(Baz $baz)
    {
        $this->baz = $baz;
    }
}

Route::get('bar', function (Bar $bar) {
    dd($bar->baz);
});

Route::get('eat', function (App\Rice $rice) {
//    dd(\App\RiceFacade::food());
//    return Rice::food();
        dd(rice()->food());
});

/*
 * single
 */
Route::get('single','SingleController@test');

