<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    use HasFactory;

    //Definimos los campos creados en la base de datos
    protected $fillable = ['user_id', 'name', 'phone', 'email', 'subject', 'content', 'price'/*,'image'*/];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}