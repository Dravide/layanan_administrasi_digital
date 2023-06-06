<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\Component;

class Input extends Component
{
    public function render(): View
    {
        $datasiswa = json_decode(Storage::get('public/data.json'), true);
        return view('components.input')->with(compact('datasiswa'));
    }
}
