<?php

namespace App\Http\Controllers\Admin;
use App\Models\Generalsetting;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Validator;

class GeneralSettingController extends Controller
{

    protected $rules =
    [
        'logo'       => 'mimes:jpeg,jpg,png,svg',
        'footer_logo'       => 'mimes:jpeg,jpg,png,svg',
        'favicon'    => 'mimes:jpeg,jpg,png,svg',
        'loader'     => 'mimes:gif',
        'admin_loader'     => 'mimes:gif',
        'service_image'    => 'mimes:jpeg,jpg,png,svg',
        'error_photo'    => 'mimes:jpeg,jpg,png,svg',
        'breadcumb_banner'    => 'mimes:jpeg,jpg,png,svg',
        'admin_loader'    => 'mimes:gif'
    ];

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    private function setEnv($key, $value,$prev)
    {
        file_put_contents(app()->environmentFilePath(), str_replace(
            $key . '=' . $prev,
            $key . '=' . $value,
            file_get_contents(app()->environmentFilePath())
        ));
    }

    // Genereal Settings All post requests will be done in this method
    public function generalupdate(Request $request)
    {
        //--- Validation Section
        $validator = Validator::make(Input::all(), $this->rules);
        
        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        //--- Validation Section Ends

        //--- Logic Section
        else {
        $input = $request->all(); 
        $data = Generalsetting::findOrFail(1);  
        $prev = $data->molly_key;      
            if ($file = $request->file('logo')) 
            {              
                $name = time().$file->getClientOriginalName();
                $data->upload($name,$file,$data->logo);
                $input['logo'] = $name;
            } 
            if ($file = $request->file('footer_logo')) 
            {              
                $name = time().$file->getClientOriginalName();
                $data->upload($name,$file,$data->footer_logo);
                $input['footer_logo'] = $name;
            }   
            if ($file = $request->file('favicon')) 
            {              
                $name = time().$file->getClientOriginalName();
                $data->upload($name,$file,$data->favicon);           
                $input['favicon'] = $name;
            }    
            if ($file = $request->file('loader')) 
            {              
                $name = time().$file->getClientOriginalName();
                $data->upload($name,$file,$data->loader);         
                $input['loader'] = $name;
            }  
            if ($file = $request->file('service_image')) 
            {              
                $name = time().$file->getClientOriginalName();
                $data->upload($name,$file,$data->service_image);         
                $input['service_image'] = $name;
            } 
            if ($file = $request->file('error_photo')) 
            {              
                $name = time().$file->getClientOriginalName();
                $data->upload($name,$file,$data->error_photo);         
                $input['error_photo'] = $name;
            } 
            if ($file = $request->file('breadcumb_banner')) 
            {              
                $name = time().$file->getClientOriginalName();
                $data->upload($name,$file,$data->breadcumb_banner);         
                $input['breadcumb_banner'] = $name;
            } 
            if ($file = $request->file('admin_loader')) 
            {              
                $name = time().$file->getClientOriginalName();
                $data->upload($name,$file,$data->admin_loader);         
                $input['admin_loader'] = $name;
            }  
            if (!empty($request->quotes)) 
            {
               $input['quotes'] = implode(',', $request->quotes);       
            }
           else {
               $input['quotes'] = null;
            } 
            
        $data->update($input);

        $this->setEnv('MOLLIE_KEY',$data->molly_key,$prev);
        
        //--- Logic Section Ends
            
        
        //--- Redirect Section        
        $msg = 'Data Updated Successfully.';
        return response()->json($msg);      
        //--- Redirect Section Ends               
        }
    }


    public function menuupdate(Request $request)
    {
        $data = Generalsetting::findOrFail(1);
        $input = $request->all();
        
        if ($request->is_contact == ""){
            $input['is_contact'] = 0;
        }
        if ($request->is_faq == ""){
            $input['is_faq'] = 0;
        }
        if ($request->is_home == ""){
            $input['is_home'] = 0;
        }
        if ($request->is_services == ""){
            $input['is_services'] = 0;
        }
        if ($request->is_plans == ""){
            $input['is_plans'] = 0;
        }
        if ($request->is_projects == ""){
            $input['is_projects'] = 0;
        }
        if ($request->is_teams == ""){
            $input['is_teams'] = 0;
        }
        if ($request->is_blog == ""){
            $input['is_blog'] = 0;
        }
        if ($request->is_pages == ""){
            $input['is_pages'] = 0;
        }
        $data->update($input);
        $msg = 'Data Updated Successfully.';
        return response()->json($msg);      
    }


    public function logo()
    {
        return view('admin.generalsetting.logo');
    }

    public function fav()
    {
        return view('admin.generalsetting.favicon');
    }

    public function error()
    {
        return view('admin.generalsetting.error');
    }
     public function breadcumb()
    {
        return view('admin.generalsetting.breadcumb');
    }

     public function load()
    {
        return view('admin.generalsetting.loader');
    }
     public function service()
    {
        return view('admin.generalsetting.service');
    }

     public function contents()
    {
        return view('admin.generalsetting.websitecontent');
    }

     public function success()
    {
        return view('admin.generalsetting.success');
    }

     public function header()
    {
        return view('admin.generalsetting.header');
    }

     public function footer()
    {
        return view('admin.generalsetting.footer');
    }

    public function paymentsinfo()
    {
        return view('admin.generalsetting.paymentsinfo');
    }

    public function affilate()
    {
        return view('admin.generalsetting.affilate');
    }

    public function customize()
    {
        return view('admin.pagesetting.menu_customize');
    }

    public function paypal($status)
    {
        
        $data = Generalsetting::findOrFail(1);
        $data->paypal_check = $status;
        $data->update();
    }

    public function molly($status)
    {
        
        $data = Generalsetting::findOrFail(1);
        $data->is_molly = $status;
        $data->update();
    }

    public function stripe($status)
    {
        
        $data = Generalsetting::findOrFail(1);
        $data->stripe_check = $status;
        $data->update();
    }

    public function guest($status)
    {
        $data = Generalsetting::findOrFail(1);
        $data->guest_checkout = $status;
        $data->update();
    }

    public function cod($status)
    {
        
        $data = Generalsetting::findOrFail(1);
        $data->cod_check = $status;
        $data->update();
    }

    public function comment($status)
    {
        $data = Generalsetting::findOrFail(1);
        $data->is_comment = $status;
        $data->update();
    }
    public function isaffilate($status)
    {
        $data = Generalsetting::findOrFail(1);
        $data->is_affilate = $status;
        $data->update();
    }

    public function issmtp($status)
    {
        $data = Generalsetting::findOrFail(1);
        $data->is_smtp = $status;
        $data->update();
    }

    public function talkto($status)
    {
        $data = Generalsetting::findOrFail(1);
        $data->is_talkto = $status;
        $data->update();
    }

    public function issubscribe($status)
    {
        $data = Generalsetting::findOrFail(1);
        $data->is_subscribe = $status;
        $data->update();
    }

    public function isloader($status)
    {
        $data = Generalsetting::findOrFail(1);
        $data->is_loader = $status;
        $data->update();
    }


    public function isadminloader($status)
    {
        $data = Generalsetting::findOrFail(1);
        $data->is_admin_loader = $status;
        $data->update();
    }

    public function isdisqus($status)
    {
        $data = Generalsetting::findOrFail(1);
        $data->is_disqus = $status;
        $data->update();
    }

    public function iscontact($status)
    {
        $data = Generalsetting::findOrFail(1);
        $data->is_contact = $status;
        $data->update();
    }
    public function isfaq($status)
    {
        $data = Generalsetting::findOrFail(1);
        $data->is_faq = $status;
        $data->update();
    }
    public function language($status)
    {
        $data = Generalsetting::findOrFail(1);
        $data->is_language = $status;
        $data->update();
    }
    public function currency($status)
    {
        $data = Generalsetting::findOrFail(1);
        $data->is_currency = $status;
        $data->update();
    }
    public function regvendor($status)
    {
        $data = Generalsetting::findOrFail(1);
        $data->reg_vendor = $status;
        $data->update();
    }    
}
