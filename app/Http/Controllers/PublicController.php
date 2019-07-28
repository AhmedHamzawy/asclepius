<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use App\Department;
use App\Room;
use App\Post;
use App\Message;
use App\Setting;
use App\Event;
use Visitor;
use Spatie\Activitylog\Models\Activity;

class PublicController extends Controller
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
        $messages = Message::all();
        $logs = Activity::with('user')->latest()->limit(15)->get();
        $settings = Setting::all();
        $events = Event::all();
        $role_doctors = Role::whereId(4)->with('users')->get();
      
        Visitor::log();

        return view('index');

    }
}
    