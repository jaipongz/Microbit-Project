<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Albums;
use App\Models\CRUD;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use Symfony\Component\Console\Input\Input;

use function Laravel\Prompts\text;

class AlbumsController extends Controller
{
    public function index()
    {
        // dd($_REQUEST);
        $albums = new Albums();
        $user = $_REQUEST['user'];
        return view("albums.index", ['albums' => $albums], ['user' => $user]);
    }

    public function store(Request $request)
    {
        $albums = new Albums();
        $user_id = $request->user_id;
        $file = $request->image;
        $filename = date('YmdHi') . $file->getClientOriginalName();
        $file->move(public_path('public/Image'), $filename);
        $albums->image = $filename;
        $albums->id = $user_id;
        $albums->save();
        $id = $albums->id;

        return redirect()->route('albums.show', compact('id'));




    }

    public function show($id)
    {
        // dd($id);
        $albums = Albums::all();
        return view('albums.show', compact('albums'));
    }

    public function prompt(Request $request)
    {
        // dd($request->input());

        $payload = [
            "key" => "",
            "prompt" => "a circle logo, dog logo, reallistic",
            "negative_prompt" => "",
            "width" => "512",
            "height" => "512",
            "samples" => "5",
            "num_inference_steps" => "20",
            "seed" => null,
            "guidance_scale" => 7.5,
            "safety_checker" => "yes",
            "multi_lingual" => "no",
            "panorama" => "no",
            "self_attention" => "no",
            "upscale" => "no",
            "embeddings_model" => null,
            "webhook" => null,
            "track_id" => null
        ];

        $curl = curl_init();

        curl_setopt_array(
            $curl,
            array(
                CURLOPT_URL => 'https://api.wizmodel.com/sdapi/v1/txt2img',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => json_encode($payload),
                CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/json',
                    'Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpYXQiOjE3MDYzNjA5NzksInVzZXJfaWQiOiI2NWI1MDAyZDk1ZmU2M2U3ZjRhZDk4MzQifQ.5Yh4f-3na-nvVHHk1_dkixbaoz37UIn76encttTbkh4'
                ),
            )
        );

        $response = curl_exec($curl);

        curl_close($curl);
        // echo($response);
        $data = json_decode($response, true);
        $img = $data['images'];
        $st_img = json_encode($img);

        $st_img2 = implode('', $img);

        // dd($st_img2);
        $decode = base64_decode($st_img2);
        // echo($decode);

        // dd($decode);
        // dd($data);

        // $img = $data['images'];
        // dd($img);

        // Set the file path where you want to save the image
        $filePath = 'public\public';

        // Save binary data to a file
        file_put_contents($filePath, $decode);

        // Display the image in an HTML img tag
        // echo '<img src="' . $filePath . '" alt="Decoded Image">';

        return view('albums.get',compact('filePath'));

    }
}

