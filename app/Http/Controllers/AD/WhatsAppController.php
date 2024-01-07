<?php

namespace App\Http\Controllers\AD;

use App\Helpers\WhatsAppBotHelper;
use App\Http\Controllers\Controller;
use App\Models\WhatsAppBotSolicitud;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class WhatsAppController extends Controller {

    public function verifyToken(Request $request) {

        try{

            if($request->hub_challenge != null && $request->hub_verify_token != null && $request->hub_verify_token ==  env('WHATSAPP_TOKEN')){
            
                Log::info('Token WhatsApp verificado');     
                return response($request->hub_challenge);
            }

            Log::error('Token WhatsApp NO verificado');
            return response()->json(['status' => 'error'], 400);

        }catch(Exception $e){

            Log::error('Ocurrió un error al verificar el token de WhatsApp: ' . $e->getMessage());
            return response()->json(['status' => 'error','errors' => $e->getMessage()], 400);
        }
    }

    public function receivedMessage(Request $request){

		try{

            $message = $request->entry[0]['changes'][0]['value']['messages'][0];

            $solicitud = WhatsAppBotSolicitud::where('telefono', $message['from'])->first();

            if($solicitud == null) {
                $solicitud = new WhatsAppBotSolicitud();
                $solicitud->telefono = $message['from'];
                $solicitud->seccion  = "MAIN_MENU";
                $solicitud->paso     = 0;
                $solicitud->fecha_solicitud = Carbon::now();
                $solicitud->save();
            }

            WhatsAppBotHelper::processRequest($solicitud);


			return response("EVENT_RECEIVED");
		}catch(Exception $e){

            Log::error('Ocurrió un error al recibir el WhatsApp: ' . $e->getMessage());
			return response("EVENT_RECEIVED");
        }
    }
}
