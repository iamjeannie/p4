<?php

class Account extends Eloquent {

	# The guarded properties specifies which attributes should *not* be mass-assignable
	protected $guarded = array('id', 'created_at', 'updated_at');

	# Relationship method...
    public function user() {

    	# Accounts belongs to User ( multiple address per user)
	    return $this->belongsTo('User');
    }


	}
