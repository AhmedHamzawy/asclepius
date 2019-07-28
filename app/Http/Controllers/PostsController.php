<?php




namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostFormRequest;
use App\Post;
use Auth;
use Activity;




class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $posts = Post::paginate(5);
         return view('admin.posts.index', compact('posts'));
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin.posts.create');
    }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostFormRequest $request)
    {
        
         $post = new Post(array(

         'url' => $request->get('url'),
         'title' => $request->get('title'),
         'description' => $request->get('description'),
         'content' => $request->get('content'),
         'blog' => $request->get('blog'),
         'date' => $request->get('date'),
         
          ));

          $post->save();

          if($request->file('image') != null){

              $imageName = $post->id . '.' . 
            
              $request->file('image')->getClientOriginalExtension();

              $request->file('image')->move(
                    base_path() . '/public/images/posts/', $imageName
               );

          }

          $notification = array(
                'message' => 'A New Post '.$post->title.' Is Being Added', 
                'alert-type' => 'success'
           );
          
          Activity::log(Auth::User()->username.' Added'.' Post '.$post->title);

          return redirect('/admin/posts')->with($notification);

    }




    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $post = Post::whereId($id)->firstOrFail();
         return view('posts.show', compact('post'));
    }




    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $post = Post::whereId($id)->firstOrFail();
         return view('admin.posts.edit', compact('post'));
    }




    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, PostFormRequest $request)
    {
        $post = Post::whereId($id)->firstOrFail();
     
        $post->url = $request->get('url');
        $post->title = $request->get('title');
        $post->description = $request->get('description');
        $post->content = $request->get('content');
        $post->blog = $request->get('blog');
        $post->date = $request->get('date');


        $post->save();

        if($request->file('image') != null){

            $imageName = $post->id . '.' . 

            $request->file('image')->getClientOriginalExtension();

            $request->file('image')->move(
                base_path() . '/public/images/posts/', $imageName
            );

        }

         $notification = array(
                'message' => 'A Post '.$post->title.' Is Being Updated', 
                'alert-type' => 'success'
        );

        Activity::log(Auth::User()->username.' Updated'.' Post '.$post->title);

        return redirect(action('PostsController@edit', $post->id))->with($notification);
    
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::whereId($id)->firstOrFail();
        $title = $post->title;

        $post->delete();

         $notification = array(
                'message' => 'A Post '.$title.' Is Being Deleted', 
                'alert-type' => 'success'
        );

        Activity::log(Auth::User()->username.' Deleted'.' Post '.$title);

        return redirect('/admin/posts')->with($notification);
    }
}
