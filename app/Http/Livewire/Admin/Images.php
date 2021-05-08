<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;

class Images extends Component
{
    use WithFileUploads;
    public $photo;
    public $folder;
    public $images;
    public $image;
    public $path;
    public $detail;

    public function mount()
    {
        $this->folder = 'images';
        $this->images = $this->scanAllDir($this->folder);
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

    public function updFolder($dir)
    {
        $this->folder = $dir;
        $this->images = $this->scanAllDir($dir);
    }

    public function render()
    {
        return view('livewire.admin.images', ['images'=>$this->images]);
    }

    function scanAllDir($dir) {
        $dir = public_path($this->folder);
        $result = [];
        foreach(scandir($dir) as $filename) {
          if ($filename[0] === '.') continue;
          $filePath = $dir . '/' . $filename;
          if (is_dir($filePath)) {
            //foreach ($this->scanAllDir($filePath) as $childFilename) {
              $result[] = '/'.$filename; //. '/' . $childFilename;
            //}
          } else {
            $result[] = $filename;
          }
        }
        return $result;
    }

    public function showImage($img)
    {

        $this->path =public_path($this->folder.'/'.$img);
        $image = getimagesize($this->path);
        $this->image = $img;
        $this->detail = $image[3];
        $this->dispatchBrowserEvent('modal', ['modal'=>'imageModal', 'action'=>'show']);
    }
}
