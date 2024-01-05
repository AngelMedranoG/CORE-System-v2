<?php

namespace App\Http\Controllers\AD;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class WhatsAppController extends Controller
{
    public function verifyToken(Request $request){
        try{

            $token = $request->query();
            Log::info('Lo que llega de WhatsApp: ' . json_encode($token));
            return response()->json(['status' => 'error'], 400);
            env('WHATSAPP_TOKEN');

        }catch(\Exception $e){
            Log::error('ocurrio un verificar el token de WhatsApp: ' . $e->getMessage());
            return response()->json(['status' => 'error','errors' => $e->getMessage()], 400);
        }
    }

    public function receivedMessage(Request $request){

    }
}
