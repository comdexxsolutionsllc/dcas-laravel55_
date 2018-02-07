<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Datacenter Automation Suite - Profile</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.css"/>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link rel="stylesheet" href="{{mix('/css/app.css')}}">

    @yield('css')
</head>
<body>
<hr class="">
<div class="container target">
    <div class="row">
        <div class="col-sm-10">
            <h1 class="">
                {{ $profile->user->username }}
                <button type="button" class="btn btn-info" style="margin-left: 50px">Send me a message</button>
            </h1>
            <br>
        </div>
        @if($profile->avatar)
            <div class="col-sm-2"><a href="/users" class="pull-right"><img title="{{$profile->user->name}}"
                                                                           class="img-circle img-responsive"
                                                                           src="{{$profile->avatar}}"></a>

            </div>
        @else
            <div class="col-sm-2">
                <a href="/users" class="pull-right" style="text-decoration: none; color: black">
                    {{$profile->user->name}}
                </a>
            </div>
        @endif
    </div>
    <br>
    <div class="row">
        <div class="col-sm-3">
            <!--left col-->
            <ul class="list-group">
                <li class="list-group-item text-muted" contenteditable="false">Profile</li>
                <li class="list-group-item text-right"><span class="pull-left"><strong class="">Joined</strong></span>
                    {{ $profile->user->created_at->diffForHumans() }}
                </li>
                <li class="list-group-item text-right"><span class="pull-left"><strong
                                class="">Last seen</strong></span>
                    @if(!is_null($profile->user->last_logged_in))
                        {{$profile->user->last_logged_in->diffForHumans()}}
                    @else
                        No logins yet
                    @endif
                </li>
                <li class="list-group-item text-right"><span class="pull-left"><strong
                                class="">Real name</strong></span> {{ $profile->user->name }}
                </li>
            </ul>
            <div class="panel panel-default">
                <div class="panel-heading">Website <i class="fa fa-link fa-1x"></i>

                </div>
                <div class="panel-body"><a href="http://{{$profile->websites[0]->personal_website}}" class="">Personal
                        Website</a>

                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Social Media</div>
                <div class="panel-body">
                    <a href="http://www.facebook.com/{{$profile->websites[0]->facebook_username}}"
                       title="Facebook Profile"><i
                                class="fa fa-facebook fa-2x"></i></a>
                    <a href="http://www.github.com/{{$profile->websites[0]->github_username}}" title="Github Profile"><i
                                class="fa fa-github fa-2x"></i></a>
                    <a href="http://plus.google.com/{{$profile->websites[0]->google_plus_username}}"
                       title="Google+ Profile"><i
                                class="fa fa-google-plus fa-2x"></i></a>
                    <a href="http://www.pinterest.com/{{$profile->websites[0]->pinterest_username}}"
                       title="Pinterest Profile"><i
                                class="fa fa-pinterest fa-2x"></i></a>
                    <a href="http://www.twitter.com/{{$profile->websites[0]->twitter_username}}"
                       title="Twitter Profile"><i
                                class="fa fa-twitter fa-2x"></i></a>
                </div>
            </div>
        </div>
        <!--/col-3-->
        <div class="col-sm-9" style="" contenteditable="false">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $profile->user->username }}'s Bio</div>
                <div class="panel-body"> {{$profile->biography}}
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">{{ $profile->user->username }}'s Bio</div>
                <div class="panel-body"> A long description about me.

                </div>
            </div>
        </div>
        <div id="push"></div>
    </div>
    <footer id="footer">
        <div class="row-fluid">
            <div class="span3">
                <span class="pull-right">©Copyright 2018 <a href="/" title="Comdexx Solutiones LLC">Comdexx Solutions LLC</a> |
                    <a href="/about#privacy">Privacy</a></span>
            </div>
        </div>
    </footer>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>
    jQuery.fn.shake = function (intShakes, intDistance, intDuration, foreColor) {
        this.each(function () {
            if (foreColor && foreColor != "null") {
                $(this).css("color", foreColor);
            }
            $(this).css("position", "relative");
            for (var x = 1; x <= intShakes; x++) {
                $(this).animate({left: (intDistance * -1)}, (((intDuration / intShakes) / 4)))
                    .animate({left: intDistance}, ((intDuration / intShakes) / 2))
                    .animate({left: 0}, (((intDuration / intShakes) / 4)));
                $(this).css("color", "");
            }
        });
        return this;
    };
</script>
</body>
</html>
