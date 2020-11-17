<?php

namespace App\Http\Controllers;

use App\WikiItem;
use Artesaos\SEOTools\Facades\SEOTools;

class WikiController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        SEOTools::setTitle('Wiki');
        SEOTools::setDescription('AnarchyNetwork , un serveur ouvert depuis 2016 vous proposant plusieurs modes de jeux !');
        SEOTools::setCanonical(url()->current());
        SEOTools::opengraph()->setUrl(url()->current());
        SEOTools::opengraph()->addProperty('title', 'Wiki - AnarchyNetwork');
        SEOTools::opengraph()->addProperty('type', 'website');
        SEOTools::opengraph()->addProperty('url', url()->current());
        SEOTools::opengraph()->addProperty('description', 'AnarchyNetwork , un serveur ouvert depuis 2016 vous proposant plusieurs modes de jeux !');
        SEOTools::opengraph()->addImage('https://anarchynetwork.eu/img/logo.png');
        SEOTools::twitter()->setTitle('Wiki - AnarchyNetwork');
        SEOTools::twitter()->setSite('AnarchyNetwork');
        SEOTools::twitter()->setType('summary');
        SEOTools::twitter()->addImage('https://anarchynetwork.eu/img/background-min.jpg');
        return view('wiki.index');
    }

    public function view($id)
    {
        $wiki = WikiItem::find($id);
        SEOTools::setTitle($wiki->title);
        SEOTools::setDescription('AnarchyNetwork , un serveur ouvert depuis 2016 vous proposant plusieurs modes de jeux !');
        SEOTools::setCanonical(url()->current());
        SEOTools::opengraph()->setUrl(url()->current());
        SEOTools::opengraph()->addProperty('title', $wiki->title.' - AnarchyNetwork');
        SEOTools::opengraph()->addProperty('type', 'website');
        SEOTools::opengraph()->addProperty('url', url()->current());
        SEOTools::opengraph()->addProperty('description', 'AnarchyNetwork , un serveur ouvert depuis 2016 vous proposant plusieurs modes de jeux !');
        SEOTools::opengraph()->addImage('https://anarchynetwork.eu/img/logo.png');
        SEOTools::twitter()->setTitle($wiki->title.' - AnarchyNetwork');
        SEOTools::twitter()->setSite('AnarchyNetwork');
        SEOTools::twitter()->setType('summary');
        SEOTools::twitter()->addImage('https://anarchynetwork.eu/img/background-min.jpg');
        return view('wiki.view', compact('wiki'));
    }
}
