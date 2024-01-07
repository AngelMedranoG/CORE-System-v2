<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WhatsAppBotSolicitud extends Model {

    use HasFactory, SoftDeletes;

    protected $table = 'whatsapp_bot_solicitudes';

}
