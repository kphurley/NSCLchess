@extends('layouts.default')

@section('content')

<!-- Bootstrap core CSS -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="../css/grid.css" rel="stylesheet">

        
	{{ Form::open(array('url'=>'users/create', 'class'=>'form-signup')) }}
    <h2 class="form-signup-heading">NSCL.info - Coach Registration</h2>
    Please fill out the indicated fields to create your NSCL.info coach account.
 
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
 
    {{ Form::text('firstname', null, array('class'=>'input-block-level', 'placeholder'=>'First Name')) }}
    <br>
    <br>
    {{ Form::text('lastname', null, array('class'=>'input-block-level', 'placeholder'=>'Last Name')) }}
<br>
<br>
    {{ Form::text('email', null, array('class'=>'input-block-level', 'placeholder'=>'Email Address')) }}
<br>
<br>

{{ Form::label('sch', 'School:')}} 

{{ Form::select('school', array(

            'Mundelein Carmel' => 'Mundelein Carmel',
            'Deerfield' => 'Deerfield',
            'Evanston' => 'Evanston',
            'Glenbrook North' => 'Glenbrook North',
            'Glenbrook South' => 'Glenbrook South',
            'Highland Park' => 'Highland Park',
            'Lake Forest' => 'Lake Forest',
            'Maine South' => 'Maine South',
            'Maine West' => 'Maine West',
            'Mundelein' => 'Mundelein',
            'New Trier' => 'New Trier',
            'Niles West' => 'Niles West',
            'Niles North' => 'Niles North',
            'Northridge Prep' => 'Northridge Prep',
            'Notre Dame' => 'Notre Dame',
            'Stevenson' => 'Stevenson',
            'Waukegan' => 'Waukegan'
        ))}}

        <br>
        <br>
    {{ Form::password('password', array('class'=>'input-block-level', 'placeholder'=>'Password')) }}
    <br>
    <br>
    {{ Form::password('password_confirmation', array('class'=>'input-block-level', 'placeholder'=>'Confirm Password')) }}
 <br>
 <br>
    {{ Form::submit('Register', array('class'=>'btn btn-primary'))}}<br>
{{ Form::close() }}
@stop