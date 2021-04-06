<?php

namespace App\Controllers;

use App\Models\Url;

class Home extends BaseController
{
    public function index()
    {
        $urls = (new Url)->findAll();
        return view('welcome_message', compact('urls'));
    }

    public function short($slug)
    {
        $url = (new Url)->where('slug', $slug)->first();

        if ($url === null) {
            return redirect()->to('/');
        }

        (new Url)->save([
            'id' => $url['id'],
            'last_visit_at' => date('Y-m-d H:i:s'),
            'visit_count' => $url['visit_count'] + 1
        ]);

        return redirect()->to($url['url_destination']);
    }

    public function store()
    {
        $url_destination = $this->request->getVar('url');
        $slug = null;

        if (($url = (new Url)->where('url_destination', $url_destination)->first()) === null) {

            helper('text');

            (new Url)->save([
                'slug' => $slug = random_string('alnum', 6),
                'url_destination' => $url_destination
            ]);
        }

        session()->setFlashdata('url', $url['slug'] ?? $slug);


        return redirect()->to('/');
    }
}
