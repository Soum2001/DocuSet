<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\CandidateAcademics;
use App\Models\CandidateAssetType;
use Illuminate\Contracts\Session\Session;

use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use App\Models\UserType;

class UserListing extends Controller
{
    function register(Request $request)
    {
        $output = array('dbStatus' => '', 'dbMessage' => '');
        $input = $request->all();
        $user  = new User();
        // if (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $request->email)) {
        //     return view('registration')->with(array('message' => 'Put valid mail', 'failure' => 1));
        // }
        $hashedPassword  = Hash::make($request->password);
        $input['password']  = $hashedPassword;
        $input['user_type_id']  = 3;
        $user = User::create($input);

        if ($user) {
            session()->put('id', $user['id']);
            return view('login')->with(array('success' => 1, 'failure' => 0));
        }
    }
    function viewUserPage()
    {
        $check_user_type = User::select('user_type.user_type')
            ->join('user_type', 'user_type.id', '=', 'users.user_type_id')
            ->where('users.id', '=', Session('id'))
            ->get();
          
        foreach ($check_user_type as $row) {
            $user_type = $row->user_type;    
        }
        if ($user_type == 'Admin') {
            return view('userListing');
        } elseif ($user_type == 'Human Resource') {
            return view('userDetails');
        } elseif ($user_type == 'Candidate') {
            $candidate_academics = CandidateAcademics::select('academic_type.academic_type','candidate_academics.board', 'candidate_academics.passout_year', 'candidate_academics.percentage')
            ->join('academic_type', 'candidate_academics.academics_type_id', '=', 'academic_type.id')
            ->where('candidate_academics.user_id', '=', Session('id'))
            ->get();
           $candidate_document = CandidateAssetType::select('academic_type.academic_type','candidate_asset_type.asset_path','candidate_asset_type.asset_type','candidate_asset_type.user_id')
           ->join('academic_type', 'candidate_asset_type.academics_type_id', '=', 'academic_type.id')
           ->where('user_id','=',Session('id'))
           ->get(); 
            $count=count($candidate_academics);
            return view('candidateAcademicDetails')->with(array('count'=>$count,'candidate_academic_details'=>$candidate_academics,'document'=>$candidate_document));
        }
    }
    function loadUserDetails(Request $request)
    {

        $output         = array("aaData" => array(), 'dbStatus' => '', 'recordsTotal' => 0, 'recordsFiltered' => 0);
        echo ($request->input('user_type'));
        $start          = $request->input('start');
        $limit          = $request->input('length');
        $search_arr     = $request->input('search');
        $search         = $search_arr['value'];

        $user = User::select('user_type.user_type', 'users.name', 'users.address1', 'users.address2', 'users.email', 'users.phone_no1', 'users.phone_no2', 'users.id', 'users.city', 'users.state', 'users.zip')
            ->join('user_type', 'user_type.id', '=', 'users.user_type_id')

            ->where('user_type.user_type', '!=', 'admin')
            ->when($request->input('user_type') != '', function ($query) use ($request) {
                return $query->where('user_type.user_type', '=', $request->input('user_type'));
            });


        if ($search != "") {
            $user = $user->where(function ($user) use ($search) {
                $user->where('name', 'like', '%' . $search . '%');
                $user->orWhere('address1', 'like', '%' . $search . '%');
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
        $output = array('dbStatus' => '', 'dbMessage' => '');
        $input = $request->all();
        $user  = new User;
        $hashedPassword  = Hash::make($request->password);
        $input['password']  = $hashedPassword;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $input['user_type_id'] = 2;
        $user = User::create($input);
        if ($user) {
            $output['dbStatus']  = 'SUCCESS';
            $output['dbMessage'] = 'Hr details added.';
        } else {
            $output['dbStatus']  = 'Failure';
            $output['dbMessage'] = 'Error occured';
        }
        return response()->json($output);
    }
    public function editUserDetails(Request $request)
    {
        $output = array('dbStatus' => '', 'dbMessage' => '');
        $update_user = User::where('id', $request->user_id)
            ->update(array('name' => $request->name, 'email' => $request->email, 'address1' => $request->address1, 'address2' => $request->address2, 'phone_no1' => $request->phone_no1, 'phone_no2' => $request->phone_no2, 'city' => $request->city, 'state' => $request->state, 'zip' => $request->zip));

        if ($update_user) {
            $output['dbStatus']  = 'SUCCESS';
            $output['dbMessage'] = 'Data Updated.';
        } else {
            $output['dbStatus']  = 'FAILURE';
            $output['dbMessage'] = 'OOPS! Someting Went Wrong in Edit Operation.';
        }
        return response()->json($output);
    }
}
