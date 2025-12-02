<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class editForm extends Form
{
    #[Validate('required')]
    public $body = '';
}
