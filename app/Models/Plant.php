<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plant extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function scopeFilters($query, array $filters){
        if(isset($filters['search']) ? $filters['search'] : false){
            $query->where('name', 'like', '%'.$filters['search'].'%')
                ->orWhere('code_plant', 'like', '%'.$filters['search'].'%')
                ->orWhere('type', 'like', '%'.$filters['search'].'%')
                ->orWhere('growth', 'like', '%'.$filters['search'].'%')
                ->orWhere('notes', 'like', '%'.$filters['search'].'%');
        }
    }
}
