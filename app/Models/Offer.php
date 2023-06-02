<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Offer extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public function company()
    {
        return $this->belongsTo(User::class, 'company_id');
    }

    public function employees()
    {
        return $this->belongsToMany(User::class, 'user_offer', 'offer_id', 'user_id')->withTimestamps()->withPivot(['status']);
    }

    public function getContractTypeNameAttribute()
    {
        $name = "";
        switch($this->contract_type)
        {
            case 0:
                $name = 'Fijo';
                break;

            case 1:
                $name = 'Obra labor';
                break;

            case 2:
                $name = 'Freelance';
                break;
        }

        return $name;
    }

    public function getContractTypeBadgeAttribute()
    {
        $name = "";
        $color = "";

        switch($this->contract_type)
        {
            case 0:
                $name = 'Fijo';
                $color = "bg-green-200 text-green-800";
                break;

            case 1:
                $name = 'Obra labor';
                $color = "bg-primary-200 text-blue-800";
                break;

            case 2:
                $name = 'Freelance';
                $color = "bg-orange-200 text-orange-800";
                break;
        }

        return "<span class='px-2 py-0.5 inline-flex text-xs leading-5 shadow font-semibold rounded-full $color'>$name</span>";
    }

    public function getPaymentTypeNameAttribute()
    {
        $name = "";

        switch($this->contract_type)
        {
            case 0:
                $name = 'Hora';
                break;

            case 1:
                $name = 'Entregable';
                break;

            case 2:
                $name = 'Mes';
                break;

            case 3:
                $name = 'Quincenal';
                break;
        }

        return $name;
    }
}
