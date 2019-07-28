<?php


namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\SettingFormRequest;
use App\Setting;
use Auth;
use Activity;


class SettingsController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id = 1)
    {
         $settings = Setting::findOrFail($id);
         return view('admin.settings.edit', compact('settings'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SettingFormRequest $request)
    {
        $settings = Setting::findOrFail(1);

     
        $settings->name = $request->get('name');
        $settings->address = $request->get('address');
        $settings->town = $request->get('town');
        $settings->county = $request->get('county');
        $settings->post_code = $request->get('post_code');
        $settings->country = $request->get('country');
        $settings->telephone = $request->get('telephone');
        $settings->email = $request->get('email');
        $settings->website = $request->get('website');
        $settings->facebook = $request->get('facebook');
        $settings->twitter = $request->get('twitter');
        $settings->instagram = $request->get('instagram');
        $settings->youtube = $request->get('youtube');
        

        $settings->save();

        

        $notification = array(
                'message' => 'The Settings Are Being Updated', 
                'alert-type' => 'warning'
          );
          
        Activity::log(Auth::user()->settingname.' updated the settings');
       
        return redirect(action('SettingsController@update'))->with($notification);
    
    }


}
