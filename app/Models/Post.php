<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'text',
        'name',
        // 'path'
    ];

    public function user()
    {
        #Foreign key definicija.
        return $this->belongsTo(User::class);
    }

    #Used by the edit method as well.
    public function allowDelete($user_id)
    {
        //Metoda se koristi u PostController i provjerava pripada li trenutacna
        //korisnicka instanca korisniku koji je ulogiran.
        if ($this->user->id == $user_id)
        {
            // echo "This post can be deleted.";
            return true;
        }else
        {
            // echo "This post doesn't belong to this user";
            return false;
        }
    }
}
