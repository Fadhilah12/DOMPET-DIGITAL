<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    use HasFactory;
    protected $fillabe = ['kategorikeluar','user','saldokeluar'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function pengeluaran(){
        return $this->belongsTo(Pengeluaran::class);
    }
    public function kategorikeluar()
    {
        return $this->belongsTo(Kategorikeluar::class);
    }
    public function saldokeluar()
    {
        return $this->belongsTo(Saldokeluar::class, 'user_id', 'id');
    }
}
