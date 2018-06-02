<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * Class UploadServices
 *
 * @package App\Services
 */
class UploadServices
{
    /**
     * @param Request $request
     */
    public function updateStore(Request $request)
    {
        $file = $request->file('file');
        if ($file->isValid()) {

            //获取文件的原文件名 包括扩展名
            $yuanname = $file->getClientOriginalName();

            //获取文件的扩展名
            $extension = $file->getClientOriginalExtension();

            //获取文件的类型
            $type = $file->getClientMimeType();

            //获取文件的绝对路径，但是获取到的在本地不能打开
            $path = $file->getRealPath();

            //要保存的文件名 时间+扩展名
            $filename = date('YmdHis').uniqid().'.'.$extension;

            //保存文件          配置文件存放文件的名字  ，文件名，路径
            $bool = Storage::disk('upload')->put($filename, file_get_contents($path));
        }
    }

    public function updateImageStore($disk, Request $request)
    {
        $file = $request->file('file');
        if ($file->isValid()) {

            //获取文件的扩展名
            $extension = $file->getClientOriginalExtension();

            //获取文件的绝对路径，但是获取到的在本地不能打开
            $path = $file->getRealPath();

            //要保存的文件名 时间+扩展名
            $filename = date('YmdHis').uniqid().'.'.$extension;

            //保存文件          配置文件存放文件的名字  ，文件名，路径
            if (Storage::disk($disk)->put($filename, file_get_contents($path))) {
                return $filename;
            } else {
                return false;
            }
        }
    }
}