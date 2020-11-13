<?php
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Route;



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

Route::get('/query', function() {
   
// $post = POST::whereHas('comments', function($query){
//     $query->where('desc', 'like', '%D');
// })->get();

//1).                         simple has query
//                            --------------------
/* has query demo. This will display all comments that has posts inside it. in this case those posts that have id's 6 to 10 */

//  return $comment = Comment::has('post')->get();

//2).                           nested has query
//                            --------------------
//This will display all those comments that not only have posts but also votes. has(post) will display all posts and '.votes' will display that posts have a vote.

// return $comment = Comment::has('post.votes')->get();


//3).                            whereHas query.
//                              ----------------- 

//This will display all posts that have a comment whose created at is null.

// return $post = Post::whereHas('comments', function($query){
//     $query->where('created_at', '=', null);
// })->get();


//4).                               doesntHave query.
//                                 -------------------
// This will not display those columns specified in this function. 


// return $post = Post::doesntHave('comments')->get();



//5).                               whereDoesntHave query
//                                 -----------------------


    return $post = Post::whereDoesntHave('comments', function(Builder $query){
        $query->where('desc', 'like', 'Provident%');
    })->get();
});
