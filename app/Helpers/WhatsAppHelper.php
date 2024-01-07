<?php

namespace App\Helpers;

use Exception;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class WhatsAppHelper {

    protected static $messagesUrl = 'https://graph.facebook.com/v17.0/228915206960808/messages';

    /**
     * Se utiliza para enviar un texto
     * 
     * @param string $phone Teléfono al que se envía el mensaje
     * @param string $text Es el texto del mensaje 
     * @param boolean $previewUrl Si se envía una url para previsualizar el link mandar true
     * 
     * @return string  tipo JSON
     */
    static function sendText($phone, $text, $previewUrl = false) {
        
        try {

            $response = Http::withHeaders([
                'Content-Type' => 'aplication/json',
                'Authorization' => 'Bearer ' . env('WHATSAPP_API_TOKEN'),
            ])
            ->post(static::$messagesUrl, [
                "messaging_product" => "whatsapp",
                "preview_url"       => $previewUrl,
                "recipient_type"    => "individual",
                "to"                => $phone,
                "type"              => "text",
                "text"              => [
                    "body" => $text
                ],
            ]);
            
    
            if($response->status() != 200) {

                Log::alert('[WHATSAPP HELPER] Ha ocurrido un error al intentar enviar un mensaje de texto. Status: ' . $response->status() . '. Body: ' . json_encode($response->body()));
            }
        }
        catch(Exception	$exception) {
            
            Log::error('[WHATSAPP HELPER] Ha ocurrido un error al intentar enviar un mensaje de texto. ' . $exception->getMessage());
        }
    }

      /**
     * Se utiliza para enviar una lista de máximo 10 opciones. No funciona en escritorio por el momento 04/01/2024
     * 
     * @param string $phone Teléfono al que se envía el mensaje
     * @param string $bodyText Es el texto del mensaje antes de los botones
     * @param string $btnText Es el texto del boton de la lista ejemplo: Menú
     * @param string $headerText (Opcional) Es el texto de la cabecera del mensaje
     * @param string $footerText (Opcional) Es el texto del pie de mensaje
     * @param array $sections Es el arreglo de opciones de la lista
     * 
     * @return string  tipo JSON
     */
    static function sendList($phone, $sections, $bodyText, $btnText, $headerText = "", $footerText = "") {
        
        try {

            $response = Http::withHeaders([
                'Content-Type' => 'aplication/json',
                'Authorization' => 'Bearer ' . env('WHATSAPP_API_TOKEN'),
            ])
            ->post(static::$messagesUrl, [
                "messaging_product" => "whatsapp",
                "preview_url"       => false,
                "recipient_type"    => "individual",
                "to"                => $phone,
                "type"              => "interactive",
                "interactive"       => [
                    "type"      => "list",
                    "header"    => [
                        "type"  => "text",
                        "text"  => $headerText
                    ],
                    "body"    => [
                        "text"  => $bodyText
                    ],
                    "footer"    => [
                        "text"  => $footerText
                    ],
                    "action" => [
                        "button"    => $btnText,
                        "sections"  => $sections,
                    ],
                ],
            ]);
            
    
            if($response->status() != 200) {

                Log::alert('[WHATSAPP HELPER] Ha ocurrido un error al intentar enviar una lista. Status: ' . $response->status() . '. Body: ' . json_encode($response->body()));
            }
        }
        catch(Exception	$exception) {
            
            Log::error('[WHATSAPP HELPER] Ha ocurrido un error al intentar enviar una lista. ' . $exception->getMessage());
        }
    }

    static function buildListSectionOption($optionId, $title, $description = "") {
        return [
            "id"          => $optionId,
            "title"       => $title,
            "description" => $description,
        ];
    }

     /**
     * Se utiliza para enviar hasta 3 botones por mensaje
     * 
     * @param string $phone Teléfono al que se envía el mensaje
     * @param string $bodyText Es el texto del mensaje antes de los botones
     * @param array $buttons array de los botones a enviar
     * 
     * @return string  tipo JSON
     */
    static function buildButton($phone, $bodyText, $buttons) {

        return json_encode([
            "messaging_product" => "whatsapp",
            "preview_url"       => false,
            "recipient_type"    => "individual",
            "to"                => $phone,
            "type"              => "interactive",
            "interactive"             => [
                "type" => "button",
                "body"    => [
                    "text"  => $bodyText
                ],
                "action" => [
                    "buttons"    => $buttons,
                ],
            ],
        ]);
    }

     /**
     * Se utiliza para enviar un boton de URL de llamada a la acción
     * 
     * @param string $phone Teléfono al que se envía el mensaje
     * @param string $bodyText Es el texto del mensaje antes del boton
     * @param string $btn_text texto del boton
     * @param string $btn_url url del boton
     * @param string $headerText (Opcional) Es el texto de la cabecera del mensaje
     * @param string $footerText (Opcional) Es el texto del pie de mensaje
     * 
     * @return string  tipo JSON
     */
    static function buildButtonCTA($phone, $btn_text, $btn_url, $bodyText, $headerText = '',  $footerText = '') {

        return json_encode([
            "messaging_product" => "whatsapp",
            "preview_url"       => false,
            "recipient_type"    => "individual",
            "to"                => $phone,
            "type"              => "interactive",
            "interactive"             => [
                "type" => "cta_url",
                "header"=> [
                    "type" => "text",
                    "text" => $headerText
                ],
                "body"    => [
                    "text"  => $bodyText
                ],
                "footer" =>  [
                    "text" => $footerText
                ],
                "action" => [
                    "name"          => "cta_url",
                    "parameters"    => [
                        "display_text"  => $btn_text,
                        "url"           => $btn_url
                    ]
                ],
            ],
        ]);
    }

     /**
     * Se utiliza para enviar una imagen
     * 
     * @param string $phone Teléfono al que se envía el mensaje
     * @param string $image Es el link de la imagen a enviar
     * 
     * @return string  tipo JSON
     */
    static function buildImage($phone, $image) {

        return json_encode([
            "messaging_product" => "whatsapp",
            "preview_url"       => false,
            "recipient_type"    => "individual",
            "to"                => $phone,
            "type"              => "image",
            "image"             => [
                "link" => $image
            ],
        ]);
    }

     /**
     * Se utiliza para enviar un documento
     * 
     * @param string $phone Teléfono al que se envía el mensaje
     * @param string $lidocumentk Es el link del documento a enviar
     * @param string $filename Es nombre del archivo con el que deseas enviar el documento
     * 
     * @return string  tipo JSON
     */
    static function buildDocument($phone, $document, $filename) {

        return json_encode([
            "messaging_product" => "whatsapp",
            "preview_url"       => false,
            "recipient_type"    => "individual",
            "to"                => $phone,
            "type"              => "document",
            "document"             => [
                "link"     => $document,
                "filename" => $filename
            ],
        ]);
    }

    /**
     * Se utiliza para enviar un audio
     * 
     * @param string $phone Teléfono al que se envía el mensaje
     * @param string $link Es el link del audio a enviar
     * 
     * @return string  tipo JSON
     */
    static function buildAudio($phone, $link) {

        return json_encode([
            "messaging_product" => "whatsapp",
            "preview_url"       => false,
            "recipient_type"    => "individual",
            "to"                => $phone,
            "type"              => "audio",
            "audio"             => [
                "link"     => $link,
            ],
        ]);
    }

    /**
     * Se utiliza para enviar un video
     * 
     * @param string $phone Teléfono al que se envía el mensaje
     * @param string $link Es el link del video a enviar
     * 
     * @return string  tipo JSON
     */
    static function buildVideo($phone, $link) {

        return json_encode([
            "messaging_product" => "whatsapp",
            "preview_url"       => false,
            "recipient_type"    => "individual",
            "to"                => $phone,
            "type"              => "video",
            "video"             => [
                "link"     => $link,
            ],
        ]);
    }

    /**
     * Se utiliza para enviar una ubicación con mapa
     * 
     * @param string $phone Teléfono al que se envía el mensaje
     * @param string $longitude Es la longitud de la unbicación
     * @param string $latitude Es la latitude de la unbicación
     * @param string $name (opcional) Es nombre de la ubicación
     * @param string $address (opcional) Es la dirección calle, número etc.
     * 
     * @return string  tipo JSON
     */
    static function buildLocation($phone, $longitude, $latitude, $name = "", $address = "") {

        return json_encode([
            "messaging_product" => "whatsapp",
            "preview_url"       => false,
            "recipient_type"    => "individual",
            "to"                => $phone,
            "type"              => "location",
            "location"             => [
                "longitude" => $longitude,
                "latitude"  => $latitude,
                "name"      => $name,
                "address"   => $address,
            ],
        ]);
    }

     /**
     * Se utiliza para reaccionar a un mensaje. Solo funciona en celular por el momento 04/01/2024. No puede tener más de 30 días de antigüedad el mensaje a reaccionar o estar eliminado.
     * 
     * @param string $phone Teléfono al que se envía el mensaje
     * @param string $message_id Id del mensaje a reaccionar
     * @param string $emoji es el Unicode Character del emoji a reaccionar
     * 
     * @return string  tipo JSON
     */
    static function buildReaction($phone, $message_id, $emoji) {

        return json_encode([
            "messaging_product" => "whatsapp",
            "preview_url"       => false,
            "recipient_type"    => "individual",
            "to"                => $phone,
            "type"              => "reaction",
            "reaction"              => [
                "message_id" => $message_id,
                "emoji"      => $emoji
            ],
        ]);
    }

    /**
     * Se utiliza para pedir la ubicación del usuario. Solo funciona en Celulares 04/01/2024
     * 
     * @param string $phone Teléfono al que se envía el mensaje
     * @param string $bodyText Texto del mensaje para pedir la ubicación
     * 
     * @return string  tipo JSON
     */
    static function buildRequestLocation($phone, $bodyText) {
        
        return json_encode([
            "messaging_product" => "whatsapp",
            "preview_url"       => false,
            "recipient_type"    => "individual",
            "to"                => $phone,
            "type"              => "interactive",
            "interactive"              => [
                "type" => "location_request_message",
                "body" => [
                    "text" => $bodyText
                    ],
                  "action" => [
                    "name" => "send_location"
                  ]
            ],
        ]);
    }

}

