<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\best_video;
use App\video;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\lastUploadDateUser;
use PHPUnit\Util\Json;
use App\votedVideo;
use Symfony\Component\Console\Helper\Table;


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
    
    public function searchTrending(Request $request){
        
        if (Auth::check()){
            
            
            $videos = DB::table('videos')->where('title', 'like', '%' . $request->input('searchText') . '%')->orderBy('total_rate','DESC')->Paginate(10);
            
            return view('trending')->with('videos',$videos);
            
        }else{
            return view('signin');
        }
    }
    
    
    public function searchTop(Request $request){
        
        if (Auth::check()){
            
            
            $best_videos = DB::table('best_videos')->where('title', 'like', '%' . $request->input('searchText') . '%')->orderBy('total_rate','DESC')->Paginate(10);
            
            return view('bestVideos')->with('best_videos',$best_videos);
            
        }else{
            return view('signin');
        }
    }
    
    
    
    public function insertVideoRate(Request $request){
        
        $votedIds = DB::table('votedVideos')->where('user',Auth::user()->name)->pluck('idVideo')->toArray();
        
        if (!in_array($request->input('id'),$votedIds)){
        
            DB::table('videos')->where('id','=',$request->input('id'))->increment('total_rate',$request->input('rate'));
            
            DB::table('votedVideos')->insert(
                ['user' => Auth::user()->name,
                    'idVideo' =>$request->input('id') ]
                );
            
            
            return "Your vote is registered!";
        }else{
            
            
            return "You already voted for this video";
        }
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
        
            //return view('upload')->with('status','You already uploaded a video today');
            return response()->json([
                'status' => 'You already uploaded a video today',
                'errors' => []
            ]);
            
        
        }else{
            if (video::all()->count() < $MAX_VIDEOS){
                
                $data=Input::all();
                
                // Build the validation constraint set.
                $rules = array(
                    'title'   => 'required|min:5|max:70',
                    'videoFile'      => 'required|max:130000|mimetypes:video/quicktime,video/mp4'
                    
                );
                
                // Create a new validator instance.
                $validator = Validator::make($data, $rules);
                
                if ($validator->passes()) {
                    
                
                
                
                $title = $request->input('title');
                
                $file = $request->file('videoFile');
                
                
                $name = $file->getClientOriginalName();
                
                
                $file->move($physical_path,$name);
                
                DB::table('videos')->insert(
                    [    'url' => $url_path.$name,
                        'path' => $physical_path.$name,
                        'video_type' => $file->getClientMimeType(),
                        'total_rate' => '0',
                        'uploadDate' => Carbon::now(),
                        'title' => $title,
                        'user' => Auth::user()->name
                        
                        
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
                
                
                //return view('upload')->with('status','Video successfully uploaded!');
              
                
                return response()->json([
                    'status' => 'Video successfully uploaded!',
                    'errors' => []
                ]);
                
                }else{
                    
                    //return  view('upload')->withErrors($validator);
                    
                    return response()->json([
                        'status' => '',
                        'errors' => $validator->errors()
                    ]);
                }
            }else{
                //return view('upload')->with('status','You reached the maximum amount of videos in this server');
                return response()->json([
                    'status' => 'You reached the maximum amount of videos in this server',
                    'errors' => []
                ]);
            }
           
        }
             
           
        }
        
    }

