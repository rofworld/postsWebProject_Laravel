<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use App\User;

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
    return view('register');
});

Route::get('/register', function () {
    return view('register');
});


Route::post('/registration', function()
{
        $data=Input::all();
        
        // Build the validation constraint set.
        $rules = array(
            'username'   => 'required|min:5|max:15',
            'email'      => 'required|email',
            'password'   => 'required|alpha_num|confirmed|min:8'
        );
        
        // Create a new validator instance.
        $validator = Validator::make($data, $rules);
        
        if ($validator->passes()) {
            // Normally we would do something with the data.
            $user = new App\User();
            $user->password = Input::get('password');
            $user->email = Input::get('email');
            $user->name = Input::get('username');
            $user->save();
            
            return Redirect::to('signin')->with('status',"User ".$user->name." successfully created!");
        }
        
        return Redirect::to('register')->withErrors($validator);
        
});


Route::get('/signin', function () {
    return view('signin');
});
    


Route::post('/login', function()
{
    $data=Input::all();
    
    // Build the validation constraint set.
    $rules = array(
        'username'   => 'required',
        'password'   => 'required'
    );
    
    // Create a new validator instance.
    $validator = Validator::make($data, $rules);
    
    if ($validator->passes()) {
        // Normally we would do something with the data.
        
        $username = Input::get('username');
        $password = Input::get('password');
        $attempt = Auth::attempt(
            array('name' => $username, 'password' => $password)      
            );
        
        if(! $attempt)
        {
            $validator->errors()->add('error', 'The user or password are incorrect');
            
        }else{
            
            return Redirect::to('home');
        }
        
        
    }
    
    return Redirect::to('signin')->withErrors($validator);

});

Route::get('/signout', function () {
    Auth::logout();
    return Redirect::to('signin');
});


Route::get('/home', function () {
    if (Auth::check()){
        return view('home');
    }else{
        return view('signin');
    }
});

Route::get('/upload', function () {
    if (Auth::check()){
        return view('upload');
    }else{
        return view('signin');
    }
});

Route::get('/bestVideos','VideosController@getBestVideos');

Route::get('/trending','VideosController@getVideos');

Route::post('/insertVideoRate','VideosController@insertVideoRate');

Route::post('/insertVideo','VideosController@insertVideo');

Route::any('/searchTrending','VideosController@searchTrending');

Route::any('/searchTop','VideosController@searchTop');


        