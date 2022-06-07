<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class ViewController
{

    public function quemSomos()
    {
        return view('site/quem-somos');
    }

    public function home()
    {
        $produtos = App::get('database')->selectAll('produtos');

        $tabela = [
            'produtos' => $produtos
        ];

        return view('site/home', $tabela);
    }

    public function produtos()
    {
        return view('site/produtos');
    }

    public function create()
    {
    }

    public function store()
    {
    }

    public function edit()
    {
    }

    public function update()
    {
    }

    public function delete()
    {
    }
}
