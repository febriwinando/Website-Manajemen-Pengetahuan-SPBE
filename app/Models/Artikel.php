<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use HasFactory;


    public function scopeFilter($query, array $filters){

        $query->when($filters['search'] ?? false, function($query, $search){
            return $query->where('judul', 'like', '%'.$search.'%')
                ->orWhere('isi', 'like', '%'.$search.'%')
                ->orWhere('nama_pendidikan', 'like', '%'.$search.'%')
                ->orWhere('instansi_pelaksana', 'like', '%'.$search.'%')
                ->orWhere('nama_penulis', 'like', '%'.$search.'%');
        });
    }

}
