@extends('layouts.default')

@section('content')
<h1>NSCL Coach Dashboard</h1>

<p>{{ link_to_route('new_player', 'Add New Player') }}</p>
<p>{{ link_to_route('add_match', 'Add New Match') }}</p>


@stop