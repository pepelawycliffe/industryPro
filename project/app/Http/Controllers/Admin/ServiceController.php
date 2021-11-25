<?php

namespace App\Http\Controllers\Admin;

use Datatables;
use App\Models\Service;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Validator;

class ServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    //*** JSON Request
    public function datatables()
    {
         $datas = Service::orderBy('id','desc')->get();
         //--- Integrating This Collection Into Datatables
         return Datatables::of($datas)
                            ->editColumn('photo', function(Service $data) {
                                $photo = $data->photo ? url('assets/images/services/'.$data->photo):url('assets/images/noimage.png');
                                return '<img src="' . $photo . '" alt="Image">';
                            })
                            ->editColumn('title', function(Service $data) {
                                $title = strlen(strip_tags($data->title)) > 250 ? substr(strip_tags($data->title),0,250).'...' : strip_tags($data->title);
                                return  $title;
                            })
                            ->addColumn('action', function(Service $data) {
                                return '<div class="action-list"><a data-href="' . route('admin-service-edit',$data->id) . '" class="edit" data-toggle="modal" data-target="#modal1"> <i class="fas fa-edit"></i>Edit</a><a href="javascript:;" data-href="' . route('admin-service-delete',$data->id) . '" data-toggle="modal" data-target="#confirm-delete" class="delete"><i class="fas fa-trash-alt"></i></a></div>';
                            }) 
                            ->rawColumns(['photo', 'action'])
                            ->toJson(); //--- Returning Json Data To Client Side
    }

    //*** GET Request
    public function index()
    {
        return view('admin.service.index');
    }

    //*** GET Request
    public function create()
    {
        $cats = Category::all();
        return view('admin.service.create',compact('cats'));
    }

    //*** POST Request
    public function store(Request $request)
    {
        //--- Validation Section
        $rules = [
            'slug' => 'unique:services'
             ];

     $validator = Validator::make(Input::all(), $rules);
     
     if ($validator->fails()) {
       return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
     }
     //--- Validation Section Ends

        //--- Logic Section
        $data = new Service();
        $input = $request->all();

        if ($request->is_featured == ""){
            $input['is_featured'] = 0;
        }
        else {
                $input['is_featured'] = 1;
                //--- Validation Section
                $rules = [
                    'photo' => 'required|mimes:jpeg,jpg,png,svg'
                        ];
                $customs = [
                    'photo.required' => 'Icon is required.',
                    'photo.mimes' => 'Icon Type is Invalid.'
                        ];
                $validator = Validator::make(Input::all(), $rules, $customs);

                if ($validator->fails()) {
                return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
                }
                //--- Validation Section Ends
                if ($file = $request->file('photo'))
                {
                   $name = time().$file->getClientOriginalName();
                   $file->move('assets/images/services',$name);
                   $input['photo'] = $name;
                }
        }

        $data->fill($input)->save();
        //--- Logic Section Ends

        //--- Redirect Section        
        $msg = 'New Data Added Successfully.';
        return response()->json($msg);      
        //--- Redirect Section Ends    
    }

    //*** GET Request
    public function edit($id)
    {
        $cats = Category::all();
        $data = Service::findOrFail($id);
        return view('admin.service.edit',compact('data','cats'));
    }

    //*** POST Request
    public function update(Request $request, $id)
    {

        //--- Validation Section
        $rules = [
            'slug' => 'unique:services,slug,'.$id
             ];

     $validator = Validator::make(Input::all(), $rules);
     
     if ($validator->fails()) {
       return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
     }
     //--- Validation Section Ends

        //--- Logic Section
        $data = Service::findOrFail($id);
        $input = $request->all();

        if ($request->is_featured == ""){
            $input['is_featured'] = 0;
        }
        else {
                $input['is_featured'] = 1;
                //--- Validation Section
                $rules = [
                    'photo' => 'mimes:jpeg,jpg,png,svg'
                        ];
                $customs = [
                    'photo.required' => 'Icon is required.',
                    'photo.mimes' => 'Icon Type is Invalid.'
                        ];
                $validator = Validator::make(Input::all(), $rules, $customs);

                if ($validator->fails()) {
                return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
                }
                //--- Validation Section Ends
                if ($file = $request->file('photo'))
                {
                   $name = time().$file->getClientOriginalName();
                   $file->move('assets/images/services',$name);
                   $input['photo'] = $name;
                }
        }



        $data->update($input);
        //--- Logic Section Ends

        //--- Redirect Section     
        $msg = 'Data Updated Successfully.';
        return response()->json($msg);      
        //--- Redirect Section Ends            
    }

    //*** GET Request Delete
    public function destroy($id)
    {
        $data = Service::findOrFail($id);
        //If Photo Doesn't Exist
        if($data->photo == null){
            $data->delete();
            //--- Redirect Section     
            $msg = 'Data Deleted Successfully.';
            return response()->json($msg);      
            //--- Redirect Section Ends     
        }
        //If Photo Exist
        if (file_exists(public_path().'/assets/images/services/'.$data->photo)) {
            unlink(public_path().'/assets/images/services/'.$data->photo);
        }
        $data->delete();
        //--- Redirect Section     
        $msg = 'Data Deleted Successfully.';
        return response()->json($msg);      
        //--- Redirect Section Ends     
    }
}