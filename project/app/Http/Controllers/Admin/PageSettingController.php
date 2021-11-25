<?php

namespace App\Http\Controllers\Admin;
use App\Models\Pagesetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;

class PageSettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    protected $rules =
    [
        'video_image' => 'mimes:jpeg,jpg,png,svg',
        'video_background'    => 'mimes:jpeg,jpg,png,svg',
        'p_background'    => 'mimes:jpeg,jpg,png,svg',
        'review_background'    => 'mimes:jpeg,jpg,png,svg',
        'c_background'    => 'mimes:jpeg,jpg,png,svg',
    ];


    // Page Settings All post requests will be done in this method
    public function update(Request $request)
    {
        $data = Pagesetting::findOrFail(1);
        $input = $request->all();
        
            if ($file = $request->file('video_image')) 
            {              
                $name = time().$file->getClientOriginalName();
                $data->upload($name,$file,$data->video_image);
                $input['video_image'] = $name;
            }    
            if ($file = $request->file('video_background')) 
            {              
                $name = time().$file->getClientOriginalName();
                $data->upload($name,$file,$data->video_background);           
                $input['video_background'] = $name;
            } 
            if ($file = $request->file('p_background')) 
            {              
                $name = time().$file->getClientOriginalName();
                $data->upload($name,$file,$data->p_background);           
                $input['p_background'] = $name;
            } 
            if ($file = $request->file('review_background')) 
            {              
                $name = time().$file->getClientOriginalName();
                $data->upload($name,$file,$data->review_background);           
                $input['review_background'] = $name;
            } 
            if ($file = $request->file('c_background')) 
            {              
                $name = time().$file->getClientOriginalName();
                $data->upload($name,$file,$data->c_background);           
                $input['c_background'] = $name;
            } 
        $data->update($input);
        $msg = 'Data Updated Successfully.';
        return response()->json($msg);      
    }


    public function homeupdate(Request $request)
    {
        $data = Pagesetting::findOrFail(1);
        $input = $request->all();
        
        if ($request->slider == ""){
            $input['slider'] = 0;
        }
        if ($request->service == ""){
            $input['service'] = 0;
        }
        if ($request->featured == ""){
            $input['featured'] = 0;
        }
        if ($request->small_banner == ""){
            $input['small_banner'] = 0;
        }
        if ($request->best == ""){
            $input['best'] = 0;
        }
        if ($request->top_rated == ""){
            $input['top_rated'] = 0;
        }
        if ($request->large_banner == ""){
            $input['large_banner'] = 0;
        }
        if ($request->big == ""){
            $input['big'] = 0;
        }
        if ($request->hot_sale == ""){
            $input['hot_sale'] = 0;
        }
        if ($request->review_blog == ""){
            $input['review_blog'] = 0;
        }
        if ($request->pricing_plan == ""){
            $input['pricing_plan'] = 0;
        }
        if ($request->contact_section == ""){
            $input['contact_section'] = 0;
        }
        $data->update($input);
        $msg = 'Data Updated Successfully.';
        return response()->json($msg);      
    }


    public function contact()
    {
        $data = Pagesetting::find(1);   
        return view('admin.pagesetting.contact',compact('data'));
    }

    public function video()
    {
        $data = Pagesetting::find(1);   
        return view('admin.pagesetting.video',compact('data'));
    }

    public function present()
    {
        $data = Pagesetting::find(1);   
        return view('admin.pagesetting.present',compact('data'));
    }

    public function homecontact()
    {
        $data = Pagesetting::find(1);   
        return view('admin.pagesetting.homecontact',compact('data'));
    }

    public function blog()
    {
        $data = Pagesetting::find(1);   
        return view('admin.pagesetting.blog',compact('data'));
    }

    public function customize()
    {
        $data = Pagesetting::find(1);   
        return view('admin.pagesetting.customize',compact('data'));
    }

    //Upadte About Page Section Settings


    //Upadte FAQ Page Section Settings
    public function faqupdate($status)
    {
        $page = Pagesetting::findOrFail(1);
        $page->f_status = $status;
        $page->update();
        Session::flash('success', 'FAQ Status Upated Successfully.');
        return redirect()->back();
    }

    public function contactup($status)
    {
        $page = Pagesetting::findOrFail(1);
        $page->c_status = $status;
        $page->update();
        Session::flash('success', 'Contact Status Upated Successfully.');
        return redirect()->back();
    }

    //Upadte Contact Page Section Settings
    public function contactupdate(Request $request)
    {
        $page = Pagesetting::findOrFail(1);
        $input = $request->all();
        $page->update($input);
        Session::flash('success', 'Contact page content updated successfully.');
        return redirect()->route('admin-ps-contact');;
    }

}
