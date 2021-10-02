<?php

namespace App\Http\Livewire\Admin;

use App\Models\HomeSlider;
use Livewire\Component;

class AdminHomeSliderComponent extends Component
{
    public function deleteSlide($slide_id)
    {
        $slide = HomeSlider::find($slide_id);
        $file = public_path('assets/images/sliders'.'/'.$slide->image);
        if( file_exists($file)){
            unlink(public_path('assets/images/sliders'.'/'.$slide->image));
        }
        $slide->delete();
        session()->flash('message','Slide ('.$slide->title. ') has been deleted successfully');
    }
    public function render()
    {
        $sliders = HomeSlider::all();
        return view('livewire.admin.admin-home-slider-component',['sliders'=>$sliders])->layout('layouts.base');
    }
}
