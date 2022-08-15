<?php
namespace App\Models;

class Listing{
    public static function all(){
        return [
            [
                'id' => 1,
                'title' => 'One',
                'description' => 'lorem ipsum test test test test'
            ],
            [
                'id' => 2,
                'title' => 'Two',
                'description' => 'lorem ipsum test test test test'
            ],
            [
                'id' => 3,
                'title' => 'Three',
                'description' => 'lorem ipsum test test test test'
            ],
        ];
    }

    public static function find($id)
    {
        $listings = self::all();

        foreach($listings as $key => $listing){
            if($listing['id'] == $id){
                return $listing;
            }
        }
    }
}