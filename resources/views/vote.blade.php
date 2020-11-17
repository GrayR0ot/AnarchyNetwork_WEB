@extends('layouts.app')

@section('content')
    <div id="327785088">
        <script type="text/javascript">
            try {
                window._mNHandle.queue.push(function (){
                    window._mNDetails.loadTag("327785088", "300x250", "327785088");
                });
            }
            catch (error) {}
        </script>
    </div>
    <div class="ui container page-content">
        <div class="ui ordered fluid stackable top attached steps">
            <div class="active step" data-step-display="1">
                <div class="content">
                    <div class="title">Connexion</div>
                    <div class="description">Entrez votre pseudo</div>
                </div>
            </div>
            <div class="disabled step" data-step-display="2">
                <div class="content">
                    <div class="title">Voter</div>
                    <div class="description">Votez sur Serveur-Privé</div>
                </div>
            </div>
            <div class="disabled step" data-step-display="3">
                <div class="content">
                    <div class="title">Vérification</div>
                    <div class="description">Nous vérifions votre vote</div>
                </div>
            </div>
        </div>
        <div class="ui attached segment">
            <div data-step="1" class="active">
                <form class="ui form" method="post" action="{{ url('/vote/step/one') }}" data-ajax
                      data-ajax-custom-callback="afterStepOne">

                    <div class="field">
                        <label>Pseudo</label>
                        <input type="text" name="name" style="width:200px;text-align:center;">
                    </div>

                    <button type="submit" class="ui green animated button">
                        <div class="visible content">Passer à l'étape suivante</div>
                        <div class="hidden content"><i class="right arrow icon"></i></div>
                    </button>
                </form>
            </div>
            <div data-step="2">
                <a target="_blank" href="https://serveur-prive.net/minecraft/anarchynetwork-287"
                   class="ui animated fade yellow massive button">
                    <div class="visible content">Votez sur Serveur-Privé</div>
                    <div class="hidden content">
                        <i class="right arrow icon"></i>
                    </div>
                </a>
            </div>
            <div data-step="3">
                <div class="ui info message">
                    <div class="header">
                        Information
                    </div>
                    <p>Nous vérifions votre vote</p>
                </div>
                <form class="ui form" method="post" action="{{ url('/vote/step/three') }}" data-ajax>
                    <button type="submit" class="ui green animated button">
                        <div class="visible content">Je confirme</div>
                        <div class="hidden content"><i class="right arrow icon"></i></div>
                    </button>
                </form>
            </div>
        </div>

    </div>
    <div class="colored-block">
        <div class="ui container text-center">
            <h2 class="ui header">
                <div class="content">
                    Classement
                    <div class="sub header">Voter et gagnez des récompenses supplémentaires chaque mois !</div>
                </div>
            </h2>
            <table class="ui very basic table table">
                <thead>
                <tr>
                    <th>Position</th>
                    <th>Joueur</th>
                    <th>Votes</th>
                    <th>Bonus</th>
                </tr>
                </thead>
                <tbody>
                @foreach(\App\Player::orderBy('votes', 'desc')->get() as $player)
                    @if($loop->index == 10)
                        @break
                    @endif
                    <tr>
                        <td>#{{ $loop->index+1 }}</td>
                        <td>{{ $player->name }}</td>
                        <td>{{ $player->votes }}</td>
                        <td>
                            @if($loop->index == 0)
                                <div class="ui yellow button" data-placement="left center" data-toggle="popup">
                                    Bonus #1
                                </div>
                            @elseif($loop->index == 1)
                                <div class="ui yellow button" data-placement="left center" data-toggle="popup">
                                    Bonus #2
                                </div>
                            @elseif($loop->index == 2)
                                <div class="ui yellow button" data-placement="left center" data-toggle="popup">
                                    Bonus #3
                                </div>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
<script type="text/javascript" src="{{ url('/js/jquery-3.2.1.min.js') }}"></script>
<script type="text/javascript">
    function next(step) {
        $('[data-step-display="' + (step - 1).toString() + '"]').removeClass('active').addClass('completed');
        $('[data-step-display="' + step.toString() + '"]').removeClass('disabled').addClass('active');
    }

    function afterStepOne(req, res) {
        $('[data-step="1"]').slideUp(100, function () {
            $('[data-step="2"]').slideDown(100)
            next(2);
        })
    }

    $(document).ready(function () {
        $('[data-step="2"] a').on('click', function () {
            $('[data-step="2"]').slideUp(100, function () {
                $('[data-step="3"]').slideDown(100)
                next(3)
            })
        })
        $('[data-toggle="popup"]').each(function (k, el) {
            $(el).popup({
                html: $(el).attr('data-content'),
                position: $(el).attr('data-placement')
            })
        })
    })
</script>
<style media="screen">
    div[data-step] {
        text-align: center;
    }

    div[data-step]:not(.active) {
        display: none;
    }

    .colored-block h2 {
        margin-bottom: 50px !important;
    }

    .colored-block table.very.basic.table {
        color: #fff;
    }

    .colored-block table.very.basic.table thead th {
        color: #fff;
    }
</style>
