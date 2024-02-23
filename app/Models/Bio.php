<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Bio extends Model
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
        'id_bio',
        'hobi',
        'keahlian',
        'nik',
        'kk',
        'aktivitas',
        'pendidikan',
        'ukuran_baju',
        'riwayat_penyakit',
        'motivasi',
        'get_informasi',
    ];

    protected $primaryKey = 'id_bio';

    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'id_bio');
    }
}
