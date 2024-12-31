<?php

use App\Http\Controllers\LoginController;

use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Models\Post;
use App\Models\Like;
use App\Mail\contactMail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
             

Route::view('/about','about');
Route::view('/contact','contact');
Route::get('/',[PostController::class,'index']);
Route::get('/posts/create ',[PostController::class,'create']);/* ->middleware(['auth', 'verified'])->name('create');; */
Route::post('/posts/create ',[PostController::class,'store']);
Route::get('/posts/{post}/edit',[PostController::class,'edit']);
Route::post('/posts/{post}/edit',[PostController::class,'update']);
Route::get('/posts/{post}',[PostController::class,'show']);
Route::delete('/posts/{post}',[PostController::class,'destroy']);
Route::get('/login ',[LoginController::class,'create']);
Route::post('/login ',[LoginController::class,'store']);
Route::delete('/logout',[LoginController::class,'destroy']);
Route::get('/register',[RegisterController::class,'create']);
Route::post('/register',[RegisterController::class,'store']);
Route::get('/like ',function (){
$post=Post::find(request('postId'));
    if (Auth::check()) {
$userId =Auth::user()->id; 
        if(request('action')=='increase'){
        

        
       $like= DB::select('select * from likes where user_id = ? and post_id=?', [$userId,$post->id]);
       if ($like==null) {
        Like::create([
        'user_id'=>$userId,
        'post_id'=>$post->id
       ]);
    }   
    }elseif(request('action')=='decrease'){
        DB::delete('DELETE FROM `likes` where user_id = ? and post_id=?', [$userId,$post->id]);

    }
    return [count($post->likes)];
    /* if(request('action')=='increase'){
        $old_likes=$post->likes_num;
        $post->likes_num=$old_likes+1;

    
        $old_likes=$post->likes_num;
        if( $old_likes>0){
            $post->likes_num=$old_likes-1;
        }
     
    }
    $post->save();
   return redirect("/posts/".$post->id); */
    }else {
       

        return [ 1];

       
    }



});

Route::post('/contact',function(){
    $attribut=request()->validate([
        'name' =>["required",'min:3'],
        'phone' =>["required",'min:3'],
        'email' =>["required",'email'],
        'message' =>['required','min:3']
    ]);
Mail::to("admin@test.test")->send(new contactMail($attribut));
session()->flash('success', "تم الاسال بنجاج");
return redirect("/contact");
});

