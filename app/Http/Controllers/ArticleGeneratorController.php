<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use OpenAI;
use OpenAI\Laravel\Facades\OpenAI;

class ArticleGeneratorController extends Controller
{
   
    public function index(Request $request)
    {
        if ($request->title == null) {
            return;
        }

        $title = $request->title;    
        $result = OpenAI::chat()->create([
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                ['role' => 'user', 'content' => $title],
            ],
        ]);
        
       

        $content = trim($result->choices[0]->message->content);


        return view('write', compact('title', 'content'));
    }
}
