<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

    const USUARIO_VERIFICADO = '1';
    const USUARIO_NO_VERIFICADO = '0';

    const USUARIO_ADMINISTRADOR = 'true';
    const USUARIO_REGULAR = 'false';

    const TIPO_ADMINISTRADOR = 'administrador';
    const TIPO_JEFEZONAL = 'jefe zonal';
    const TIPO_OTROS = 'otros';

    protected $table = 'users';
    protected $dates = ['deleted_at'];//se realiza por el softdeleted

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'tipo_usuario',
        'dni',
        'password',
        'verified', 
        'verification_token',
        'admin', 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'verification_token',
    ];

    // Creando mutadores para guardar la información en minusculas
    public function setNameAttribute($valor){
        $this->attributes['name'] = strtolower($valor);
    }
    
    // Creando mutadores para guardar la información en minusculas
    public function setEmailAttribute($valor){
        $this->attributes['email'] = strtolower($valor);
    }

    // Creando accesor para visualizar la información en el postman
    public function getNameAttribute($valor){
        //return ucfirst($valor); Cambia a mayuscula la Primera letra de la frase
        return ucwords($valor); //Cambia a mayuscula la Primera letra de cada palabra
    }

    public function esVerificado()
    {
        return $this->verified == User::USUARIO_VERIFICADO;
    }

    public function esAdministrador()
    {
        return $this->admin == User::USUARIO_ADMINISTRADOR;
    }

    public static function generarVerificationToken()
    {
        return str_random(40);
    }   

    public function esTipoAdministrador()
    {
        return $this->tipo_usuario == User::TIPO_ADMINISTRADOR;
    }

    public function esTipoJefeZonal()
    {
        return $this->tipo_usuario == User::TIPO_JEFEZONAL;
    }

    public function esTipoOtros()
    {
        return $this->tipo_usuario == User::TIPO_OTROS;
    }    

}
