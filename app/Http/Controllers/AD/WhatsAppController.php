<?php

namespace App\Http\Controllers\AD;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class WhatsAppController extends Controller
{
    public function verifyToken(Request $request){
        try{

          if($request->hub_challenge != null && $request->hub_verify_token != null && $request->hub_verify_token ==  env('WHATSAPP_TOKEN')){
                 return response($request->hub_challenge);
            }

            return response()->json(['status' => 'error'], 400);

        }catch(\Exception $e){
            Log::error('ocurrio un error al verificar el token de WhatsApp: ' . $e->getMessage());
            return response()->json(['status' => 'error','errors' => $e->getMessage()], 400);
        }
    }

    public function receivedMessage(Request $request){
		Log::info('Mensaje');
		try{
			Log::info('Mensaje Recibido: ' . json_encode($request->all()));
			return response("EVENT_RECEIVED");
		}catch(\Exception $e){
            Log::error('ocurrio un error al recibir el WhatsApp: ' . $e->getMessage());
			return response("EVENT_RECEIVED");
        }
    }
}
