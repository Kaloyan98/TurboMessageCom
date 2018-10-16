<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model {
	protected $table = 'tmc_messages';

	protected $fillable = [
		'text',
	];
}