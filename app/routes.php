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
	return View::make('hello');
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

Route::get('/debug', function() {

    echo '<pre>';

    echo '<h1>environment.php</h1>';
    $path   = base_path().'/environment.php';

    try {
        $contents = 'Contents: '.File::getRequire($path);
        $exists = 'Yes';
    }
    catch (Exception $e) {
        $exists = 'No. Defaulting to `production`';
        $contents = '';
    }

    echo "Checking for: ".$path.'<br>';
    echo 'Exists: '.$exists.'<br>';
    echo $contents;
    echo '<br>';

    echo '<h1>Environment</h1>';
    echo App::environment().'</h1>';

    echo '<h1>Debugging?</h1>';
    if(Config::get('app.debug')) echo "Yes"; else echo "No";

    echo '<h1>Database Config</h1>';
    print_r(Config::get('database.connections.mysql'));

    echo '<h1>Test Database Connection</h1>';
    try {
        $results = DB::select('SHOW DATABASES;');
        echo '<strong style="background-color:green; padding:5px;">Connection confirmed</strong>';
        echo "<br><br>Your Databases:<br><br>";
        print_r($results);
    } 
    catch (Exception $e) {
        echo '<strong style="background-color:crimson; padding:5px;">Caught exception: ', $e->getMessage(), "</strong>\n";
    }

    echo '</pre>';

});

Route::get('/practice', function() {

    $fruit = Array('Apples', 'Oranges', 'Pears');

    echo Pre::render($fruit,'Fruit');

});

// CRUD
//Create
Route::get('/creating', function() {

    # Instantiate a new Book model class
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



//updating
Route::get('/updating', function() {

    # First get a book to update
    $blog = Blog::where('blogger', 'LIKE', '%aaa%')->first();

    # If we found the book, update it
    if($blog) {

        # Give it a different title
        $blog->title = 'Nothing about Mary';

        # Save the changes
        $blog->save();

        return "Update complete";
    }
    else {
        return "Blog not found, can't update.";
    }

});


//deleting
Route::get('/deleting', function() {

    $blog =Blog::where('blogger', 'LIKE', '%ABC%')->first();

    if($blog) {

        # Goodbye!
        $blog->delete();

        return "Deletion complete;";

    }
    else {
        return "Can't delete ";
    }

});


// app/routes.php

Route::get('/seed', function()
{
    $blog = new Blog();
        $blog->title = 'There is something about Mary';
    $blog->blogger = 'aaa';
    $blog->published = 1999;
    $blog->text = 'asdfadfadfadf adfadfadfadf asdffadfaddff ';
    $blog->category = 'Car';
    $blog->save();
$blog = new Blog();
            $blog->title = 'There is something about Mary';
    $blog->blogger = 'bbb';
    $blog->published = 1900;
    $blog->text = 'asdfadfadfadf adfadfadfadf asdffadfaddff ';
    $blog->category = 'Car';
    $blog->save();
$blog = new Blog();
            $blog->title = 'There is something about Mary';
    $blog->blogger = 'ccc';
    $blog->published = 2011;
    $blog->text = 'asdfadfadfadf adfadfadfadf asdffadfaddff ';
    $blog->category = 'Car';
    $blog->save();

$blog = new Blog();
            $blog->title = 'There is something about Mary';
    $blog->blogger = 'ddd';
    $blog->published = 2000;
    $blog->text = 'asdfadfadfadf adfadfadfadf asdffadfaddff ';
    $blog->category = 'Car';
    $blog->save();

     return "Test daata are inserted complete";
   
});


Route::get('/add', function()
{
    return View::make('add_blog');
});


Route::post('/add', function() {

    # Instantiate a new Book model class
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
return View::make('blog_index') 
                ->with('blogs', $blogs)
                ->with('query', $query);            
  
});

Route::get('/adding', function()
{
    $bloggers = Blogger::getIdNamePair(); 
  
        return View::make('add') 
            ->with('bloggers',$bloggers); 
            

});


Route::post('/adding', array('before'=>'cfrs',
    function() {

    # Instantiate a new Book model class


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

    return Redirect::to('/adding');
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
                return Redirect::to('/signup')->with('flash_message', 'Sign up failed; please try again.')->withInput();
            }

            # Log the user in
            Auth::login($user);

            return Redirect::to('/allBlogs')->with('flash_message', 'Welcome to Foobooks!');

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
                return Redirect::intended('/adding')->with('flash_message', 'Welcome Back!');
            }
            else {
                return Redirect::to('/login')->with('flash_message', 'Log in failed; please try again.');
            }

            return Redirect::to('login');
        }
    )
);

Route::get('/logout', function() {

    # Log out
    Auth::logout();

   # Send them to the homepage
return Redirect::to('/adding');
    });
