<?php

namespace App\Libs;

use Illuminate\Support\Facades\Input;
use OSS\Core\OssException;

class Alioss
{
    private $ossClient;
    private $ossConfig;

    public function __construct()
    {
        $this->ossConfig = config('others.alioss');
        $this->ossClient = new \OSS\OssClient($this->ossConfig['accessId'], $this->ossConfig['accessKey'], $this->ossConfig['endPoint']);
    }


    /**
     * 直接上传变量内容
     */
    public function base64Upload($base64, $dir)
    {
        try {
            if (preg_match('/^(data:\s*image\/(\w+);base64,)/', $base64, $result)) {
                $ext = $result[2];
                $filename = $dir . uniqid() . str_random(8) . mt_rand(1, 999) . ".{$ext}";
                $img = base64_decode(str_replace($result[1], '', $base64));
                $this->ossClient->putObject($this->ossConfig['bucketName'], $filename, $img);
                return [true, $filename];
            } else {
                throw new \Exception('请上传base64的图片');
            }
        } catch (\Exception $e) {
            return [false, $e->getMessage()];
        }
    }

    /**
     * 删除oss对象
     */
    public function deleteOssObject($file)
    {
        try {
            $this->ossClient->deleteObject($this->ossConfig['bucketName'], $file);
            return [true, 'success'];
        } catch (\Exception $e) {
            return [false, $e->getMessage()];
        }
    }

    /**
     * 批量删除
     */
    public function deleteOssObjects($files)
    {
        try {
            $this->ossClient->deleteObjects($this->ossConfig['bucketName'], $files);
            return [true, 'success'];
        } catch (\Exception $e) {
            return [false, $e->getMessage()];
        }
    }


    /**
     * 文件上传
     */
    function ng2UploadObjectToOss($file)
    {
        try {
            //md5文件名
            $name = 'file/' . md5($file['name']) . strrchr($file['name'], '.');
            $this->ossClient->uploadFile($this->ossConfig['bucketName'], $name, $file['tmp_name']);
            return ['error' => 0, 'data' => $name];
        } catch (\Oss\Core\OssException $e) {
            return ['error' => 1, 'errmsg' => $e->getMessage()];
        }
    }





}