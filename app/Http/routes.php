<?php
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;
use App\Post;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('index');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/admin',function(){

    return view('admin.index');
});


Route::group(['middleware'=>'admin'], function(){
    Route::resource('admin/users','AdminUsersController');
    Route::resource('admin/posts','AdminPostsController');
    Route::resource('admin/category','AdminCategoriesController');
    Route::resource('admin/media','AdminMediaController');
    Route::resource('admin/profile','AdminProfileController');
    Route::resource('admin/show','AdminCommentController');
    Route::resource('/admin/mail','ContactUsController');
    Route::resource('/admin/service','ServiceController');
    Route::resource('/admin/portfolio','PortfolioController');
   
});


Route::resource('/profile','ProfileController');
Route::post('/posts/{post}/{user}/comments','AdminCommentController@store');

Route::get('contact_us', 'ContactUsController@getContact');
Route::post('contact_us', 'ContactUsController@saveContact');

Route::resource('/','PageController@index');
Route::resource('/blog-single','PageController');





// rout for Author

Route::group(['middleware' => 'author'], function () {
    
    Route::resource('author/posts','AuthorPostsController');
    
});

// route for Subscriber

Route::group(['middleware' => 'subscriber'], function () {
    //
    Route::resource('subscriber/posts','SubscriberController');
    //Route::resource('subscriber/message','SubscriberMessagesController');
    
});

//Route::get('/sendmail/{id}','ExcelController@sendEmail');
//Route::get('/', function () {
   // return view('welcome');

   //$data= [
   //'title'=>'When are you coming back',
   //'content'=>'this laraval couse is craeted with a lot of decacation'
  // ];

   // Mail::send('mail.test',$data, function($message){


         //  $message->to('yaliyu003@gmail.com','Yusuf')->subject('Hello student hope your doing well');
   
  //  });


//});

Route::get ( '/searchResult', function () {
    return view ( '/searchResult' );
} );
Route::any ( '/searchResult', function () {
    $q = Input::get ( 'q' );
    $post = Post::where ( 'title', 'LIKE', '%' . $q . '%' )->orWhere ( 'body', 'LIKE', '%' . $q . '%' )->get ();
    if (count ( $post ) > 0)
        return view ( 'searchResult' )->withDetails ( $post )->withQuery ( $q );
    else
        return view ( 'searchResult' )->withMessage ( 'No Details found. Try to search again !' );
} );
