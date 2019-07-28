<?php



namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\RoomFormRequest;
use App\Room;
use App\Department;
use Auth;
use Activity;



class RoomsController extends Controller
{



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    
         $rooms = Room::with('department')->paginate(7);
         return view('admin.rooms.index', compact('rooms'));

    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

         $departments = Department::all();
         return view('admin.rooms.create' , compact('departments'));

    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoomFormRequest $request)
    {
    
         $department = Department::where('name' , $request->get('department'))->firstOrFail();
         $room = new Room(array(

         'no' => $request->get('no'),
         'floor' => $request->get('floor'),
         'department_id' => $department->id,
 
          ));

          $room->save();

          $notification = array(
                'message' => 'A New Room '.$room->no.' Is Being Added', 
                'alert-type' => 'success'
           );
          
          Activity::log(Auth::User()->username.' Added'.' Room '.$room->no);
          
          return redirect('/admin/rooms')->with($notification);

    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

         $room = Room::whereId($id)->firstOrFail();
         return view('rooms.show', compact('room'));

    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $departments = Department::all();
         $room = Room::with('department')->find($id);
         return view('admin.rooms.edit', compact('departments','room'));
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, RoomFormRequest $request)
    {
        $room = Room::whereId($id)->firstOrFail();
        $department = Department::where('name' , $request->get('department'))->firstOrFail();
        $room->no = $request->get('no');
		$room->floor = $request->get('floor');
		$room->department_id = $department->id;
    
        $room->save();

        $notification = array(
                'message' => 'A Room '.$room->no.' Is Being Updated', 
                'alert-type' => 'success'
        );

        Activity::log(Auth::User()->username.' Updated'.' Room '.$room->no);
    
        return redirect(action('RoomsController@edit', $room->id))->with($notification);
    
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $room = Room::whereId($id)->firstOrFail();
        $no = $room->no;
    
        $room->delete();
    
        $notification = array(
                'message' => 'A Room '.$no.' Is Being Deleted', 
                'alert-type' => 'success'
        );

        Activity::log(Auth::User()->username.' Deleted'.' Room '.$no);

        return redirect('/admin/rooms')->with($notification);
    }
}
