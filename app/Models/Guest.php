<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'guests'; // Specify the table name if it's different from the default "guests" table name.

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'message'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];

    /**
     * Get the date of the guestbook entry's creation.
     *
     * @return string
     */
    public function getCreatedAtAttribute()
    {
        return $this->attributes['created_at']->format('Y-m-d H:i:s');
    }

    /**
     * Get the date of the guestbook entry's last update.
     *
     * @return string
     */
    public function getUpdatedAtAttribute()
    {
        return $this->attributes['updated_at']->format('Y-m-d H:i:s');
    }
}