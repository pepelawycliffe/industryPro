<?php

namespace App\Http\Controllers\Admin;

use Datatables;
use App\Classes\GeniusMailer;
use App\Models\Order;
use App\Models\User;
use App\Models\Generalsetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    //*** JSON Request
    public function datatables($status)
    {
        if($status == 'pending'){
            $datas = Order::where('status','=','pending')->get();
        }
        elseif($status == 'processing') {
            $datas = Order::where('status','=','processing')->get();
        }
        elseif($status == 'completed') {
            $datas = Order::where('status','=','completed')->get();
        }
        elseif($status == 'declined') {
            $datas = Order::where('status','=','declined')->get();
        }
        else{
          $datas = Order::orderBy('id','desc')->get();  
        }
         
         //--- Integrating This Collection Into Datatables
         return Datatables::of($datas)
                            ->editColumn('pay_amount', function(Order $data) {
                                return $data->currency_sign.$data->pay_amount;
                            })
                            ->addColumn('action', function(Order $data) {
                                $class = strtolower($data->status);
                                $pending = $data->status == 'pending' ? 'selected' : '';
                                $processing = $data->status == 'processing' ? 'selected' : '';
                                $completed = $data->status == 'completed' ? 'selected' : '';
                                $declined = $data->status == 'declined' ? 'selected' : '';
                                $orders = '<select class="process select data-droplinks '.$class.'">'.
'<option value="'. route('admin-order-status',['id1' => $data->id, 'status' => 'pending']).'" '.$pending.'>Pending</option>'.
'<option value="'. route('admin-order-status',['id1' => $data->id, 'status' => 'processing']).'" '.$processing.'>Processing</option>'.
'<option value="'. route('admin-order-status',['id1' => $data->id, 'status' => 'completed']).'" '.$completed.'>Completed</option>'.
'<option value="'. route('admin-order-status',['id1' => $data->id, 'status' => 'declined']).'" '.$declined.'>Declined</option>'.'</select>';
                                return '<div class="action-list"><a href="' . route('admin-order-show',$data->id) . '" > <i class="fas fa-eye"></i> Details</a><a href="javascript:;" class="send" data-email="'. $data->customer_email .'" data-toggle="modal" data-target="#vendorform"><i class="fas fa-envelope"></i> Send Email</a>'.$orders.'</div>';
                            }) 
                            ->rawColumns(['id','action'])
                            ->toJson(); //--- Returning Json Data To Client Side
    }
    public function index()
    {
        return view('admin.order.index');
    }
    public function pending()
    {
        return view('admin.order.pending');
    }
    public function processing()
    {
        return view('admin.order.processing');
    }
    public function completed()
    {
        return view('admin.order.completed');
    }
    public function declined()
    {
        return view('admin.order.declined');
    }
    public function show($id)
    {
        $order = Order::findOrFail($id);
        return view('admin.order.details',compact('order'));
    }

    public function emailsub(Request $request)
    {
        $gs = Generalsetting::findOrFail(1);
        if($gs->is_smtp == 1)
        {
            $data = [
                    'to' => $request->to,
                    'subject' => $request->subject,
                    'body' => $request->message,
            ];

            $mailer = new GeniusMailer();
            $mailer->sendCustomMail($data);                
        }
        else
        {
            $data = 0;
            $headers = "From: ".$gs->from_name."<".$gs->from_email.">";
            $mail = mail($request->to,$request->subject,$request->message,$headers);
            if($mail) {   
                $data = 1;
            }
        }

        return response()->json($data);
    }




    public function status($id,$status)
    {
        $mainorder = Order::findOrFail($id);
        if ($mainorder->status == "completed"){
        //--- Redirect Section        
        $msg = 'This Order is Already Completed';
        return response()->json($msg);      
        //--- Redirect Section Ends   

        }else{
        if ($status == "completed"){

            $gs = Generalsetting::findOrFail(1);
            if($gs->is_smtp == 1)
            {
                $data = [
                    'to' => $mainorder->customer_email,
                    'subject' => 'Your order '.$mainorder->order_number.' is Confirmed!',
                    'body' => "Hello ".$mainorder->customer_name.","."\n Thank you for shopping with us. We are looking forward to your next visit.",
                ];

                $mailer = new GeniusMailer();
                $mailer->sendCustomMail($data);                
            }
            else
            {
               $to = $mainorder->customer_email;
               $subject = 'Your order '.$mainorder->order_number.' is Confirmed!';
               $msg = "Hello ".$mainorder->customer_name.","."\n Thank you for shopping with us. We are looking forward to your next visit.";
            $headers = "From: ".$gs->from_name."<".$gs->from_email.">";
               mail($to,$subject,$msg,$headers);                
            }
        }
        if ($status == "declined"){
            $gs = Generalsetting::findOrFail(1);
            if($gs->is_smtp == 1)
            {
                $data = [
                    'to' => $mainorder->customer_email,
                    'subject' => 'Your order '.$mainorder->order_number.' is Declined!',
                    'body' => "Hello ".$mainorder->customer_name.","."\n We are sorry for the inconvenience caused. We are looking forward to your next visit.",
                ];
            $mailer = new GeniusMailer();
            $mailer->sendCustomMail($data);
            }
            else
            {
               $to = $mainorder->customer_email;
               $subject = 'Your order '.$mainorder->order_number.' is Declined!';
               $msg = "Hello ".$mainorder->customer_name.","."\n We are sorry for the inconvenience caused. We are looking forward to your next visit.";
            $headers = "From: ".$gs->from_name."<".$gs->from_email.">";
               mail($to,$subject,$msg,$headers);
            }

        }
        $stat['status'] = $status;
        $stat['payment_status'] = ucfirst($status);
        $mainorder->update($stat);
        //--- Redirect Section        
        $msg = 'Order Status Updated Successfully';
        return response()->json($msg);      
        //--- Redirect Section Ends   

        }
    }
}