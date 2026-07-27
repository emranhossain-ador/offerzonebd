<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\AddBalance;
use App\Models\BillPayment;
use App\Models\BrilliantRecharge;
use App\Models\MobileRecharge;
use App\Models\OrderList;
use App\Models\UserSaveNumber;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

#[Fillable(['name', 'email', 'username', 'phone', 'balance', 'images', 'status', 'google_id', 'password'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


    protected $table = 'users';
    protected $fillable = [
        'name',
        'email',
        'username',
        'phone',
        'balance',
        'images',
        'status',
        'google_id',
        'password',
    ];


    public function addBalances()
    {
        return $this->hasMany(AddBalance::class, 'user_id');
    }


    public function OrderList(){
        return $this->hasMany(OrderList::class, 'user_id');
    }


    public function mobileRecharges()
    {
        return $this->hasMany(MobileRecharge::class, 'user_id');
    }


    public function brilliantRecharges()
    {
        return $this->hasMany(BrilliantRecharge::class, 'user_id');
    }


    public function billPayments()
    {
        return $this->hasMany(BillPayment::class, 'user_id');
    }

}
