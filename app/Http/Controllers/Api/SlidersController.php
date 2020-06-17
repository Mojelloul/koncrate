<?php

namespace App\Http\Controllers\Api;

use App\Slide;
use App\Http\Resources\SlidesResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SlidersController extends Controller
{
    public function getAllSlides($limit=null){
        if($limit != null and $limit>0){
            return SlidesResource::collection(Slide::take($limit)->get());
        }
        return SlidesResource::collection(Slide::all());
    }
    public function getSlide($id){
            return new SlidesResource(Slide::find($id));
    }
}
