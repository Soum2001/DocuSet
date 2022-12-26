<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\HRTable;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;


class UserListing extends Controller
{
    function register(Request $request)
    {
        $input = $request->all();
        //$user  = new User();
        //$user->user_type_id  =  3;
        // print_r($input);
        // if (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $request->email)) {
        //     return view('registration')->with(array('message' => 'Put valid mail', 'failure' => 1));
        // }
        $hashedPassword  = Hash::make($request->password);
        $input['password']  = $hashedPassword;
        $input['user_type_id'] = 3;
        $user = User::create($input);

        if ($user) {
            session()->put('id', $user['id']);
            return view('login')->with(array('success' => 1, 'failure' => 0));
        }
    }
    function viewUserPage()
    {
        return view('userListing');
    }
    function loadUserDetails(Request $request)
    {
       
        $output         = array("aaData" => array(), 'dbStatus' => '', 'recordsTotal' => 0, 'recordsFiltered' => 0);
        //echo($request->input('select_user'));
        $start          = $request->input('start');
        $limit          = $request->input('length');
        $search_arr     = $request->input('search');
        $search         = $search_arr['value'];

        $user = HRTable::select('user_type.user_type', 'hr_table.name', 'hr_table.address', 'hr_table.email', 'hr_table.Phone_no', 'hr_table.id')
            ->join('user_type', 'hr_table.user_type_id', '=', 'user_type.id')
            ->when($request->input('select_user') != '', function ($query) use ($request) {
                return $query->where('user_type.user_type', '=', $request->input('select_user'));
            });
        print_r($user);    

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
    function submitHrDetails(Request $request)
    {
    
    
        $user             = new HRTable;
        $user->name           = $request->user_name;
        $user->email          = $request->email;
        $user->address        = $request->address;
        $user->phone_no       = $request->phn_no;
        $user->user_type_id      = 2;
        if ($user->save()) {
            $output['dbStatus']  = 'SUCCESS';
            $output['dbMessage'] = 'Hr details added.';
        } else {
            $output['dbStatus']  = 'Failure';
            $output['dbMessage'] = 'Error occured';
        }
    }
}
