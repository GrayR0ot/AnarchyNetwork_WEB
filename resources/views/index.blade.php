@extends('layouts.app')

@section('content')
    <div class="ui container page-content">
        <img class="ui left floated image" alt="Logo Anarchynetwork" src="{{ url('/img/logo-min.png') }}" width="130">
        <h2>AnarchyNetwork ? C'est quoi ?</h2>

        <p><b>AnarchyNetwork</b> , un serveur ouvert depuis 2016 vous proposant plusieurs modes de jeux !</p>
        <div class=\"mobile-hide\"><h5><u>Comment décrire AnarchyNetwork mieux qu'en décrivant votre arrivée ?</u></h5>

            <p>
                Nous sommes un serveur Minecraft composé de plusieurs jeux, ouvert au début de l'été 2016, notre serveur
                à su avancer au fur et à mesure du temps. Nous avons amélioré, ajouté, agrandit notre serveur grâce à
                notre communauté ! Nous possèdons plusieurs modes de jeux tel que le OP Prison, Skyblock, le FarmRun
                ainsi que le Faction !
            </p>
        </div>

        <div class="ui divider"></div>

        <div class="ui four statistics">
            <div class="statistic">
                <div class="value">
                    <span id="users_count">&nbsp;&nbsp;<div
                            class="ui active inline medium loader"></div>&nbsp;&nbsp;</span>
                </div>
                <div class="label">
                    Membres
                </div>
            </div>
            <div class="statistic">
                <div class="value">
                    <span id="server_count">&nbsp;&nbsp;<div
                            class="ui active inline medium loader"></div>&nbsp;&nbsp;</span>
                </div>
                <div class="label">
                    Connectés
                </div>
            </div>
            <div class="statistic">
                <div class="value">
                    <span id="visits_count">&nbsp;&nbsp;<div
                            class="ui active inline medium loader"></div>&nbsp;&nbsp;</span>
                </div>
                <div class="label">
                    Visiteurs
                </div>
            </div>
            <div class="statistic">
                <div class="value">
                    <span id="server_max">&nbsp;261</span>
                </div>
                <div class="label">
                    Reccord de connectés
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $('#users_count').html({{ \App\Player::all()->count() }});
        $('#server_count').html({{ \App\Server::find(1)->players + \App\Server::find(2)->players + \App\Server::find(3)->players + \App\Server::find(4)->players }});
        $('#visits_count').html(0);
    </script>
@endsection
