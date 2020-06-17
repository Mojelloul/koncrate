<?php

namespace App\Http\Controllers;
use App\Post,App\service,App\Slide,App\page,App\Message,App\Category;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index(){
        $slides= Slide::orderBy('created_at','desc')->take(3)->get();
        $service = Service::take(3)->get();
        $posts = Post::take(4)->get();
        return   view('site.accueil',['slides'=>$slides, 'services'=>$service,'posts'=>$posts]);
    }
    public function services(){
        $service = Service::all();
        return   view('site.services',['services'=>$service]);
    }
    public function service($id){
        $service = Service::find($id);
        return   view('site.service',['service'=>$service]);
    }
    public function blog(){

        $categories= Category::all();
        $posts=Post::paginate(4);
        return   view('site.blog',['posts'=>$posts,'categories'=>$categories]);
    }
    public function about(){
        $page=Page::where('slug','propos')->first();
        return    view('site.about',['page'=>$page]);
    }
    public function contact(){
        return   view('site.contact');
    }
    //pour persister un vouveau message
    public function storeContact(Request $request){
        $data =  $request->validate([
            'name'   =>'required',
            'message'=>'required|min:5|max:300',
            'email'  =>'required|email'
        ]);

        $message = new Message();

        $message->name      = $data['name'];
        $message->email     = $data['email'];
        $message->message   = $data['message'];
        $message->save();
        return redirect('/contact')->with('status',"Salut $message->name, votre demande sera traité dans quelques instants. ");
    }
    public function show($slug){

        $post= Post::where('slug',$slug)->first();
         return   view('site.show',['post'=>$post]);
     }
     public function getPostsOfCategory($slug){
         $category = Category::where('slug',$slug)->first();
         $posts= $category->posts()->paginate(4);
         $categories= Category::all();
         return   view('site.blog',['posts'=>$posts,'categories'=>$categories]);
     }
}
