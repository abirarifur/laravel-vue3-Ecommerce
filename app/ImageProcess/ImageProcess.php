<?php
namespace App\ImageProcess;

use Illuminate\Support\Arr;

class ImageProcess {


    public function imageSaveAndSend($files, $sku)
    {
        $oldPath = [];
        $path = [];
        $count = 1;
        if(array_key_exists('newFiles', $files)){
            if(count($files['newFiles']) > 0){
                foreach ($files['newFiles'] as $file){
                    $name = $sku."-".($count++) .".". $file->getClientOriginalName();
                    $file->move(public_path('images/'.$sku), $name);
                    $path[] = 'images/'.$sku."/". $name;
                }
            }
        }
        if(array_key_exists('oldFiles', $files)){
            if(count($files['oldFiles']) > 0){
                $oldPath = $files['oldFiles'];
            }
        }

        
        
        // json_encode($path);
        $newPaths = Arr::collapse([$path, $oldPath]);
        // return  $oldPath
        return response()->json($newPaths);
    }


}
