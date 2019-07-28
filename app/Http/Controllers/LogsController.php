<?php



namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use Spatie\Activitylog\Models\Activity;



class LogsController extends Controller
{



     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $logs = Activity::with('user')->latest()->limit(100)->get();
         return view('admin.log.index', compact('logs'));
    }

    

     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        Activity::cleanLog();
    
        $notification = array(
                'message' => 'Log Cleared', 
                'alert-type' => 'warning'
        );

        return redirect('/admin/log')->with($notification);
    }
   

}
