<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model {
    use HasFactory;

    protected $fillable = ['attempt_id','question_id','given_answer','is_correct'];
}
