<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class m_customer extends Model
{
    use HasFactory;

    protected $table = 'm_customer';
    protected $guarded = [];

    public function t_sales()
    {
        return $this->hasMany(t_sales::class, 'cust_id', 'id');
    }
}
