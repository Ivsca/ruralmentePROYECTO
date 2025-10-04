<?php

namespace App\Livewire;

use Livewire\Component;

class Carousel extends Component
{
    public $images;
    public $active;


    public function mount()
    {
        $this->images = [
            'fondos_imagenes_video/1.jpeg',
            'fondos_imagenes_video/agricultor.png',
            'fondos_imagenes_video/grupo_trabajo.png',
            'fondos_imagenes_video/tonos_cafe.jpg',
            'fondos_imagenes_video/pasos_cafe.jpg',
        ];
        $this->active = 0;
    }

    public function render()
    {
        return view('livewire.carousel');
    }

    public function previous()
    {
        $this->active = $this->active === 0 ? count($this->images) - 1 : $this->active - 1;
    }

    public function next()
    {
        $this->active = $this->active === count($this->images) - 1 ? 0 : $this->active + 1;
    }
}
