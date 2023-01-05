<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;


use App\Mail\InvitationMail;
use App\Models\User;
use App\Models\CandidateAcademics;
use App\Models\CandidateAssetType;
use App\Models\CandidateDetails;
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
            ->where('user_type.user_type', '=', 'Candidate');
     
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

    public function mailInvitation(Request $request)
    {
        $mail_details = [
            //'subject' => 'Testing Application OTP',
            'url'      => "http://localhost:9000/registration_page/" . Crypt::encryptString($request->email) . '/' . Crypt::encryptString($request->user_name) . '/' . Crypt::encryptString($request->position),
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
        return view('registration')->with(array('name' => $decrypted_name, 'email' => $decrypted_email, 'position' => $decrypted_position));
    }
    function uploadAcademicsDetails(Request $request)
     {
    //     $files = $request->file('certificate');
    //     print_r($files);

        // $input = $request->all();
        // print_r($input);
            $count = count($request['board']);
           for($i=0 ; $i<$count ; $i++)
           {
                $candidate_academics  = new CandidateAcademics();
                
                $candidate_asset_type = new CandidateAssetType();

                if($request->class[$i] == "10th")
                {
                    $academic_type = 1;
                }
                if($request->class[$i] == "12th")
                {
                    $academic_type = 2;
                }
                if($request->class[$i] == "graduation")
                {
                    $academic_type = 3;
                }
                if($request->class[$i] == "post graduation")
                {
                    $academic_type = 4;
                }
                $candidate_academics->board  = $request->board[$i];
                $candidate_academics->passout_year  =  $request->passout_year[$i];
                $candidate_academics->percentage  =   $request->percentage[$i];
                $candidate_academics->user_id  =   Session('id');
                $candidate_academics->academics_type_id  =   $academic_type;

                if ($request->hasFile('certificate')) {
                    $candidate_asset_type = new CandidateAssetType();
                    $files = $request->file('certificate')[$i];
                    $filename = $files->getClientOriginalName();
                    $extension = $files->getClientOriginalExtension();
                    $new_file_name = $files->hashName();
                    $store_file = $files->storeAs(storage_path() . '/app/public/', $new_file_name);
                    
                    $candidate_asset_type->asset_path = $new_file_name;
                    $candidate_asset_type->asset_type = "certificate";
                    $candidate_asset_type->academics_type_id  =   $academic_type;
                    $candidate_asset_type->user_id  =   Session('id');
                    $candidate_asset_type->save();
                }
                if ($request->hasFile('marksheet')) {
                    $candidate_asset_type = new CandidateAssetType();
                    $files = $request->file('marksheet')[$i];
                    $files = $request->file('certificate')[$i];
                    $filename = $files->getClientOriginalName();
                    $extension = $files->getClientOriginalExtension();
                    $new_file_name = $files->hashName();
                    $store_file = $files->storeAs(storage_path() . '/app/public/', $new_file_name);
                    $candidate_asset_type->asset_path = $new_file_name;
                    $candidate_asset_type->asset_type = "marksheet";
                    $candidate_asset_type->academics_type_id  =   $academic_type;
                    $candidate_asset_type->user_id  =   Session('id');
                    $candidate_asset_type->save();
                }
               
                $candidate_academics->save();
                
            }
            if ($request->hasFile('resume_upload')) {
                $candidate_details    = new CandidateDetails();
                $files = $request->file('resume_upload');
                $filename = $files->getClientOriginalName();
                $extension = $files->getClientOriginalExtension();
                $new_file_name = $files->hashName();
                $store_file = $files->storeAs(storage_path() . '/app/public/', $new_file_name);
                $candidate_details->resume_path = $new_file_name;
                
            }
            if ($request->hasFile('pan_upload')) {
                
                $files = $request->file('pan_upload');
                $filename = $files->getClientOriginalName();
                $extension = $files->getClientOriginalExtension();
                $new_file_name = $files->hashName();
                $store_file = $files->storeAs(storage_path() . '/app/public/', $new_file_name);
                $candidate_details->pan_path = $new_file_name;
            }
            if ($request->hasFile('adhar_upload')) {
                 
                $files = $request->file('adhar_upload');
                $filename = $files->getClientOriginalName();
                $extension = $files->getClientOriginalExtension();
                $new_file_name = $files->hashName();
                $store_file = $files->storeAs(storage_path() . '/app/public/', $new_file_name);
                $candidate_details->adhar_path = $new_file_name;
            }
            $candidate_details->user_id = Session('id');
            $candidate_details->save();

        
        // foreach($request as $request)
        // {
        //     $candidate_details->board  = $request;
        //     $candidate_details->passout_year  =  $request->passout_year;
        //     $candidate_details->percentage  =   $request->percentage;
        //     $candidate_details->user_id  =   Session('id');
        //    $candidate_details->save();
        // }


        // $candidate_details  = new CandidateAcademics();
        // $candidate_details->board = $request->board_10th;
        // $candidate_details->board = $request->board_12th;
        // $candidate_details->board = $request->board_graduation;
        // $candidate_details->board = $request->board_pg;

    }
    function candidateDocumentPage(Request $request,$id)
    {
        session()->put('user_id', $id);
        return response()->json([
            'redirect' => url('candidateAcademicDetails')
        ]);
        // return view("candidateAcademicDetails")->render();
    }
    function fetchCandidateDocument(Request $request)
    {
        $output         = array("aaData" => array(), 'dbStatus' => '', 'recordsTotal' => 0, 'recordsFiltered' => 0);
        //echo($request->input('select_user'));
        $start          = $request->input('start');
        $limit          = $request->input('length');
        $search_arr     = $request->input('search');
        $search         = $search_arr['value'];

        $user = CandidateAcademics::select('academic_type.academic_type','candidate_academics.board', 'candidate_academics.passout_year', 'candidate_academics.percentage')
            ->join('academic_type', 'candidate_academics.academics_type_id', '=', 'academic_type.id')
            ->where('candidate_academics.user_id', '=', $request->input('user_id'));
     
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
    function candidateMarksheetPage(Request $request,$user_id,$academic_type)
    {   
        $fetch_marksheet = CandidateAssetType::select('candidate_asset_type.asset_path')
        ->where('user_id','=',$user_id)
        ->join('academic_type', 'candidate_asset_type.academics_type_id', '=', 'academic_type.id')
        ->where('asset_type','=','marksheet')
        ->where('academic_type.academic_type','=',$academic_type)
        ->get();
    
        $document = (asset('storage') . '/' . $fetch_marksheet[0]['asset_path']);
        $output   = "<img class='img-fluid pad' style='height:200px;width:400px' src=" . "$document" . ">";
        return response()->json($output);
    }
    function uploadDocument(Request $request)
    {
        $input = $request->all();
        print_r($request->hasfile('marksheet'));

        // if ($request->hasfile('marksheet_10th_file')) {
        //     $marksheet_10th_file      =   $request->file('marksheet_10th_file');
        //     $image_name =   $marksheet_10th_file->getClientOriginalName();
        //     $file_type  =   $marksheet_10th_file->getClientMimeType();
        //     $new_marksheet_10th_file = $marksheet_10th_file->hashName();

        // }
        // if ($request->hasfile('marksheet_12th_file')) {
        //     $marksheet_12th_file      =   $request->file('marksheet_12th_file');
        //     $image_name =   $marksheet_12th_file->getClientOriginalName();
        //     $file_type  =   $marksheet_12th_file->getClientMimeType();
        //     $new_marksheet_12th_file = $marksheet_12th_file->hashName();
        // }
        // if ($request->hasfile('marksheet_graduation_file')) {
        //     $marksheet_graduation_file      =   $request->file('marksheet_graduation_file');
        //     $image_name =   $marksheet_graduation_file->getClientOriginalName();
        //     $file_type  =   $marksheet_graduation_file->getClientMimeType();
        //     $new_marksheet_graduation_file = $marksheet_graduation_file->hashName();
        // }
        // if ($request->hasfile('marksheet_pg_file')) {
        //     $marksheet_pg_file      =   $request->file('marksheet_pg_file');
        //     $image_name =   $marksheet_pg_file->getClientOriginalName();
        //     $file_type  =   $marksheet_pg_file->getClientMimeType();
        //     $new_marksheet_pg_file = $marksheet_pg_file->hashName();
        // }
        // if ($request->hasfile('certificate_10th_file')) {
        //     $certificate_10th_file      =   $request->file('certificate_10th_file');
        //     $image_name =   $certificate_10th_file->getClientOriginalName();
        //     $file_type  =   $certificate_10th_file->getClientMimeType();
        //     $new_certificate_10th_file = $certificate_10th_file->hashName();
        // }
        // if ($request->hasfile('certificate_12th_file')) {
        //     $certificate_12th_file      =   $request->file('certificate_12th_file');
        //     $image_name =   $certificate_12th_file->getClientOriginalName();
        //     $file_type  =   $certificate_12th_file->getClientMimeType();
        //     $new_certificate_12th_file = $certificate_12th_file->hashName();
        // }
        // if ($request->hasfile('certificate_graduation_file')) {
        //     $certificate_graduation_file      =   $request->file('certificate_graduation_file');
        //     $image_name =   $certificate_graduation_file->getClientOriginalName();
        //     $file_type  =   $certificate_graduation_file->getClientMimeType();
        //     $new_certificate_graduation_file= $certificate_graduation_file->hashName();
        // }
        // if ($request->hasfile('certificate_pg_file')) {
        //     $certificate_pg_file      =   $request->file('certificate_pg_file');
        //     $image_name =   $certificate_pg_file->getClientOriginalName();
        //     $file_type  =   $certificate_pg_file->getClientMimeType();
        //     $new_certificate_pg_file = $certificate_pg_file->hashName();
        // }
        // if ($request->hasfile('resume')) {
        //     $resume     =   $request->file('resume');
        //     $image_name =   $resume->getClientOriginalName();
        //     $file_type  =   $resume->getClientMimeType();
        //     $new_resume = $resume->hashName();
        // }
        // if ($request->hasfile('pan')) {
        //     $pan        =   $request->file('pan');
        //     $image_name =   $pan->getClientOriginalName();
        //     $file_type  =   $pan->getClientMimeType();
        //     $new_pan = $pan->hashName();
        // }
        // if ($request->hasfile('adhar')) {
        //     $adhar      =   $request->file('adhar');
        //     $image_name =   $adhar->getClientOriginalName();
        //     $file_type  =   $adhar->getClientMimeType();
        //     $new_adhar = $adhar->hashName();
        // }
    }
}
