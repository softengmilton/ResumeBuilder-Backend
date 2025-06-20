<?php

namespace App\Livewire\Portal\Resume;

use App\Models\Template;
use Livewire\Component;

class Index extends Component
{
    public string $selectedCategory = 'all';

    public function selectCategory($category)
    {
        $this->selectedCategory = $category;
    }

    public function render()
    {
        $categories = Template::pluck('category')->unique()->values()->toArray();

        $templates = $this->selectedCategory === 'all'
            ? Template::all()
            : Template::where('category', $this->selectedCategory)->get();

        return view('livewire.portal.resume.index', [
            'templates' => $templates,
            'categories' => $categories,
        ]);
    }
}
