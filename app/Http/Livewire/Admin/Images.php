<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use App\Models\Image;

class Images extends Component
{
    use WithFileUploads;
    public $photo;
    public $folder=0;
    public $folders=['images', 'images/blogs', 'images/brands', 'images/effects', 'images/products'];
    public $images;
    public $image;
    public $path;
    public $showImg;
    public $detail;

    public function mount()
    {
        
        $this->images = $this->scanAllDir($this->folders[$this->folder]);
        $this->image='';
        $this->path='';
        $this->detail='';
    }


    public function save()
    {
        $this->validate([
            'photo' => 'image|max:1024', // 1MB Max
        ]);
        $file_name = $this->photo->getClientOriginalName();
        $this->tmpScan($file_name);
    }

    public function tmpScan($file_name)
    {
        $scan = scandir(storage_path('app/livewire-tmp'));
        foreach($scan as $file)
        {
            if($file[0] === '.')
            {
                // Move and delete
                rename(storage_path('app/livewire-tmp/'.$file), public_path($this->folder.'/'.$file_name));
            }
        }

    }
    public function updatedFolder($id)
    {
        if($id>'')
        {
            $this->folder = $id;
            $this->images = $this->scanAllDir();
        }
         
    }

    public function render()
    {
        return view('livewire.admin.images', ['images'=>$this->images]);
    }

    function scanAllDir() {
        return Image::where('folder', $this->folders[$this->folder])->get();
    }

    public function showImage($img)
    {
        // dd($img);
        $this->path =public_path($img);
        $image = getimagesize($this->path);
        $this->showImg =$img; 
        //dd($this->showImg);
        $this->image = $img;
        $this->detail = $image[3];
        $this->dispatchBrowserEvent('modal', ['modal'=>'imageModal', 'action'=>'show']);
    }
}
