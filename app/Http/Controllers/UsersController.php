<?php



namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserFormRequest;
use App\Http\Requests\ReviewFormRequest;
use DB;
use App\User;
use App\Role;
use App\Department;
use App\Room;
use App\Review;
use App\Setting;
use Carbon\Carbon;
use Auth;
use Activity;
use Dompdf\Dompdf;
use Excel;


class UsersController extends Controller
{



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

         $users = User::paginate(5);
         return view('admin.users.index', compact('users'));

    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $departments = Department::all();
         $role_doctors = Role::whereId(4)->with('users')->get();
         $countries =  DB::table('countries')->get();
         $rooms = Room::all();
         $roles = Role::all();
         return view('admin.users.create' , compact('departments' , 'role_doctors' , 'countries' , 'rooms' , 'roles'));
    }

    


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserFormRequest $request)
    {
         $department = Department::where('name' , $request->get('department'))->firstOrFail();
         if($request->get('room_id') != null) { $room = User::where('id' , $request->get('room_id'))->firstOrFail(); 
         $room_id = $room->id; }
         else{ $room_id = null;  }
         if($request->get('doctor_id') != null) { $doctor = User::where('id' , $request->get('doctor_id'))->firstOrFail(); 
         $doctor_id = $doctor->id; }
         else{ $doctor_id = null;  }
         
         $user = new User(array(

         'user_name' => $request->get('user_name'),
         'first_name' => $request->get('first_name'),
         'middle_name' => $request->get('middle_name'),
         'last_name' => $request->get('last_name'),
         'gender' => $request->get('gender'),
         'birthdate' => $request->get('birthdate'),
         'age' => $request->get('age'),
         'telephone' => $request->get('telephone'),
         'email' => $request->get('email'),
         'address' => $request->get('address'),
         'street' => $request->get('street'),
         'town' => $request->get('town'),
         'country' => $request->get('country'),
         'other' => $request->get('other'),
         'department_id' => $department->id,
         'room_id' => $room_id,
         'doctor_id' => $doctor_id,
         'appointment' => $request->get('appointment'),
         'sickness' => $request->get('sickness'),
         'prescription' => $request->get('prescription'),
         'price' => $request->get('price'),
         'password' => bcrypt($request->get('password')),
        
         
          ));

          $user->save();

          $imageName = $user->id . '.' . 
        
          $request->file('image')->getClientOriginalExtension();

          $request->file('image')->move(
                base_path() . '/public/images/users/', $imageName
          );

          $notification = array(
                'message' => 'A New '.$user->role.' '.$user->user_name.' '.'Is Being Added', 
                'alert-type' => 'success'
          );

          $user->attachRole($request->get('role'));
          
          Activity::log(Auth::User()->user_name.' Added '.$user->role.' '.$user->first_name.' '.$user->last_name);

          return redirect('/admin/users')->with($notification);
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
         $user = User::whereId($id)->firstOrFail();
         $role_doctors = Role::whereId(4)->with('users')->get();
         $countries =  DB::table('countries')->get();
         $rooms = Room::all();
         $roles = Role::all();
         $role_user = DB::table('role_user')->where('user_id', $id)->get();

         return view('admin.users.edit' , compact('departments' , 'role_doctors' , 'countries' , 'rooms' , 'user' , 'roles' , 'role_user'));
    }

    


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, UserFormRequest $request)
    {
        $user = User::whereId($id)->firstOrFail();
        $department = Department::where('name' , $request->get('department'))->firstOrFail();
         if($request->get('room_id') != null) { $room = User::where('id' , $request->get('room_id'))->firstOrFail(); 
         $room_id = $room->id; }
         else{ $room_id = null;  }
         if($request->get('doctor_id') != null) { $doctor = User::where('id' , $request->get('doctor_id'))->firstOrFail(); 
         $doctor_id = $doctor->id; }
         else{ $doctor_id = null;  }

     
        $user->user_name = $request->get('user_name');
        $user->first_name = $request->get('first_name');
        $user->middle_name = $request->get('middle_name');
        $user->last_name = $request->get('last_name');
        $user->gender = $request->get('gender');
        $user->birthdate = $request->get('birthdate');
        $user->age = $request->get('age');
        $user->telephone = $request->get('telephone');
        $user->email = $request->get('email');
        $user->address = $request->get('address');
        $user->street = $request->get('street');
        $user->town = $request->get('town');
        $user->country = $request->get('country');
        $user->other = $request->get('other');
        $user->department_id = $department->id;
        $user->room_id = $room_id;
        $user->doctor_id = $doctor_id;
        $user->appointment = $request->get('appointment');
        $user->sickness = $request->get('sickness');
        $user->prescription = $request->get('prescription');
        $user->price = $request->get('price');
        $user->password = bcrypt($request->get('password'));
       
        $user->save();

        $imageName = $user->id . '.' . 
        
        $request->file('image')->getClientOriginalExtension();

        $request->file('image')->move(
            base_path() . '/public/images/users/', $imageName
        );

        $notification = array(
                'message' => 'A '.$user->role.' '.$user->user_name.' '.'Is Being Update', 
                'alert-type' => 'success'
          );

          
        Activity::log(Auth::User()->user_name.' updated '.$user->role.' '.$user->first_name.' '.$user->last_name);
       
        return redirect(action('UsersController@edit', $user->id))->with($notification);
    
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::whereId($id)->firstOrFail();
        $user_name = $user->user_name;
        $first_name = $user->first_name;
        $last_name = $user->last_name;
        $role = $user->role;

        $user->delete();

        $notification = array(
                'message' => 'A '.$role.' '.$user_name.' Is Being Deleted', 
                'alert-type' => 'success'
        );

        Activity::log(Auth::User()->user_name.' Deleted '.$role.' '.$user_name);

        return redirect('/admin/users')->with($notification);
    }



    public function listDoctors()
    {
         $role_doctors = Role::whereId(4)->with('users')->paginate(6);
         return view('admin.doctors.index', compact('role_doctors'));
    }



    public function showDoctorProfile($id)
    {
         $doctorpatient = User::whereId(Auth::User()->doctor_id)->with('department')->firstOrFail();
         $country =  DB::table('countries')->whereId($doctorpatient->country)->get();
         $patient =  User::findOrFail(Auth::user()->id);
         $reviews = Review::where('doctor_id' , $doctorpatient->id)->with('patient')->get();
        
         return view('admin.doctors.profile', compact('doctorpatient' , 'country' , 'reviews' , 'patient'));
    }
    

    public function pdfDoctor($id)
    {
        
       // instantiate and use the dompdf class
        $dompdf = new Dompdf();
        $dompdf->loadHtml('<h1 style="text-align:center; margin:50px;">The Content Will Be Included In The Next Update , My Apologies I Dont Have A Time</h1>');

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream();
    }

    public function excelDoctor($id)
    {
        Excel::create('Filename', function($excel) {

        $excel->sheet('Sheetname', function($sheet) {

            // Sheet manipulation
            $sheet->fromArray(array(
            array('the', 'content' , 'will' , 'be' , 'included' , 'in' , 'the' , 'next' , 'update'),
            array('my', 'apologies' , 'i' , 'dont' , 'have' , 'a' , 'time')
             ));


        });

        })->export('xls');
     
    }
    


    public function listNurses()
    {
         $role_nurses = Role::whereId(5)->with('users')->paginate(6);
         return view('admin.nurses.index', compact('role_nurses'));
    }
    


    public function showNurseProfile($id)
    {
         $nurse = User::whereId($id)->with('department')->firstOrFail();
         $country =  DB::table('countries')->whereId($nurse->country)->get();
         return view('admin.nurses.profile', compact('nurse' , 'country'));
    }



    public function pdfNurse($id)
    {
        
       // instantiate and use the dompdf class
        $dompdf = new Dompdf();
        $dompdf->loadHtml('<h1 style="text-align:center; margin:50px;">The Content Will Be Included In The Next Update , My Apologies I Dont Have A Time</h1>');

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream();
    }

    public function excelNurse($id)
    {
        Excel::create('Filename', function($excel) {

        $excel->sheet('Sheetname', function($sheet) {

            // Sheet manipulation
            $sheet->fromArray(array(
            array('the', 'content' , 'will' , 'be' , 'included' , 'in' , 'the' , 'next' , 'update'),
            array('my', 'apologies' , 'i' , 'dont' , 'have' , 'a' , 'time')
             ));


        });

        })->export('xls');
     
    }

    public function listEditors()
    {
         $role_editors = Role::whereId(3)->with('users')->paginate(6);
         return view('admin.editors.index', compact('role_editors'));
    }
    


    public function showEditorProfile($id)
    {
         $editor = User::whereId($id)->firstOrFail();
         return view('admin.editors.profile', compact('editor'));
    }



    public function pdfEditor($id)
    {
        
       // instantiate and use the dompdf class
        $dompdf = new Dompdf();
        $dompdf->loadHtml('<h1 style="text-align:center; margin:50px;">The Content Will Be Included In The Next Update , My Apologies I Dont Have A Time</h1>');

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream();
    }

    public function excelEditor($id)
    {
        Excel::create('Filename', function($excel) {

        $excel->sheet('Sheetname', function($sheet) {

            // Sheet manipulation
            $sheet->fromArray(array(
            array('the', 'content' , 'will' , 'be' , 'included' , 'in' , 'the' , 'next' , 'update'),
            array('my', 'apologies' , 'i' , 'dont' , 'have' , 'a' , 'time')
             ));


        });

        })->export('xls');
     
    }

    public function listPatients()
    {
         $role_patients = Role::whereId(6)->with('users')->paginate(6);
         return view('admin.patients.index', compact('role_patients'));
    }



    public function showPatientProfile($id)
    {
         $patient = User::whereId($id)->firstOrFail();
         $country =  DB::table('countries')->whereId($patient->country)->get();
         $doctorpatient = User::whereId($patient->doctor_id)->firstOrFail();
         return view('admin.patients.profile', compact('patient' , 'country' , 'doctorpatient'));
    }



    public function pdfPatient($id)
    {
        
       // instantiate and use the dompdf class
        $dompdf = new Dompdf();
        $dompdf->loadHtml('<h1 style="text-align:center; margin:50px;">The Content Will Be Included In The Next Update , My Apologies I Dont Have A Time</h1>');

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream();
    }

    public function excelPatient($id)
    {
        Excel::create('Filename', function($excel) {

        $excel->sheet('Sheetname', function($sheet) {

            // Sheet manipulation
            $sheet->fromArray(array(
            array('the', 'content' , 'will' , 'be' , 'included' , 'in' , 'the' , 'next' , 'update'),
            array('my', 'apologies' , 'i' , 'dont' , 'have' , 'a' , 'time')
             ));


        });

        })->export('xls');
     
    }

    public function invoice($id)
    {
        $settings = Setting::findOrFail(1);
        $patient = User::whereId($id)->firstOrFail();
        if(Auth::user()->id != $id){return view('errors.503');}
        else{return view('admin.patients.invoice', compact('patient' , 'settings'));}
    }


    public function listReceptionists()
    {
         $role_receptionists = Role::whereId(2)->with('users')->paginate(6);
         return view('admin.receptionists.index', compact('role_receptionists'));
    }



    public function showReceptionistProfile($id)
    {
         $receptionist = User::whereId($id)->firstOrFail();
         return view('admin.receptionists.profile', compact('receptionist'));
    }
   

    public function pdfReceptionist($id)
    {
        
       // instantiate and use the dompdf class
        $dompdf = new Dompdf();
        $dompdf->loadHtml('<h1 style="text-align:center; margin:50px;">The Content Will Be Included In The Next Update , My Apologies I Dont Have A Time</h1>');

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream();
    }

    public function excelReceptionist($id)
    {
        Excel::create('Filename', function($excel) {

        $excel->sheet('Sheetname', function($sheet) {

            // Sheet manipulation
            $sheet->fromArray(array(
            array('the', 'content' , 'will' , 'be' , 'included' , 'in' , 'the' , 'next' , 'update'),
            array('my', 'apologies' , 'i' , 'dont' , 'have' , 'a' , 'time')
             ));


        });

        })->export('xls');
     
    }


    public function storeReview($id , ReviewFormRequest $request)
    {
      $doctor = User::whereId($id)->firstOrFail();

    
      $doctorreview = new Review(array(

        'patient_id' =>  Auth::user()->id ,
        'doctor_id' =>  $id ,
        'rating'  =>  $request->get('rating') ,
        'approved' => 1 , 
        'spam' => 0 ,
        'comment' =>  $request->get('comment'),

      ));

      
      $doctorreview -> save();

      redirect('/admin/doctors/profile/$id')->with('done');

    }

    


}
