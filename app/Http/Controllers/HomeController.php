<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\SliderImages; 

class HomeController extends Controller
{
    
  

public function emailtest(Request $request)
{
    $to_email = "hariom1gyan@gmail.com";
    Mail::raw('Heelo my name is harish gautam .', function ($message) use ($to_email) {

        $message->to($to_email)
                ->subject('Forgot password');
    });

    dd("Simple Email Sent Successfully!");
}

public function sendtexttovoice(Request $request){
    $apiKey = env('MURF_API_KEY');
    $url = 'https://api.murf.ai/v1/speech/generate';

    $postData = [
        "voiceId" => "hi-IN-ayushi",
        "style" => "Conversational",
        "text" => "देवी और सज्जनों, आपके अकाउंट में ".$request->amount." रुपये आए हैं।",
        "rate" => 0,
        "pitch" => 0,
        "sampleRate" => 48000,
        "format" => "MP3",
        "channelType" => "MONO",
        "pronunciationDictionary" => new \stdClass(),
        "encodeAsBase64" => false,
        "variation" => 1,
        "audioDuration" => 0,
        "modelVersion" => "GEN2",
        "multiNativeLocale" => "hi-IN"
    ];

    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => json_encode($postData),
        CURLOPT_HTTPHEADER => [
            'Content-Type: application/json',
            'Accept: application/json',
            'api-key: ' . $apiKey,
        ],
    ]);

    $response = curl_exec($curl);
    $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    $curlError = curl_error($curl);

    //    dd($response);
    curl_close($curl);

    if ($curlError) {
        return response()->json(['error' => $curlError], 500);
    }

    $responseData = json_decode($response, true);
    // dd($responseData);

    if (isset($responseData['audioFile'])) {
        return response()->json([
            'success' => true,
            'audioFile' => $responseData['audioFile']
        ]);
    } else {
        return response()->json(['error' => 'Audio file not found'], 500);
    }
 
}
public function textToVoice()
{

    return view('speach');
    
}




    /* Home  page */
    public  function hs_getindex(Request $request){  
        $slider=SliderImages::where('status',1)->get(); 
        return view('index',['slider_image'=>$slider]);
            
    }

  /* About us page */

    public function hs_getabout(Request $request){

           return view('about_us');
    }

    /* Contact us page */
    public function hs_getcontact(Request $request){
        return view('contact');
     }

 /* online service us page */
     public function hs_onlineservice(Request $request){
    
      $services = [
        ['name' => 'PF Filing', 'description' => 'Help with Provident Fund Filing' ,'link_text1'=>'EPFO','link_url1'=>'Balance check'],
        ['name' => 'ITR Filing', 'description' => 'Assistance with Income Tax Returns'],
        ['name' => 'Testing', 'description' => 'Testing of this'],
        // Add more services as needed
    ];

    return view('online', compact('services'));
}

     }
  

