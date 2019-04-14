<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\best_video;
use App\video;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;


class VideosController extends Controller
{
    public function getBestVideos(){
        $best_videos = best_video::all()->sortByDesc('total_rate');
        
        return view('bestVideos')->with('best_videos',$best_videos);
    }
    
    public function getVideos(){
        $videos = video::all()->sortByDesc('total_rate');
        
        return view('trending')->with('videos',$videos);
    }
    
    public function insertVideoRate(Request $request){
        DB::table('videos')->where('id','=',$request->input('id'))->increment('total_rate',$request->input('rate'));
    }
    
    public function insertVideo(Request $request){
       
        
        $backSlash='\\';
        $url_path="videos".$backSlash;
        $physical_path="C:".$backSlash."Users".$backSlash."Samsung".$backSlash."eclipse-workspace-oxygen".$backSlash."postsWebProject_laravel".$backSlash."public".$backSlash."videos".$backSlash;
        
        $MAX_VIDEOS=50;
     
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
           
     
        }else{
            echo "MAX_REACHED";
        }
        
                
             
           
        }
        
    }

