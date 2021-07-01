<?php

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class ImagesHelper {

   static function GetImagePath($strAction, $id, $filename,$withDefault=true) {

        if($withDefault){
            $default = asset('assets/production/images/not-available.jpg');
        }else{
            $default = '';
        }

        if($filename == '') {
            return $default;
        }

        $path = asset('/');
        $checkFile = public_path() . '/uploads';

        switch ($strAction) {
            case "users":
                $fullPath = $path.'uploads' . '/users/' . $id . '/' . $filename;
                $checkFile = $checkFile . '/users/' . $id . '/' . $filename;
                return is_file($checkFile) ? URL::to($fullPath) : $default;
                break;
            case "pages":
                $fullPath = $path.'uploads' . '/pages/' . $id . '/' . $filename;
                $checkFile = $checkFile . '/pages/' . $id . '/' . $filename;
                return is_file($checkFile) ? URL::to($fullPath) : $default;
                break;
            case "events":
                $fullPath = $path.'uploads' . '/events/' . $id . '/' . $filename;
                $checkFile = $checkFile . '/events/' . $id . '/' . $filename;
                return is_file($checkFile) ? URL::to($fullPath) : $default;
                break;
            case "variables":
                $fullPath = $path.'uploads' . '/variables/' . $id . '/' . $filename;
                $checkFile = $checkFile . '/variables/' . $id . '/' . $filename;
                return is_file($checkFile) ? URL::to($fullPath) : $default;
                break;
            case "sliders":
                $fullPath = $path.'uploads' . '/sliders/' . $id . '/' . $filename;
                $checkFile = $checkFile . '/sliders/' . $id . '/' . $filename;
                return is_file($checkFile) ? URL::to($fullPath) : $default;
                break;
            case "directors":
                $fullPath = $path.'uploads' . '/directors/' . $id . '/' . $filename;
                $checkFile = $checkFile . '/directors/' . $id . '/' . $filename;
                return is_file($checkFile) ? URL::to($fullPath) : $default;
                break;
            case "regulations":
                $fullPath = $path.'uploads' . '/regulations/' . $id . '/' . $filename;
                $checkFile = $checkFile . '/regulations/' . $id . '/' . $filename;
                return is_file($checkFile) ? URL::to($fullPath) : $default;
                break;
            case "photos":
                $fullPath = $path.'uploads' . '/photos/' . $filename;
                $checkFile = $checkFile . '/photos/' . $filename;
                return is_file($checkFile) ? URL::to($fullPath) : $default;
                break;
            case "orders":
                $fullPath = $path.'uploads' . '/orders/' . $id . '/' . $filename;
                $checkFile = $checkFile . '/orders/' . $id . '/' . $filename;
                return is_file($checkFile) ? URL::to($fullPath) : $default;
                break;
        }

        return $default;
    }

    static function uploadImage($strAction, $fieldInput, $id, $customPath = '') {

        if ($fieldInput == '') {
            return false;
        }

        if (is_object($fieldInput)) {
            $fileObj = $fieldInput;
        } else {
            if (!Request::hasFile($fieldInput)) {
                return false;
            }

            $fileObj = Request::file($fieldInput);
        }

        if ($fileObj->getSize() >= 10000000) {
            return false;
        }

        $extensionExplode = explode('/' , $fileObj->getMimeType()); // getting image extension
        unset($extensionExplode[0]);
        $extensionExplode = array_values($extensionExplode);
        $extension = $extensionExplode[0];
        // dd($extension);
        if (!in_array($extension, ['jpg', 'jpeg' ,'svg+xml','svg', 'JPG', 'JPEG', 'png', 'PNG', 'gif', 'GIF','zip','rar','docx','pdf','dwg','.3gp','.3g2','.avi','.uvh','.uvm','.uvu','.uvp','.uvs','.uaa','.fvt','.f4v','.flv','.fli','.h261','.h263','.h264','.jpgv','.m4v','.asf','.pyv','.wm','.wmx','.wmv','.wvx','.mj2','.mxu','.mpeg','.mp4','.ogv','.webm','.qt','.movie','.viv','.wav','.avi','.mkv','x-m4v'])) {
            return false;
        }
        
        $rand = rand() . date("YmdhisA");
        $fileName = 'artist' . '-' . $rand;
        $directory = '';

        $path = public_path() . '/uploads/';

        if ($strAction == 'users') {
            $directory = $path . 'users/' . $id;
        }

        if ($strAction == 'pages') {
            $directory = $path . 'pages/' . $id;
        }

        if ($strAction == 'events') {
            $directory = $path . 'events/' . $id;
        }

        if ($strAction == 'orders') {
            $directory = $path . 'orders/' . $id;
        }

        if ($strAction == 'variables') {
            $directory = $path . 'variables/' . $id;
        }

        if ($strAction == 'sliders') {
            $directory = $path . 'sliders/' . $id;
        }

        if ($strAction == 'directors') {
            $directory = $path . 'directors/' . $id;
        }

        if ($strAction == 'regulations') {
            $directory = $path . 'regulations/' . $id;
        }

        $fileName_full = $fileName . '.' . $extension;

        if($strAction == 'variables'){
            $fileName_full = $fileObj->getClientOriginalName();
        }

        if ($directory == '') {
            return false;
        }

        if (!file_exists($directory)) {
            mkdir($directory, 0777, true);
        }

        if ($fileObj->move($directory, $fileName_full)){
            return $fileName_full;
        }

        return false;
    }

    static function UploadImageFromStorage($strAction, $fieldInput, $id, $customPath = '') {

        if ($fieldInput == '') {
            return false;
        }

        if (is_object($fieldInput)) {
            $fileObj = $fieldInput;
        } else {
            $fileObj = Storage::url($fieldInput);
        }

        if (Storage::size($fieldInput) >= 10000000) {
            return false;
        }

        $extensionExplode = explode('/' , Storage::mimeType($fieldInput)); // getting image extension
        unset($extensionExplode[0]);
        $extensionExplode = array_values($extensionExplode);
        $extension = $extensionExplode[0];

        if (!in_array($extension, ['jpg', 'jpeg', 'JPG', 'JPEG', 'png', 'PNG','plain','txt','docx','ppt','word'])) {
            return false;
        }
        
        $rand = rand() . date("YmdhisA");
        $fileName = 'enggate' . '-' . $rand;
        $directory = '';

        $path = public_path() . '/uploads/';

        if ($strAction == 'users') {
            $directory = $path . 'users/' . $id;
        }

        if ($strAction == 'pages') {
            $directory = $path . 'pages/' . $id;
        }

        if ($strAction == 'companies') {
            $directory = $path . 'companies/' . $id;
        }

        if ($strAction == 'variables') {
            $directory = $path . 'variables/' . $id;
        }

        if ($strAction == 'sliders') {
            $directory = $path . 'sliders/' . $id;
        }

        if ($strAction == 'directors') {
            $directory = $path . 'directors/' . $id;
        }

        if ($strAction == 'regulations') {
            $directory = $path . 'regulations/' . $id;
        }

        $fileName_full = $fileName . '.' . $extension;

        if ($directory == '') {
            return false;
        }

        if (!file_exists($directory)) {
            mkdir($directory, 0777, true);
        }

        $filePath = str_replace('/storage', '', Storage::url($fieldInput));
        if (File::move(storage_path().'/app'.$filePath, $directory.'/'.$fileName_full)){
            return $fileName_full;
        }

        return false;
    }

    static function uploadCustom($strAction, $fieldInput, $customPath = '') {

        if ($fieldInput == '') {
            return false;
        }

        if (is_object($fieldInput)) {
            $fileObj = $fieldInput;
        } else {
            if (!Request::hasFile($fieldInput)) {
                return false;
            }

            $fileObj = Request::file($fieldInput);
        }

        if ($fileObj->getSize() >= 2000000) {
            return false;
        }

        $extensionExplode = explode('/' , $fileObj->getMimeType()); // getting image extension
        unset($extensionExplode[0]);
        $extensionExplode = array_values($extensionExplode);
        $extension = $extensionExplode[0];
        if (!in_array($extension, ['jpg', 'jpeg', 'JPG', 'JPEG', 'png', 'PNG', 'gif', 'GIF','zip','rar','vnd.openxmlformats-officedocument.wordprocessingml.document','vnd.openxmlformats-officedocument.spreadsheetml.sheet','xlsx','csv','docx','pdf','dwg'])) {
            return false;
        }
        $directory = '';
        $path = public_path() . '/uploads/';

        if ($strAction == 'photos') {
            $directory = $path . 'photos/';
        }
        if ($strAction == 'files') {
            $directory = $path . 'files/';
        }

        $fileName_full = $fileObj->getClientOriginalName();

        if ($directory == '') {
            return false;
        }

        if (!file_exists($directory)) {
            mkdir($directory, 0777, true);
        }

        if ($fileObj->move($directory, $fileName_full)){
            return $fileName_full;
        }

        return false;
    }



    static function deleteDirectory($dir) {
        system('rm -r ' . escapeshellarg($dir), $retval);
        return $retval == 0; // UNIX commands return zero on success
    }

}