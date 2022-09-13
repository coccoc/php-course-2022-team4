<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;
    protected $table = 'stocks';
    protected $fillable = ['name', 'init_price', 'total_amount'];
    public function run()
    {
        Stock::factory()
            ->count(99)
            ->create();
    }
}
