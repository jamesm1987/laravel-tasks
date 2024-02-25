<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name'];


    // Define the relationship with the Task model
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
