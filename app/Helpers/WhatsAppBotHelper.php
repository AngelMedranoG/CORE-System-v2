<?php

namespace App\Helpers;

use App\Models\WhatsAppBotSolicitud;
use Illuminate\Support\Facades\Http;

class WhatsAppBotHelper extends WhatsAppHelper {

    static public function processRequest(WhatsAppBotSolicitud $solicitud) {

        if($solicitud->seccion === "MAIN_MENU") {

            static::processMainMenu($solicitud);
            return;
        }

    }

    static protected function processMainMenu(WhatsAppBotSolicitud $solicitud) {

        switch($solicitud->paso) {

            case 0: 

                static::sendText(
                    $solicitud->telefono, 
                    "*Hola, 👋 soy Cati* \n\n*🚨 *¿Tienes una emergencia? Comunícate inmediatamente al: \n\n*911*, \n\nEscribe en cualquier momento *menú* para ↩️ regresar a este mensaje o *adiós* 🤚🏼 para terminar el chat."
                );

                $sections = [
                    [
                        "title" => "Reportes",
                        "rows" => [
                            static::buildListSectionOption("NEW_REPORTE", "📋 General"),
                            static::buildListSectionOption("NEW_REPORTE_AMBIENTE", "🌳 Medio Ambiente"),
                        ]
                    ],
                    [
                        "title" => "Servicios",
                        "rows" => [
                            static::buildListSectionOption("PAGO_MULTAS", "👮‍♂️ Pago de multas"),
                            static::buildListSectionOption("BUSCAR_CHAMBA", "💼 Buscar chamba"),
                            static::buildListSectionOption("PAGO_PREDIAL", "📄 Pago de predial"),
                        ]
                    ],
                ];
                
                static::sendList(
                    $solicitud->telefono, 
                    $sections,
                    "Selecciona uno de los siguientes temas en los que te puedo ayudar 👇:",
                    "OPCIONES",
                );

                $solicitud->paso = 1;
                $solicitud->save();

            break;

        }
    }

}