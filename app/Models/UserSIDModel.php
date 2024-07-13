<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property varchar $username username
@property varchar $password password
@property int $id_grup id grup
@property int $pamong_id pamong id
@property varchar $email email
@property datetime $last_login last login
@property datetime $email_verified_at email verified at
@property tinyint $active active
@property varchar $nama nama
@property varchar $id_telegram id telegram
@property varchar $token token
@property datetime $token_exp token exp
@property datetime $telegram_verified_at telegram verified at
@property tinyint $notif_telegram notif telegram
@property varchar $company company
@property varchar $phone phone
@property varchar $foto foto
@property varchar $session session
   
 */
class UserSIDModel extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'user';

    /**
    * Mass assignable columns
    */
    protected $fillable=['session',
'username',
'id_grup',
'pamong_id',
'email',
'last_login',
'email_verified_at',
'active',
'nama',
'id_telegram',
'token',
'token_exp',
'telegram_verified_at',
'notif_telegram',
'company',
'phone',
'foto',
'session'];

    /**
    * Date time columns.
    */
    protected $dates=['last_login',
'email_verified_at',
'token_exp',
'telegram_verified_at'];




}