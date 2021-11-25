<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Generalsetting extends Model
{
    protected $fillable = ['logo', 'favicon' ,'loader','admin_loader', 'banner', 'title','header_email','header_phone', 'footer','copyright','colors','talkto','map_key','disqus','paypal_business','stripe_key','stripe_secret','currency_format','withdraw_fee','withdraw_charge','tax','shipping_cost','smtp_host','smtp_port','smtp_user','smtp_pass','from_email','from_name','order_title','order_text','service_subtitle','service_title','service_text','service_image','service_link','is_currency','price_title','price_subtitle','price_text','subscribe_success','subscribe_error','error_title','error_text','error_photo','breadcumb_banner','footer_logo','molly_key','is_molly','is_contact','is_faq','is_home','is_services','is_plans','is_projects','is_teams','is_blog','is_pages','plan_meta_key','plan_meta_description','quotes'];

    public $timestamps = false;


    public function upload($name,$file,$oldname)
    {
                $file->move('assets/images',$name);
                if($oldname != null)
                {
                    if (file_exists(public_path().'/assets/images/'.$oldname)) {
                        unlink(public_path().'/assets/images/'.$oldname);
                    }
                }  
    }
}
