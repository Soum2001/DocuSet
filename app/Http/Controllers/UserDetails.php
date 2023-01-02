<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;


use App\Mail\InvitationMail;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

use Illuminate\Http\Request;

class UserDetails extends Controller
{
    function loadCandidateDetails(Request $request)
    {

        $output         = array("aaData" => array(), 'dbStatus' => '', 'recordsTotal' => 0, 'recordsFiltered' => 0);
        //echo($request->input('select_user'));
        $start          = $request->input('start');
        $limit          = $request->input('length');
        $search_arr     = $request->input('search');
        $search         = $search_arr['value'];

        $user = User::select('user_type.user_type', 'users.name', 'users.address1', 'users.email', 'users.Phone_no1', 'users.id')
            ->join('user_type', 'users.user_type_id', '=', 'user_type.id')
            ->where('user_type.user_type', '==', 'Candidate')
            ->when($request->input('user_type') != '', function ($query) use ($request) {
                return $query->where('user_type.user_type', '=', $request->input('user_type'));
            });


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

    public function mailInvitation(Request $request)
    {
        $mail_details = [
            //'subject' => 'Testing Application OTP',
            'url'      => "http://localhost:9000/registration_page/".Crypt::encryptString($request->email).'/'.Crypt::encryptString($request->user_name).'/'.Crypt::encryptString($request->position),
        ];
        Mail::to($request->email)->send(new InvitationMail($mail_details));

        session()->put('mail', $request->otp_email);

        if (Mail::failures()) {
            $output['dbStatus']  = 'Failure';
            $output['dbMessage'] = 'Error occured';
            
        } else {
            $output['dbStatus']  = 'SUCCESS';
            $output['dbMessage'] = 'Hr details added.';
        }
        return response()->json($output);
    }
    function registerCandidate(Request $request)
    {
        $decrypted_email = Crypt::decryptString($request->email);
        $decrypted_name = Crypt::decryptString($request->user_name);
        $decrypted_position = Crypt::decryptString($request->position);
        return view('registration')->with(array('name'=>$decrypted_name,'email'=>$decrypted_email,'position'=>$decrypted_position));
    }
    function submitCandidateDetails()
    {
        echo('hi');
    }
}
