<?php namespace Ergo\Airdrop\Models;

use Model;

/**
 * winner Model
 */
class Winner extends Model
{
    /**
     * @var string The database table used by the model.
     */
    public $table = 'ergo_airdrop_winners';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [];

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