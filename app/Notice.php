<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
	/**
	  * Fillable fields for a new notice
	  * @var array
	  */
	protected $fillable = [
		'infringing_title',
		'infringing_link',
		'original_link',
		'original_description',
		'template',
		'content_removed',
		'provider_id',
	];

	/**
	 * Open a new notice.
	 *
	 * @param array $attributes
	 * @return static
	 */
	public static function open(array $attributes)
	{
		return new static($attributes);
	}

	/**
	 * Set the emaol tempalte for the notice.
	 *
	 * @param string $template
	 * @return static
	 */
	public function useTemplate($template)
	{
		$this->template = $template;
		return $this;
	}

	/**
	 * A notice is created by a user
	 */
	public function user()
	{
		return $this->belongsTo(User::class);
	}

	/**
	 * A notice belongs to a recipient/provider.
	 */
	public function recipient()
	{
		return $this->belongsTo(Provider::class,'provider_id');
	}

	/**
	 * Get the email for the recipient of the DMCA
	 * @return string
	 */
	public function getRecipientEmail()
	{
		return $this->recipient->copyright_email;
	}
	/**
	 * Get the email address if the owner ofthe notice.
	 * @return string
	 */
	public function getOwnerEmail()
	{
		return $this->user->email;
	}
}
