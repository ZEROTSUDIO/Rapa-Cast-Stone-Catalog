<?php

namespace App\Livewire;

use App\Models\Article;
use App\Models\Topic;
use Livewire\Component;
use Livewire\WithFileUploads;

class Articles extends Component
{
    use WithFileUploads;

    public $isCreating = false;
    public $articleId = null;

    public $title;
    public $topic_id;
    public $content;
    public $image;
    public $imagePreview;
    public $existingImage;

    public function updatedImage()
    {
        $this->validate([
            'image' => 'image|max:5120',
        ]);

        $this->imagePreview = $this->image->temporaryUrl();
    }

    public function removeImage()
    {
        $this->image = null;
        $this->imagePreview = null;
    }

    public function addArticle()
    {
        $this->reset(['title', 'topic_id', 'content', 'image', 'imagePreview', 'existingImage', 'articleId']);
        $this->isCreating = true;
    }

    public function cancel()
    {
        $this->isCreating = false;
        $this->dispatch('article-form-closed');
    }

    public function createArticle()
    {
        // Placeholder for frontend demo
        session()->flash('status', 'Article created (Simulation)');
        $this->isCreating = false;
    }

    public function updateArticle()
    {
        // Placeholder for frontend demo
        session()->flash('status', 'Article updated (Simulation)');
        $this->isCreating = false;
    }

    public function editArticle($id)
    {
        $this->articleId = $id;
        $this->isCreating = true;
        // Mock data loading
        $this->title = 'Sample Article Title';
        $this->content = '<p>This is some <strong>sample</strong> content.</p>';
    }

    public function render()
    {
        return view('livewire.articles', [
            'articles' => Article::paginate(10),
            'topics' => Topic::all(),
        ]);
    }
}
