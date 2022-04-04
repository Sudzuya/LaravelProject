<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        
        return [
            'posts' => [   
                '0' => [
                    'id'=> '3',
                    'title'=>'А Первый пост', 
                    'body'=>'А Какой-то текст'
                ],
                '1' => [
                    'id'=> '2',
                    'title'=>'Б Первый пост 2', 
                    'body'=>'Б Какой-то текст 2'
                ],
                '2' => [
                    'id'=> '7',
                    'title'=>'И Первый пост 3', 
                    'body'=>'В Какой-то текст 3'
                ],
                '3' => [
                    'id'=> '6',
                    'title'=>'Г Первый пост 4', 
                    'body'=>' Г Какой-то текст 4'
                ],
                '4' => [
                    'id'=> '1',
                    'title'=>'А Первый пост 5', 
                    'body'=>'А Какой-то текст 5'
                ],
                '5' => [
                    'id'=> '4',
                    'title'=>'Б Первый пост 6', 
                    'body'=>'Б Какой-то текст 6'
                ]
            ],

        ];
    }
}
 