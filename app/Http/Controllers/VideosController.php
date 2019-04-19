<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\best_video;
use App\video;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\lastUploadDateUser;


class VideosController extends Controller
{
    public function getBestVideos(){
        
        if (Auth::check()){
            $best_videos = best_video::orderBy('total_rate','DESC')->Paginate(10);;
            
            return view('bestVideos')->with('best_videos',$best_videos);
        }else{
            return view('signin');
        }
    }
    
    public function getVideos(){
        
        if (Auth::check()){
            $videos = video::orderBy('total_rate','DESC')->Paginate(10);
            
            
            return view('trending')->with('videos',$videos);
        }else{
            return view('signin');
        }
    }
    
    public function insertVideoRate(Request $request){
        DB::table('videos')->where('id','=',$request->input('id'))->increment('total_rate',$request->input('rate'));
    }
    
    public function insertVideo(Request $request){
       
        
        //$url_path="videos".$backSlash;
        //$physical_path="C:".$backSlash."Users".$backSlash."Samsung".$backSlash."eclipse-workspace-oxygen".$backSlash."postsWebProject_laravel".$backSlash."public".$backSlash."videos".$backSlash;
        $url_path = env("URL_PATH", "videos\\");
        $physical_path=env("PHYSICAL_PATH", "C:\\Users\\Samsung\\eclipse-workspace-oxygen\\postsWebProject_laravel\\public\\videos\\");
        $MAX_VIDEOS=50;
        
        //First we need to compare the last upload date with the date of today
        
        
        
    
        if (DB::table('lastUploadDateUsers')->where('user',Auth::user()->name)->exists()){
            $lastUploadDate = new Carbon(DB::table('lastUploadDateUsers')->where('user',Auth::user()->name)->value('lastUploadDate'));
             
        }else{
            $lastUploadDate=null;
        }
        
        $now = Carbon::now();
        if ($lastUploadDate!=null && $lastUploadDate->diff($now)->days==0){
        
            return 'You already uploaded a video today';
            
            
        
        }else{
            if (video::all()->count() < $MAX_VIDEOS){
                
                $file = $request->file('videoFile');
                
                
                $name = $file->getClientOriginalName();
                
                
                $file->move($physical_path,$name);
                
                DB::table('videos')->insert(
                    [    'url' => $url_path.$name,
                        'path' => $physical_path.$name,
                        'video_type' => $file->getClientMimeType(),
                        'total_rate' => '0',
                        'uploadDate' => Carbon::now()
                        
                        
                    ]
                    );
                
                if (!DB::table('lastUploadDateUsers')->where('user',Auth::user()->name)->exists()){
                    DB::table('lastUploadDateUsers')->insert(
                        ['user' => Auth::user()->name,
                         'lastUploadDate' => Carbon::now()]
                        );
                }else{
                    DB::table('lastUploadDateUsers')->where('user',Auth::user()->name)->update(
                        [
                            'lastUploadDate' => Carbon::now()]
                        );
                }
                
                
                return 'Video successfully uploaded!';
                
            }else{
                return 'You reached the maximum amount of videos in this server';
            }
           
        }
             
           
        }
        
    }

