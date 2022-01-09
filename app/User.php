
    <?php


use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable

    {

    protected $fillable = [

        'name', 'email', 'password', 'is_admin', 'role_id'
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getIsAdminAttribute()
    {
        return $this->role_id == 2;
    }

    public function getIsPublisherAttribute()
    {
        return $this->role_id == 3;
    }

}