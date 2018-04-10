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
}
