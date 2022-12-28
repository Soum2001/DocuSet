<?php

namespace App\Http\Controllers;

use App\Mail\InvitationMail;
use App\Models\User;
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

        $user = User::select('user_type.user_type', 'users.name', 'users.address', 'users.email', 'users.Phone_no', 'users.id')
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

            'name' => $request->user_name,
            'email' => $request->email,
            'position' => $request->position,
            'url'      => "http://localhost:9000/registration_page",
        ];
        Mail::to($request->email)->send(new InvitationMail($mail_details));

        session()->put('mail', $request->otp_email);

        exit;
        if (Mail::failures()) {
            $output['dbStatus']  = 'SUCCESS';
            $output['dbMessage'] = 'Hr details added.';
        } else {
            $output['dbStatus']  = 'Failure';
            $output['dbMessage'] = 'Error occured';
        }
        return response()->json($output);
    }
}
