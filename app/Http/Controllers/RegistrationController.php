<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    function register(Request $request)
    {
        $input = $request->all();
        //$user  = new User();
        //$user->user_type_id  =  3;
       // print_r($input);
       if(!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $request->email))
       {
            return view('registration')->with(array('message'=>'Put valid mail','failure'=>1));
       }
        $hashedPassword  = Hash::make($request->password);
        $input['password']  = $hashedPassword;
        $input['user_type_id'] = 3;
        $user = User::create($input);
      
        if ($user) {
            session()->put('id', $user['id']);
            return view('login')->with(array('success' => 1,'failure'=>0));
        }
    }
    function viewUserPage()
    {
        return view('userpage');
    }
    function loadUserDetails(Request $request)
    {
        $output         = array("aaData" => array(), 'dbStatus' => '', 'recordsTotal' => 0, 'recordsFiltered' => 0);
        $start          = $request->input('start');
        $limit          = $request->input('length');
        $search_arr     = $request->input('search');
        $search         = $search_arr['value'];
        $user   = User::select('user_type.user_type','users.name','users.address','users.email','users.Phone_no','users.id')
                ->join('user_type', 'users.user_type_id', '=', 'user_type.id');

        if ($search != "") {
            $user = $user->where(function ($user) use ($search) {
                $user->where('name', 'like', '%' . $search . '%');
                $user->orWhere('address', 'like', '%' . $search . '%');
                $user->orWhere('email', 'like', '%' . $search . '%');
            });
        }
        $record_total = $user->get();
        $totals       = count($record_total);
        $user->offset($start);
        $user->limit($limit);
        $user = $user->get();
        $record_filtered = count($user);
        $output['recordsTotal'] = $totals;
        $output['recordsFiltered'] = $record_filtered;
        header('Content-Type: application/json; charset=utf-8');

        foreach ($user as $row) {
            $output['aaData'][] = $row;
        }
        echo json_encode($output);
    }
}
