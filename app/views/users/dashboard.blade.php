@extends('layouts.default')

@section('content')
<h1>NSCL Coach Dashboard</h1> <br />

<p>{{ link_to_route('new_player', 'Add New Player', null, array('class'=>'btn btn-large btn-primary')) }}</p>
<p>{{ link_to_route('add_match', 'Add New Match', null, array('class'=>'btn btn-large btn-primary')) }}</p>


@stop