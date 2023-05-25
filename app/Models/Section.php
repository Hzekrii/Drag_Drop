<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Lesson;
class Section extends Model
{
    use HasFactory;
    public function lesson(){
        return $this->hasMany(Lesson::class);
    }
}
