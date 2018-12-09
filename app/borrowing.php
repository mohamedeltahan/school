<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class borrowing extends Model
{
    $fillable = ['student_id' , 'book_id' , 'end_date'];
}
