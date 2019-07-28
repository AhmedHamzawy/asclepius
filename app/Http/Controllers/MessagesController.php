<?php



namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\MessageFormRequest;
use App\Message;
use App\User;
use Auth;
use Activity;
use Mail;



class MessagesController extends Controller
{



     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $messages = Message::with('sender' , 'reciever')->paginate(5);
         $patient = User::whereId(Auth::user()->id)->firstOrFail();
         $doctorpatient = User::whereId($patient->doctor_id)->first();
         return view('admin.messages.index', compact('messages' , 'patient' , 'doctorpatient'));
    }

    


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $sender = Auth::User()->user_name;
         $recievers = User::all();

         return view('admin.messages.create' , compact('sender','recievers'));
    }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MessageFormRequest $request)
    {
         $from = Auth::user()->id;
         $reciever = User::where('user_name' , $request->get('to'))->firstOrFail();
         $to = $reciever->id;

         $message = new Message(array(

         'from' => $from,
         'to' => $to,
         'subject' => $request->get('subject'),
         'message' => $request->get('message'),
 
          ));


          $title = 'You Have A New Message';
          $content = 'A New Message Is Sent To You';

          $target = User::whereId($to)->firstOrFail();

        Mail::send('admin.messages.send', ['title' => $title, 'content' => $content , 'target' => $target], function ($message) use ($target)
        {

            $message->from(Auth::user()->email, Auth::user()->user_name);

            $message->to($target->email);

        });




          $message->save();

         


          $notification = array(
                'message' => 'A New Message From '.Auth::user()->user_name.' sent to '.$reciever->user_name, 
                'alert-type' => 'info'
           );
          
          Activity::log('A New Message From '.Auth::user()->user_name.' sent to '.$reciever->user_name);

          return redirect('/admin/messages')->with($notification);

    }




    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $message = Message::whereId($id)->firstOrFail();
         return view('admin.messages.show', compact('message'));
    }




}
