<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('index');
});

Route::get('/home', function()
{
    return View::make('_master');
});



Route::get('/get-environment',function() {

    echo "Environment: ".App::environment();

});

Route::get('mysql-test', function() {

    # Print environment
    echo 'Environment: '.App::environment().'<br>';

    # Use the DB component to select all the databases
    $results = DB::select('SHOW DATABASES;');

    # If the "Pre" package is not installed, you should output using print_r instead
    #echo Pre::render($results);
	echo print_r($results);
});

// Route::get('/debug', function() {

//     echo '<pre>';

//     echo '<h1>environment.php</h1>';
//     $path   = base_path().'/environment.php';

//     try {
//         $contents = 'Contents: '.File::getRequire($path);
//         $exists = 'Yes';
//     }
//     catch (Exception $e) {
//         $exists = 'No. Defaulting to `production`';
//         $contents = '';
//     }

//     echo "Checking for: ".$path.'<br>';
//     echo 'Exists: '.$exists.'<br>';
//     echo $contents;
//     echo '<br>';

//     echo '<h1>Environment</h1>';
//     echo App::environment().'</h1>';

//     echo '<h1>Debugging?</h1>';
//     if(Config::get('app.debug')) echo "Yes"; else echo "No";

//     echo '<h1>Database Config</h1>';
//     print_r(Config::get('database.connections.mysql'));

//     echo '<h1>Test Database Connection</h1>';
//     try {
//         $results = DB::select('SHOW DATABASES;');
//         echo '<strong style="background-color:green; padding:5px;">Connection confirmed</strong>';
//         echo "<br><br>Your Databases:<br><br>";
//         print_r($results);
//     } 
//     catch (Exception $e) {
//         echo '<strong style="background-color:crimson; padding:5px;">Caught exception: ', $e->getMessage(), "</strong>\n";
//     }

//     echo '</pre>';

// });

Route::get('/practice', function() {

    $fruit = Array('Apples', 'Oranges', 'Pears');

    echo Pre::render($fruit,'Fruit');

});

// CRUD
//Create
Route::get('/creating', function() {

    # Instantiate a new blog model class
    $blog = new Blog();

    # Set 
    $blog->title = 'There is something about Mary';
    $blog->blogger = 'XYZ';
    $blog->published = 2014;
    $blog->text = 'asdfadfadfadf adfadfadfadf asdffadfaddff ';
    $blog->category = 'Car';

    # This is where the Eloquent ORM magic happens
    $blog->save();

    return 'A new blog post has been made!';

});

Route::get('/edit/{id}',function($id) { 
 
        try { 
 
            $bloggers = Blogger::getIdNamePair(); 
 
            $blog    = Blog::with('blogger')->findOrFail($id); 
 
            # Get all the tags (not just the ones associated with this book) 
        } 
        catch(exception $e) { 
            return Redirect::to('/adding')->with('flash_message', 'Blog not found'); 
        } 
 
        return View::make('edit_blog')
        ->with('blog', $blog) 
            ->with('bloggers', $bloggers)             ;
    
    } );

//updating
Route::post('/updating', array('before'=>'cfrs',
    function()
 {

 // var_dump ($_POST);  
         $blog = new Blog();       
    # Set 
    $blog->title = $_POST['title'];
     $blog->blogger_id = $_POST['blogger_id'];
     $blog->published = $_POST['published'];
     $blog->text = $_POST['text'];;
    // $blog->category = 'Car';

    # This is where the Eloquent ORM magic happens
     $blog->save();
   
 try { 
        $blogd =Blog::where('id', 'LIKE', 'id')->first();

         } 
         catch(exception $e) { 
             return Redirect::to('/adding')->with('flash_message', 'Blog not found'); 
         } 
        Blog::destroy(Input::get('id'));
             return Redirect::to('/adding')->with('flash_message','Blog changes have been saved.'); 

}));


Route::post('/blog/delete', array('before'=>'cfrs',
    function()
 {

    try { 
        $blogd =Blog::where('id', 'LIKE', 'id')->first();

        } 
         catch(exception $e) { 
             return Redirect::to('/adding')->with('flash_message', 'Blog not found'); 
         } 
        Blog::destroy(Input::get('id'));
             return Redirect::to('/adding')->with('flash_message','Blog changes have been deleted.'); 

}));



// app/routes.php

Route::get('/seedblogger', function()
{
    $blogger = new Blogger();
    
    $blogger->id = 8;
        $blogger->name = 'Mary Thomas';
    $blogger->age = 47;
    $blogger->gender = 1;

    $blogger->save();

        $blogger->id = 9;
        $blogger->name = 'Jeo Kellahar';
    $blogger->age = 27;
    $blogger->gender = 0;

    $blogger->save();

        $blogger->id = 11;
        $blogger->name = 'Andrew Sollovan';
    $blogger->age = 35;
    $blogger->gender = 0;

    $blogger->save();

        $blogger->id = 12;
        $blogger->name = 'Sm Tamjid';
    $blogger->age = 35;
    $blogger->gender = 10;

    $blogger->save();

     return "Bloggers are added for testing";
   
});


Route::get('/add', function()
{
    return View::make('add_blog');
});


Route::post('/add', function() {

    # Instantiate a new blog model class
    $blog = new Blog();

     var_damp ($_POST);
    # Set 
   // $blog->title = $_POST;
    // $blog->blogger = 'XYZ';
    // $blog->published = 2014;
    // $blog->text = 'asdfadfadfadf adfadfadfadf asdffadfaddff ';
    // $blog->category = 'Car';

    # This is where the Eloquent ORM magic happens
    // $blog->save();

    return 'A new blog post has been made!';
});

Route::get('/allBlogs', function()
{

    return View::make('blog_index');
});

// reading
Route::get('/allBlogs', function() {
            $format = Input::get('format', 'html');
            $query  = Input::get('query');
            $blogs = Blog::search($query);
                $bloggers = Blogger::getIdNamePair(); 

        return View::make('blog_index') 
                ->with('blogs', $blogs)
                ->with('query', $query)
                ->with('bloggers', $bloggers);            
            
  
});

Route::get('/adding', function()
{
    $bloggers = Blogger::getIdNamePair(); 
  
        return View::make('add') 
            ->with('bloggers',$bloggers); 
            

});


Route::post('/adding', array('before'=>'cfrs',
    function() {

    # Instantiate a new blog model class


     // var_dump ($_POST);  
         $blog = new Blog();       
    # Set 
    $blog->title = $_POST['title'];
     $blog->blogger_id = $_POST['blogger_id'];
     $blog->published = $_POST['published'];
     $blog->text = $_POST['text'];;
    // $blog->category = 'Car';

    # This is where the Eloquent ORM magic happens
     $blog->save();

    return Redirect::to('/adding')->with('flash_message', 'Your blog is added successfully!');
}));

//// signup get and post
Route::get('/signup',
    array(
        'before' => 'guest',
        function() {
            return View::make('user_signup');
        }
    )
);

//signup post
Route::post('/signup', 
    array(
        'before' => 'csrf', 
        function() {

            $user = new User;
            $user->email    = Input::get('email');
            $user->password = Hash::make(Input::get('password'));

            # Try to add the user 
            try {
                $user->save();
            }
            # Fail
            catch (Exception $e) {
                return Redirect::to('/signup')->with('flash_message', 'Sorry try again!')->withInput();
            }

            # Log the user in
            Auth::login($user);

            return Redirect::to('/')->with('flash_message', 'Welcome to Donotrepeat.com!');

        }
    )
);

/// loging in routes
Route::get('/login',
    array(
        'before' => 'guest',
        function() {
            return View::make('user_login');
        }
    )
);

Route::post('/login', 
    array(
        'before' => 'csrf', 
        function() {

            $credentials = Input::only('email', 'password');

            if (Auth::attempt($credentials, $remember = true)) {
                return Redirect::intended('/')->with('flash_message', 'Thanks, for coming back!');
            }
            else {
                return Redirect::to('/login')->with('flash_message', 'Opps! Try again.');
            }

            return Redirect::to('login');
        }
    )
);

Route::get('/logout', function() {

    # Log out
    Auth::logout();

   # Send them to the homepage
return Redirect::to('/')->with('flash_message', 'Bye Bye!');;
    });
