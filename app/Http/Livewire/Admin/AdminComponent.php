<?php

namespace App\Http\Livewire\Admin;

use Livewire\C;
use Livewire\WithPagination;

class AdminComponent extends Analytics
{
	use WithPagination;

	protected $paginationTheme = 'bootstrap';
}
