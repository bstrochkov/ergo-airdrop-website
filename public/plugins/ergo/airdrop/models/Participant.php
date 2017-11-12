<?php namespace Ergo\Airdrop\Models;

use Model;

/**
 * Participant Model
 */
class Participant extends Model
{
    /**
     * @var string The database table used by the model.
     */
    public $table = 'ergo_airdrop_participants';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['id'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = ['name', 'address', 'balance'];

    /**
     * @var array Relations
     */
    public $hasOne = [];
    public $hasMany = [];
    public $belongsTo = [];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];
}
