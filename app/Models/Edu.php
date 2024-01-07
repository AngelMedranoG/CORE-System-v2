<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Edu extends Model {

    use HasFactory, SoftDeletes;

    protected $table = 'edus';

    public function getCreatedAtFormatted() {
        
        return Carbon::parse($this->created_at)->format('d/m/Y H:i');
    }

}
