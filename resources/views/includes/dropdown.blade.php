<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{ URL::asset('css/dropdown.css') }}">

<div style="background:#444;">
	<div class="row">
		<div class="">

            <div class="card hovercard">
                <div class="cardheader">

                </div>
                @if(Storage::disk('local')->has(Auth::user()->first_name . '-' . Auth::user()->id . '.jpg'))
                <div class="avatar">
                    <img src="{{ route ('avatar.image',['filename' => Auth::user()->first_name . '-'  . Auth::user()->id . '.jpg'])}}">
                </div>

                @endif
                <div class="info">
                    <div class="title">
                        <a target="_blank" href="http://scripteden.com/">{{Auth::user()->username}}</a>
                    </div>
                    <div class="desc">Passionate designer</div>
                    <div class="desc">Curious developer</div>
                    <div class="desc">Tech geek</div>
                </div>
                <div class="bottom">
                    <a class="btn btn-primary btn-twitter btn-sm" href="https://twitter.com/webmaniac">
                        <i class="fa fa-twitter"></i>
                    </a>
                    <a class="btn btn-danger btn-sm" rel="publisher"
                       href="https://plus.google.com/+ahmshahnuralam">
                        <i class="fa fa-google-plus"></i>
                    </a>
                    <a class="btn btn-primary btn-sm" rel="publisher"
                       href="https://plus.google.com/shahnuralam">
                        <i class="fa fa-facebook"></i>
                    </a>
                    <a class="btn btn-warning btn-sm" rel="publisher" href="https://plus.google.com/shahnuralam">
                        <i class="fa fa-behance"></i>
                    </a>
                </div>
            </div>

        </div>

	</div>
</div>