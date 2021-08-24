<?php
namespace App\ImageProcess;
class ImageProcess {


    public function imageSaveAndSend($files, $sku)
    {
        // return $sku;
        $count = 1;
        foreach ($files as $file){

            $name = $sku."-".($count++) .".". $file->getClientOriginalName();
            $file->move(public_path('images/'.$sku), $name);
            $path[] = 'images/'.$sku."/". $name;
        }
        // json_encode($path);

        return response()->json($path);
    }


}
