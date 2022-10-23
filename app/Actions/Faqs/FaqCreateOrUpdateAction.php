<?php

namespace App\Actions\Faqs;

use Illuminate\Support\Facades\DB;

use App\Models\Faq;

class FaqCreateOrUpdateAction 
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
	 * Handles creating or updating of Faq
	 */
	
	public function execute($request, $id = null)
	{
		DB::beginTransaction();
			if(!$id) {
				$this->faq = $this->faq->create($request->all());
			} else {
				$this->faq = Faq::withTrashed()->findOrFail($id);
				$this->faq->update($request->all());
			}
		DB::commit();


		return $this->faq;
	}
}