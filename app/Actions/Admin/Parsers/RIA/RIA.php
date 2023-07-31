<?php


namespace App\Actions\Admin\Parsers\RIA;

use App\Models\AddedPosts;
use App\Models\Category;
use App\Models\PostPreview;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class RIA
{
    public static function index()
    {
//        $process = new Process(['python3', __DIR__.'/ria.py', __DIR__]);
//        $process->run();
//
//        if (!$process->isSuccessful()) {
//            throw new ProcessFailedException($process);
//        }
//        echo $process->getOutput();

        self::data('world');
    }

    public static function categories($category)
    {
        $list = [
          'world' => 'В Мире',
          'politics' => 'Политика',
        ];
        return $list[$category];
    }

    public static function data($category_file)
    {
        $data = file_get_contents(__DIR__."/data/".$category_file.".json");
        $objects = json_decode($data, true);

        foreach ($objects as $object)
        {
            if(!AddedPosts::where('id_article', $object['id_article'])->exists()){
                $tags = json_encode($object['tags']);

                $category = self::categories($object['category']);

                $reg_desc = "/.*Новости./";
                $desc = preg_replace($reg_desc," ", $object['desc']);

                PostPreview::create([
                    "id_article" => $object['id_article'],
                    "title" => $object['title'],
                    "desc" => $desc,
                    "preview_image" => $object['image'],
                    "redaction" => $object['redaction'],
                    "tags" => $tags,
                    "category" => $category,
                ]);
                AddedPosts::create(['id_article' => $object['id_article']]);
            }
        }
    }

}







/**
 * name_article = 'uniq_for_bd';
 * title = "qwe"
 * desc = "qweasdzxc"
 * image = "src"
 * categories = "travel"
 * tags = "123, 234, 345"
 * redaction = 'www.site.ru'
 * data = '11.11.1111'
 *
 * получим изобр., сохраним, добавим в бд, если необх. удалим
 * $image = "https://www.teknopolis.net/wp-content/uploads/2019/09/Lorem-Picsum.jpg";
 * $path = '/images/'.time().basename($image);
 * Storage::disk('public')->put($path, file_get_contents($image));
 * File::delete(Storage::disk('public')->delete($path));
 *
 *
id_article
title
desc
preview_image
redaction
tags
category_id
 *
 */

