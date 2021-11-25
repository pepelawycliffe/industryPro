<?php

namespace App\Http\Controllers\Admin;

use Datatables;
use App\Models\Quote;
use App\Http\Controllers\Controller;

class QuoteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    //*** JSON Request
    public function datatables()
    {
          $datas = Quote::orderBy('id','desc')->get();  
         //--- Integrating This Collection Into Datatables
         return Datatables::of($datas)
   
                            ->addColumn('action', function(Quote $data) {
 
                                return '<div class="action-list"><a href="' . route('admin-quote-show',$data->id) . '" > <i class="fas fa-eye"></i> Details</a><a href="javascript:;" class="send" data-email="'. $data->email .'" data-toggle="modal" data-target="#vendorform"><i class="fas fa-envelope"></i> Send Email</a><a href="javascript:;" data-href="' . route('admin-quote-delete',$data->id) . '" data-toggle="modal" data-target="#confirm-delete" class="delete"><i class="fas fa-trash-alt"></i></a></div>';
                            }) 
                            ->rawColumns(['action'])
                            ->toJson(); //--- Returning Json Data To Client Side
    }

    public function index()
    {
        return view('admin.quotes.index');
    }

    public function show($id)
    {
        $data = Quote::findOrFail($id);
        return view('admin.quotes.details',compact('data'));
    }

    public function destroy($id)
    {
        $data = Quote::findOrFail($id);
        $data->delete();
        //--- Redirect Section     
        $msg = 'Data Deleted Successfully.';
        return response()->json($msg);      
        //--- Redirect Section Ends   
    }

}
