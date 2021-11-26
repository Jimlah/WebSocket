<?php
namespace App\Models;


use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WebConfig extends Model
{
    use HasFactory, Uuid;

    public $incrementing = false;

    protected $keyType = 'uuid';

    protected $fillable = [
        'id',
        'name',
        'key',
        'secret',
        'enable_client_messages',
        'enable_statistics',
    ];
}
