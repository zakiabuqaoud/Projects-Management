<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $fillable = [
        'name', 'type', 'userId'
    ];
    public function users()
    {
        return $this->belongsToMany(
            User::class,
            "users_projects",
            "projects",
            "developers",
            "id",
            "id"
        );
    }
    protected function scopeMyProjects(Builder $builder)
    {

        //  $userId = Auth::id();
        // dd($userId);

        //  $ids =  $this->users->developers;
        /*
        dd($ids);
        foreach ($ids as $id) {
            $builder->where($userId, $id);
        }
        */
    }
    //want the project this auth = developer in pivotTable
}
