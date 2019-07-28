<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use App\Department;
use App\Room;
use App\Post;
use App\Message;
use App\Setting;
use App\Event;
use Carbon\Carbon;
use Visitor;
use Khill\Lavacharts\Lavacharts;
use Spatie\Activitylog\Models\Activity;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   

        $users = User::all();
        $countusers = $users->count();
        $departments = Department::all();
        $countdepartments = $departments->count();
        $rooms = Room::all();
        $posts = Post::all();
        $countposts = $posts->count();
        $messages = Message::with('sender' , 'reciever')->get();
        $logs = Activity::with('user')->latest()->limit(15)->get();
        $settings = Setting::all();
        $events = Event::all();


        $patient = User::whereId(Auth::user()->id)->firstOrFail();
        $doctorpatient = User::whereId($patient->doctor_id)->first();


        $lava = new Lavacharts;
        $userscount = $lava->DataTable();

        $userscount->addDateColumn('Year')
                   ->addNumberColumn('Number of Users')
                   ->addRow(['2009', $users->count()])
                   ->addRow(['2010', $users->count()])
                   ->addRow(['2011', $users->count()])
                   ->addRow(['2012', $users->count()])
                   ->addRow(['2013', $users->count()])
                   ->addRow(['2014', $users->count()])
                   ->addRow(['2015', $users->count()])
                   ->addRow(['2016', $users->count()])
                   ->addRow(['2017', $users->count()]);

        $lava->AreaChart('Users', $userscount, [
            'title' => 'Users Added',
            'legend' => [
                'position' => 'in'
            ]
        ]);
        


        $analysis = $lava->DataTable();

        $analysis->addStringColumn('cases')
                ->addNumberColumn('Percent')
                ->addRow(['Patients', 5])
                ->addRow(['Receptionists', 2])
                ->addRow(['Doctors', 4])
                ->addRow(['Nurses', 89]);

        $lava->PieChart('Analysis', $analysis, [
            'title'  => 'Asclepius Analysis',
            'is3D'   => true,
            'slices' => [
                ['offset' => 0.2],
                ['offset' => 0.25],
                ['offset' => 0.3]
            ]
        ]);




        $temperatures = $lava->DataTable();

        $temperatures->addDateColumn('Date')
                     ->addNumberColumn('Max Temp')
                     ->addNumberColumn('Mean Temp')
                     ->addNumberColumn('Min Temp')
                     ->addRow(['2014-10-1',  67, 65, 62])
                     ->addRow(['2014-10-2',  68, 65, 61])
                     ->addRow(['2014-10-3',  68, 62, 55])
                     ->addRow(['2014-10-4',  72, 62, 52])
                     ->addRow(['2014-10-5',  61, 54, 47])
                     ->addRow(['2014-10-6',  70, 58, 45])
                     ->addRow(['2014-10-7',  74, 70, 65])
                     ->addRow(['2014-10-8',  75, 69, 62])
                     ->addRow(['2014-10-9',  69, 63, 56])
                     ->addRow(['2014-10-10', 64, 58, 52])
                     ->addRow(['2014-10-11', 59, 55, 50])
                     ->addRow(['2014-10-12', 65, 56, 46])
                     ->addRow(['2014-10-13', 66, 56, 46])
                     ->addRow(['2014-10-14', 75, 70, 64])
                     ->addRow(['2014-10-15', 76, 72, 68])
                     ->addRow(['2014-10-16', 71, 66, 60])
                     ->addRow(['2014-10-17', 72, 66, 60])
                     ->addRow(['2014-10-18', 63, 62, 62]);

        $lava->LineChart('Temps', $temperatures, [
            'title' => 'Weather in October'
        ]);




        $finances = $lava->DataTable();

        $finances->addDateColumn('Year')
                 ->addNumberColumn('Sales')
                 ->addNumberColumn('Expenses')
                 ->setDateTimeFormat('Y')
                 ->addRow(['2004', 1000, 400])
                 ->addRow(['2005', 1170, 460])
                 ->addRow(['2006', 660, 1120])
                 ->addRow(['2007', 1030, 54]);

        $lava->ColumnChart('Finances', $finances, [
            'title' => 'Company Performance',
            'titleTextStyle' => [
                'color'    => '#eb6b2c',
                'fontSize' => 14
            ]
        ]);



        $reasonsone = $lava->DataTable();

        $reasonsone->addStringColumn('Reasons')
                ->addNumberColumn('Percent')
                ->addRow(['Check Reviews', 5])
                ->addRow(['Watch Trailers', 2])
                ->addRow(['See Actors Other Work', 4])
                ->addRow(['Settle Argument', 89]);

        $lava->DonutChart('IMDB', $reasonsone, [
            'title' => 'Reasons I visit IMDB'
        ]);




        $popularity = $lava->DataTable();

        $popularity->addStringColumn('Country')
                   ->addNumberColumn('Popularity')
                   ->addRow(array('Germany', 200))
                   ->addRow(array('United States', 300))
                   ->addRow(array('Brazil', 400))
                   ->addRow(array('Canada', 500))
                   ->addRow(array('France', 600))
                   ->addRow(array('RU', 700));

        $lava->GeoChart('Popularity', $popularity);


        $doctors = User::with('reviews')->get();
         

        $visitors = Visitor::all();
        $visitorsnum = Visitor::count(); 
        $visitorsclicks = Visitor::clicks();


        $patient = User::findOrFail(Auth::user()->id);
        if($patient->doctor_name != null){$doctorpatient = User::where('lastname' , $patient->doctor_name)->firstOrFail();}
    

         return view('admin.dashboard', compact('users' , 'countusers' , 'departments' , 'countdepartments' ,'lava' ,'rooms','posts' , 'doctors' , 'countposts' ,'messages','logs','settings','events','visitorsnum','visitorsclicks','visitors' ,'patient' , 'doctorpatient' ));

    }
}
    