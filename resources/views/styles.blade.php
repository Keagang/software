@extends('welcome');

@section('style')
<style type="text/css">
	div.social {
		margin-bottom: 1em;
	}
	div.social a {
    	width: 32px;
    	height: 32px;
    	background: #F58703;
    	display: inline-block;
		margin:0 0.2em;
		transition: 0.5s all;
    	-webkit-transition: 0.5s all;
    	-moz-transition: 0.5s all;
    	-o-transition: 0.5s all;
    	-ms-transition: 0.5s all;
	    border-radius: 20px;
	}
	div.social i {
		padding-top: 20%;
	}
	body {
		background-color: #d6ebd9;
	}

</style>
@endsection
