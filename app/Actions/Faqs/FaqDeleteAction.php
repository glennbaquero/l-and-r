<?php

namespace App\Actions\Faqs;

use Illuminate\Support\Facades\DB;

use App\Models\Faq;

class FaqDeleteAction 
{
	protected $faq;

	/**
	 * Create new action instance
	 *
	 * @return void
	 */
	
	public function __construct(Faq $faq)
	{
		$this->faq = $faq;
	}

	/**
	 * Handles archiving of Faq
	 */
	
	public function execute($id)
	{

		DB::beginTransaction();
				$this->faq = Faq::withTrashed()->findOrFail($id);
				$this->faq->delete();
		DB::commit();


		return true;
	}
}