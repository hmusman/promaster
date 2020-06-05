<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Session;
use Auth;
use App\Models\course;
use App\Models\tokens;
use App\Models\shared;

class shareController extends Controller
{
	public function saveCourse(Request $request){
		$request->session()->forget('cids');
		$request->session()->put('cids', $request->id);
	}
    public function linkedinShare(Request $request){
    	$token = tokens::where('user_id', Auth::id())->first();

    	if(empty($token)){
	    	try {
			    $client = new Client(['base_uri' => 'https://www.linkedin.com']);
			    $response = $client->request('POST', '/oauth/v2/accessToken', [
			        'form_params' => [
			                "grant_type" => "authorization_code",
			                "code" => $_GET['code'],
			                "redirect_uri" => env('REDIRECT_URI'),
			                "client_id" => env('CLIENT_ID'),
			                "client_secret" => env('CLIENT_SECRET'),
			        ],
			    ]);
			    $data = json_decode($response->getBody()->getContents(), true);
			    $access_token = $data['access_token']; // store this token somewhere
			    tokens::create(['user_id'=>Auth::id(), 'token'=>$access_token]);
			} catch(Exception $e) {
			    echo $e->getMessage();
			}

    	}
    	$token = tokens::where('user_id', Auth::id())->first();
    	$tokens = $token->token;
    	// dd($tokens);
		try {
		    $client = new Client(['base_uri' => 'https://api.linkedin.com']);
		    $response = $client->request('GET', '/v2/me', [
		        'headers' => [
		            "Authorization" => "Bearer " . $tokens,
		        ],
		    ]);
		    $data = json_decode($response->getBody()->getContents(), true);
		    $linkedin_profile_id = $data['id']; // store this id somewhere
		} catch(Exception $e) {
		    echo $e->getMessage();
		}

		$ids = $request->session()->get('cids');
    	// dd($ids);
    	$shared = shared::where('user_id', Auth::id())->where('course_id', $ids)->first();
    	$course = course::where('id', $ids)->first();
    	if(empty($shared)){
	    	$title = $course->course_title;
	    	$summery = $course->course_description;
	    	// dd($course->course_title, $course->course_description);
			$link = url('/');
			$access_token = $tokens;
			$linkedin_id = $linkedin_profile_id;
			$body = new \stdClass();
			$body->content = new \stdClass();
			$body->content->contentEntities[0] = new \stdClass();
			$body->text = new \stdClass();
			$body->content->contentEntities[0]->thumbnails[0] = new \stdClass();
			$body->content->contentEntities[0]->entityLocation = $link;
			$body->content->contentEntities[0]->thumbnails[0]->resolvedUrl = url("public/assets/img/promaster.png");
			$body->content->title = 'I have got new certification in '.$title;
			$body->owner = 'urn:li:person:'.$linkedin_id;
			$body->text->text = $summery;
			$body_json = json_encode($body, true);
			// dd($body_json);
			// $request->session()->forget('cids');
			try {
			    $client = new Client(['base_uri' => 'https://api.linkedin.com']);
			    $response = $client->request('POST', '/v2/shares', [
			        'headers' => [
			            "Authorization" => "Bearer " . $tokens,
			            "Content-Type"  => "application/json",
			            "x-li-format"   => "json"
			        ],
			        'body' => $body_json,
			    ]);
			 
			    if ($response->getStatusCode() !== 201) {
			        echo 'Error: '. $response->getLastBody()->errors[0]->message;
			    }
			 	shared::create(['user_id'=>Auth::id(), 'course_id'=>$ids, 'is_shared'=>1]);
			    return back()->with("message", "<div class='alert alert-success'>Post shared to linkedin Successfully!</div>");
			} catch(Exception $e) {
			    echo $e->getMessage(). ' for link '. $link;
			}

    	}else{
    		return back()->with("message", "<div class='alert alert-info'>You already shaerd this to linkedin.</div>");
    	}
    }
}
