@extends('layouts.profile')

@section('content')
<div class="col-md-2">
        @if (Auth::check())
            @if ($is_edit_profile)
            <a href="#" class="navbar-btn navbar-right">
                <button type="button" class="btn btn-default">Edit Profile</button>
            </a>
            @elseif ($is_follow_button)
            <a href="{{ url('/follows/' . $user->username) }}" class="navbar-btn navbar-right">
                <button type="button" class="btn btn-default">Follow</button>
            </a>
            @else
            <a href="{{ url('/unfollows/' . $user->username) }}" class="navbar-btn navbar-right">
                <button type="button" class="btn btn-default">Unfollow</button>
            </a>
            @endif
        @endif
</div>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Profile</div>
                <div class="panel-body">
                    {{ $username }}
                    <div class="list-group">
                        @forelse ($user->tweets()->get() as $tweet)
                            <a href="#" class="list-group-item">
                                <h4 class="list-group-item-heading">{{ $tweet->body }}</h4>
                                <p class="list-group-item-text">{{ $tweet->created_at }}</p>
                            </a>
                        @empty
                            <p>No tweet</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection