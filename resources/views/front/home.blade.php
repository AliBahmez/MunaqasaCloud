@extends('layouts.front')

@section('content')
    <div>
        Home
        Welcome form {{ $common->getAppName() }}
        <!-- Nothing in life is to be feared, it is only to be understood. Now is the time to understand more, so that we may fear less. - Marie Curie -->
        <a href="{{ route('account.front.signin') }}">Sign In</a>
    </div>
@endsection
