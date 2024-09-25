<?php
/**
 * Filename: Store.php
 * Description: This model is used to intract with store table
 * Author: Muthu Velan
 * Date: 25-09-2024
 * Version: 1.0
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'address'];
}
