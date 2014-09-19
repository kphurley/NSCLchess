@extends('layouts.default')

@section('content')

<!-- Bootstrap core CSS -->
	    <link href="../css/bootstrap.min.css" rel="stylesheet">

	    <!-- Custom styles for this template -->
	    <link href="../css/grid.css" rel="stylesheet">

<h1>Post Announcement:</h1>

<script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
<script type="text/javascript">
tinymce.init({
    selector: "textarea",
    plugins: [
        "advlist autolink lists link image charmap print preview anchor",
        "searchreplace visualblocks code fullscreen",
        "insertdatetime media table contextmenu paste"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
});
</script>

{{ Form::open ( array('url'=>'announcements/create', 'method'=>'POST')) }}

<p>
	{{ Form::label('tit', 'Title:')}}
	<input name="title" type="text" id="title" style="width:100%">
</p>

<p>
    {{ Form::label('auth', 'Author:')}}
    <input name="author" type="text" id="author" style="width:100%">
</p>
    
<textarea name="content" style="width:100%"></textarea>

<br>

<p>
	{{ Form::submit('Add Announcement') }}
</p>



{{ Form::close() }}

@stop