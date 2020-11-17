<?php

namespace App\Http\Controllers;

use App\ChatBoxMessage;
use App\Post;
use App\Review;
use Artesaos\SEOTools\Facades\SEOTools;

class FaqController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        SEOTools::setTitle('FAQ');
        SEOTools::setDescription('AnarchyNetwork , un serveur ouvert depuis 2016 vous proposant plusieurs modes de jeux !');
        SEOTools::setCanonical(url()->current());
        SEOTools::opengraph()->setUrl(url()->current());
        SEOTools::opengraph()->addProperty('title', 'FAQ - AnarchyNetwork');
        SEOTools::opengraph()->addProperty('type', 'website');
        SEOTools::opengraph()->addProperty('url', url()->current());
        SEOTools::opengraph()->addProperty('description', 'AnarchyNetwork , un serveur ouvert depuis 2016 vous proposant plusieurs modes de jeux !');
        SEOTools::opengraph()->addImage('https://anarchynetwork.eu/img/logo.png');
        SEOTools::twitter()->setTitle('FAQ - AnarchyNetwork');
        SEOTools::twitter()->setSite('AnarchyNetwork');
        SEOTools::twitter()->setType('summary');
        SEOTools::twitter()->addImage('https://anarchynetwork.eu/img/background-min.jpg');
        return view('faq');
    }
}
