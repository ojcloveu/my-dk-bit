<?php

use App\Models\Betting;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::post('/a', function () {
   // Retrieve all POST request data
   $postData = request()->all();


   foreach ($postData as $pd){
    $bet = new Betting;

    $bet->account_id = $pd[3];
    $bet->ticket_number = $pd[0];
    $bet->time = $pd[1];
    $bet->date = $pd[0];
    $bet->fighting_number = $pd[4];
    $bet->bit_type = $pd[5];
    $bet->amount = $pd[7];
    $bet->rate = $pd[8];
 
    $bet->save();
   }






   // Do something with the data
   // For example, you can log it
   \Log::info('All POST request data:', $postData);

   // Return a response
   return response()->json(['message' => 'Data received successfully']);
});

Route::get('/a', function () {
   
});
