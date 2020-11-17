<?php

namespace App\Http\Controllers;

use App\ChatBoxMessage;
use App\Player;
use App\Post;
use App\Review;
use App\Vote;
use Artesaos\SEOTools\Facades\SEOTools;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Log\Logger;
use Illuminate\Support\Facades\Log;
use MongoDB\Driver\Session;

class VoteController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        SEOTools::setTitle('Voter');
        SEOTools::setDescription('AnarchyNetwork , un serveur ouvert depuis 2016 vous proposant plusieurs modes de jeux !');
        SEOTools::setCanonical(url()->current());
        SEOTools::opengraph()->setUrl(url()->current());
        SEOTools::opengraph()->addProperty('title', 'Voter - AnarchyNetwork');
        SEOTools::opengraph()->addProperty('type', 'website');
        SEOTools::opengraph()->addProperty('url', url()->current());
        SEOTools::opengraph()->addProperty('description', 'AnarchyNetwork , un serveur ouvert depuis 2016 vous proposant plusieurs modes de jeux !');
        SEOTools::opengraph()->addImage('https://anarchynetwork.eu/img/logo.png');
        SEOTools::twitter()->setTitle('Voter - AnarchyNetwork');
        SEOTools::twitter()->setSite('AnarchyNetwork');
        SEOTools::twitter()->setType('summary');
        SEOTools::twitter()->addImage('https://anarchynetwork.eu/img/background-min.jpg');
        return view('vote');
    }

    public function stepOne(Request $request)
    {
        if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
            $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
        }
        $playerIp = $_SERVER['REMOTE_ADDR'];
        if (!$request->has('name'))
            return response()->json([
                'status' => false,
                'error' => 'Vous devez remplir tous les champs'
            ]);
        // Check if user exist
        $request->session()->put('name', $request->input('name'));
        $player = Player::where('name', $request->input('name'))->first();
        if (!$player || empty($player))
            return response()->json([
                'status' => false,
                'error' => "Aucun joueur n'est inscrit avec ce pseudo."
            ]);

        // check if user can vote
        $findVote = Vote::orderBy('id', 'desc')->where('ip', '=', $playerIp)->get()->first();
        if (isset($findVote->created_at)) {
            $nextVote = $findVote->created_at->addMinutes(90);
            if (Carbon::now() < $nextVote) {
                $diff = Carbon::now()->diffInSeconds($nextVote);
                $diff = explode(':', gmdate('H:i:s', $diff));
                return response()->json([
                    'status' => false,
                    'error' => 'Vous avez déjà voté ! Vous devez encore attendre ' . $diff[0] . ' heures, ' . $diff[1] . ' minutes et ' . $diff[2] . ' secondes.'
                ]);
            }
        }
        // Save user
        $request->session()->put('vote.user.id', $player->id);

        // Success
        return response()->json([
            'status' => true,
            'success' => 'Vous vous êtes bien connecté !'
        ]);
    }

    public
    function stepThree(Request $request)
    {
        if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
            $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
        }
        $playerIp = $_SERVER['REMOTE_ADDR'];
        $json = file_get_contents("https://serveur-prive.net/api/vote/json/287/$playerIp");
        $json_data = json_decode($json);
        $player = Player::find($request->session()->get('vote.user.id'));
        $findVote = Vote::orderBy('id', 'desc')->where('ip', '=', $playerIp)->get()->first();
        if (isset($findVote->created_at)) {
            $nextVote = $findVote->created_at->addMinutes(90);
            if (Carbon::now() < $nextVote) {
                $diff = Carbon::now()->diffInSeconds($nextVote);
                $diff = explode(':', gmdate('H:i:s', $diff));
                return response()->json([
                    'status' => false,
                    'error' => 'Vous avez déjà voté ! Vous devez encore attendre ' . $diff[0] . ' heures, ' . $diff[1] . ' minutes et ' . $diff[2] . ' secondes.'
                ]);
            }
        }
        if ($json_data->status == 1) {
            $player->votes = $player->votes + 1;
            $player->vote_rewards = $player->vote_rewards + 1;
            $player->save();
            $vote = new Vote();
            $vote->player = $player->id;
            $vote->ip = $playerIp;
            $vote->save();
            return response()->json([
                'status' => true,
                'success' => 'Vous avez bien validé votre vote ! Connectez vous en jeu !'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'error' => 'Vous ne semblez pas avoir voté ! (' . $json . ' - ' . $playerIp . ')'
            ]);
        }
    }
}
