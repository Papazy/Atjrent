<?php 

return [
    'is_production' => false,  // Ubah ke true jika sudah live
    'server_key' => env('MIDTRANS_SERVER_KEY', ''),
    'client_key' => env('MIDTRANS_CLIENT_KEY', ''),
];

