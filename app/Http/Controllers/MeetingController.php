<?php

namespace App\Http\Controllers;

use App\Models\UserMeeting;
use App\Models\MeetingEntry;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class MeetingController extends Controller
{

    public function index()
    {
        return view('voice_call');
    }



    public function meetingUser(){
        return view('createMeeting');
    }


    public function createMeeting()
    {
        // Récupérer les informations de réunion de l'utilisateur authentifié
        $meeting = Auth::user()->getUserMeetingInfo()->first();

        // Si aucune réunion n'existe pour cet utilisateur, en créer une nouvelle
        // if (is_null($meeting)) {
        //     $name = 'agora' . rand(1111, 9999);
        //     $meetingData = createAgoraProject($name);

        //     if (isset($meetingData->project->id)) {
        //         $meeting = new UserMeeting();
        //         $meeting->user_id = Auth::user()->id;
        //         $meeting->app_id = $meetingData->project->vendor_key;
        //         $meeting->appCertificate = $meetingData->project->sign_key;
        //         $meeting->channel = $meetingData->project->name;
        //         $meeting->uid = rand(11111, 99999);
        //         $meeting->save();
        //     } else {
        //         echo "Project not created";
        //         return;
        //     }
        // }

        if(!isset($meeting->id)){
            $name = 'agora' . rand(1111, 9999);
            $meetingData = createAgoraProject($name);

            if(isset( $meetingData->project->id)){
                $meeting = new UserMeeting();
                $meeting->user_id = Auth::user()->id;
                $meeting->app_id = $meetingData->project->vendor_key;
                $meeting->appCertificate = $meetingData->project->sign_key;
                $meeting->channel = $meetingData->project->name;
                $meeting->uid = rand(11111, 99999);
                $meeting->save();
            }else{
                echo 'Project not created';
            }
        }
        $meeting=Auth::user()->getUserMeetingInfo()->first();
        $token=createToken($meeting->app_id,$meeting->appCertificate,$meeting->channel);
        $meeting->token=$token;
        $meeting->url=generateRandomString();
        $meeting->save();

        // Récupérer les informations de réunion mises à jour
        $meeting = Auth::user()->getUserMeetingInfo()->first();
        $token = createToken($meeting->app_id, $meeting->appCertificate, $meeting->channel);
        $meeting->token = $token;
        $meeting->url = generateRandomString();
        $meeting->save();
        prx($token);

        // if(Auth::User()->id==$meeting->user_id){
        //     Session::put('meeting',$meeting->url);
        // }
        // return redirect('joinMeeting/'.$meeting->url);
    }

    public function joinMeeting($url=''){

         $meeting=UserMeeting::where('url',$url)->first();

         if(isset($meeting->id)){


            $meeting->app_id =trim($meeting->app_id);
            $meeting->appCertificate =trim($meeting->appCertificate );
            $meeting->channel = trim( $meeting->channel);
            $meeting->token = trim( $meeting->token);

            if(Auth::user()->id == $meeting->user_id){
                //meeting create

                // $this->createEntry($meeting->user_id, $random_user, $meeting->url);

            }else{
                if(!Auth::user()){
                    $random_user=rand(1111111,9999999);
                    $this->createEntry($meeting->user_id, $random_user, $meeting->url);
                }else{
                    $this->createEntry($meeting->user_id, Auth::user()->id, $meeting->url);
                }
            }
            // prx(get_defined_vars());
            return view('joinUser',get_defined_vars());

         }else{
            // meeting not exist
            // prx(get_defined_vars());
            // return view('joinUser',get_defined_vars());

         }

    }

    public function createEntry($user_id,$random_user,$url){
        $entry=new MeetingEntry();
        $entry->user_id=$user_id;
        $entry->random_user=$random_user;
        $entry->url=$url;
        $entry->status=0;
        $entry->save();


    }
}