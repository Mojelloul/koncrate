<?php

namespace App\Http\Controllers\Api;

use App\Service;
use App\Http\Resources\ServicesResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function getAllServices($limit=null){
        if($limit != null and $limit>0){
            return ServicesResource::collection(Service::take($limit)->get());
        }
        return ServicesResource::collection(Service::all());
    }
    public function getService($slug){
            return new ServicesResource(Service::whereSlug($slug)->first());
    }
}
