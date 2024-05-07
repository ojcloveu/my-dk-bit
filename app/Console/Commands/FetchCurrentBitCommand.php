<?php

namespace App\Console\Commands;

use App\Models\Betting;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class FetchCurrentBitCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:fetch-current-bit-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // while (true) {
            $url = 'https://dk666.tv/company/current_bet/get';
            $cookie = 'PHPREFS=full; XSRF-TOKEN=eyJpdiI6IkkwNVlDZjY2cnB2SE0wRlNDYnhyQ2c9PSIsInZhbHVlIjoic1V3ZTFyb0JiaFNjRHcwWnVwUVBLbTdDNzY4YkV0R0p5ZnJqTlBlaE1ZRWN3Z1JmZWpMTEt2d2tuUllvMGNoUCIsIm1hYyI6ImViNGE1MDU4MGI2ZTZmMjYzNWIwNGUzNjhkYmZmNDcyZTY5YzRlOGRkNzFjNzg2NjE5NjU0MjljMDMxNWFlNjQifQ%3D%3D; dk666_session=eyJpdiI6IktQejVYWG43TWtUa0tYcUtmQ25vcFE9PSIsInZhbHVlIjoiYktxWkh0NHR1S2NuQUFUMFdrQlFxeVZaUlIzZjRZNUY0ZDlPbTk3andidVdtZGpmcGVYVkFyTTF1VFNua25SbyIsIm1hYyI6IjlkMTcyYThkNzY2ZTc5MjU5YzJiOWE1YTMwODA4OGZmMTljM2FkYzhjYTBhNjBlNDdmYjQzNDM4ODllNTY4MTQifQ%3D%3D; Im1SVy1PfA7N2NwRKRuhArAxnumaYdjbeNExrxZk=eyJpdiI6InFGYWdvSml4M0N3VDFONmRvUU5xb2c9PSIsInZhbHVlIjoiQUkzOW1weWd0TmxNbVFDWXRndlwvcVFiS25nYzV6ckttU25JUmIyWWJPMUxjNWJcLzh4ZG9KajI5bFR0WlZJeFdLRjNHUEtON25jZ2plNzZYZmZycE8xbklXYlJBNVMrVHZ0RVRzTklZXC9qT3VIM2s4YnFhK0RjcUE3QngxWElVUnRVZ0hQRlV5cUVtcTMyRUltXC96OWU0ZjFpYnUxaFJKVUl0NzNWcWpUYTlXTHJEZldOZXNpQ2FlVXVPYXU5K3RcL1lqXC9oRThoNEN2VnFZMW1POVRpQ21CM0s0bkFrdkF2XC9qRTNPNk1aRkpOT0Q5Z0JGT051QjJlcXR6MGRrV0JcLzJDUzUrRE9pK0RxV0FEdnRtQ2ZBazkxS1V4d0EwUGZTMFUwNzFncVRUcDdQb00zYklXRFJ1WGtxZVdValdsTmJcL1R1b0dybDdkWmxZNzk5eTRSZkpnS1pYYzRcL0FcL2dNOUZ3MWxJV3hNN04xT3hwNVZicW5DaGgwanVZeTd2eGxhR3dwZ2RkVXNES21vT0Y5U0dCUHh1MlRFQlVSZU1WaGFWMVE5blNWYTFzNUk5MkZGN3hKQUYwcnZcL3NQNlwvd3ZCaEdtRWlQY3pxZDV2KzcxWHd1TGp5dlN3PT0iLCJtYWMiOiJkMTQ2YTY3YjZkODgxMTA3N2EwYjM4ZDY3YjYzZDI5NTM2YWEzOTRkMDIwZDA5ZGNkZmIxZGZhYzRlMTE2NmI1In0%3D';
            $x_csrf_token = 'uH9EPqPisoDtQ13cmfy3MLq60whGNAyUMeYQemT4';
            $data = [
                // 'draw' => '21',
                // 'columns[0][data]' => 'DT_RowIndex',
                // 'columns[0][name]' => '',
                // 'columns[0][searchable]' => 'true',
                // 'columns[0][orderable]' => 'true',
                // 'columns[0][search][value]' => '',
                // 'columns[0][search][regex]' => 'false',
                // Add more data fields as needed
            ];

            $response = Http::withHeaders([
                'accept' => 'application/json, text/javascript, */*; q=0.01',
                'accept-language' => 'en-US,en;q=0.9',
                'content-type' => 'application/x-www-form-urlencoded; charset=UTF-8',
                'cookie' => $cookie,
                    'origin' => 'https://dk666.tv',
                    'priority' => 'u=1, i',
                    'referer' => 'https://dk666.tv/company/current_bet/index',
                    'sec-ch-ua' => '"Chromium";v="124", "Google Chrome";v="124", "Not-A.Brand";v="99"',
                    'sec-ch-ua-mobile' => '?0',
                    'sec-ch-ua-platform' => '"macOS"',
                    'sec-fetch-dest' => 'empty',
                    'sec-fetch-mode' => 'cors',
                    'sec-fetch-site' => 'same-origin',
                    'user-agent' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36',
                    'x-csrf-token' => $x_csrf_token,
                    'x-requested-with' => 'XMLHttpRequest',
                ]
            )->post($url, $data);




            if ($response->successful()) {
                $responseBody = $response->json();
                $arr = [];
                foreach ($responseBody['data'] as $item) {
                    array_push($arr,[
                        'account_id' => $item['login_id'],
                        'ticket_number' => $item['id'],
                        'time' => $item['created_at'],
                        'date' => date('Y-m-d'),
                        'fighting_number' => $item['game_number'],
                        'bit_type' => $item['bet_type'],
                        'amount' => $item['bet_amount'],
                        'rate' => $item['payout']
                    ] );
                }
                Betting::upsert($arr,['accountt_id','date','bit_type','fighting_number'],['amount']);
                var_dump(  $responseBody['data']);
            
            } else {
                echo 'Error: ' . $response->status();
            }
            echo 1;
        
        
    }
}
