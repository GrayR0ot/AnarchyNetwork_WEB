<?php

namespace App\Http\Controllers;

use App\ChatBoxMessage;
use App\Http\Controllers\Controller;
use App\OitbPlayer;
use App\Post;
use App\Review;
use App\User;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JoinController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        SEOTools::setTitle('Nous rejoindre');
        SEOTools::setDescription('AnarchyNetwork , un serveur ouvert depuis 2016 vous proposant plusieurs modes de jeux !');
        SEOTools::setCanonical(url()->current());
        SEOTools::opengraph()->setUrl(url()->current());
        SEOTools::opengraph()->addProperty('title', 'Nous rejoindre - AnarchyNetwork');
        SEOTools::opengraph()->addProperty('type', 'website');
        SEOTools::opengraph()->addProperty('url', url()->current());
        SEOTools::opengraph()->addProperty('description', 'AnarchyNetwork , un serveur ouvert depuis 2016 vous proposant plusieurs modes de jeux !');
        SEOTools::opengraph()->addImage('https://anarchynetwork.eu/img/logo.png');
        SEOTools::twitter()->setTitle('Nous rejoindre - AnarchyNetwork');
        SEOTools::twitter()->setSite('AnarchyNetwork');
        SEOTools::twitter()->setType('summary');
        SEOTools::twitter()->addImage('https://anarchynetwork.eu/img/background-min.jpg');
        return view('join');
    }
}
