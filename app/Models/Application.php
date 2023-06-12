<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Application extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    public static function generateAttachmentFileName()
    {
        $fileName = Str::random();
        while (self::where('attachment', $fileName)->first()) {
            self::generateAttachmentFileName();
        }

        return $fileName;
    }
}
