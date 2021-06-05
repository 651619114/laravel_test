<?php


namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;

class TestController
{
    public function index()
    {
        $a = DB::table('dict_sentence')->get()->toArray();
        $str = '';
        foreach ($a as $item) {
            $str .= '("' . $item->sid . '","' . $item->wid . '","' . str_replace("'","\'",$item->sentence) . '","' . $item->display . '","' . str_replace("'","\'",$item->translation) . '","' . $item->status . '","' . str_replace("'","\'",$item->fromid). '","' . $item->mark .'"),';
        }
        var_dump($str);
        die;
    }

    public function download()
    {
        return response()->download(realpath(base_path('public')).'/wp.dictionary.db', 'wp.db');
    }
}
