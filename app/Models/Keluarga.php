<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Keluarga extends Model
{
    use HasFactory;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->{$model->getKeyName()} = Uuid::uuid4()->toString();
        });
    }

    protected $fillable = [
        'id',
        'id_keluarga',
        'hubungan_keluarga',
        'nama_lengkap',
        'tempat_lahir',
        'tgl_lahir',
        'alamat',
        'pekerjaan',
        'penghasilan_bulanan',
    ];

    protected $primaryKey = 'id_keluarga';

    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'id_keluarga');
    }
}
