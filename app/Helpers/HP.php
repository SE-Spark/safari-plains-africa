<?php

namespace App\Helpers;

class HP
{
    public static function getActive($status)
    {
        if ($status == 1) {
            return 'Active';
        } else {
            return 'Inactive';
        }
    }

    public static function getActiveClass($status)
    {
        if ($status == 1) {
            return 'badge-success';
        } else {
            return 'badge-danger';
        }
    }

    public static function setUnitAddedSuccessFlash(){
        session()->flash('success', 'Unit Created Successfully!!');
    }
    public static function setUnitUpdatedSuccessFlash(){
        session()->flash('success', 'Unit Updated Successfully!!');
    }
    public static function setUnitDeletedSuccessFlash(){
        session()->flash('success', 'Unit Deleted Successfully!!');
    }
    public static function setUnitAddedErrorFlash(){
        session()->flash('error', 'Unit Created Failed!!');
    }
    public static function setUnitUpdatedErrorFlash(){
        session()->flash('error', 'Unit Updated Failed!!');
    }
    public static function setUnitDeletedErrorFlash(){
        session()->flash('error', 'Unit Deleted Failed!!');
    }
    public static function sectionSuccessError(){
        
        echo <<<HTML
            @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session()->get('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif
            @if(session()->has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session()->get('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif
        HTML;
    } 
    public static function renderImg($image){
        return '<img src="assets/images/'.$image.'" width="100">';
    }
}