<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ItemLocation extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'item_id',
        'department_id',
        'location_id',
        'quantity',
        'description',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'item_locations';

    protected $with = ["location", "item", "department"];

    public function location() {
        return $this->belongsTo(Location::class);
    }

    public function item() {
        return $this->belongsTo(Item::class);
    }

    public function department() {
        return $this->belongsTo(Department::class);
    }
}
