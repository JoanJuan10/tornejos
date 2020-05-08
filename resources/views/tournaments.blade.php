@extends("layouts.layout")

@section("css")
<style>
    html, body {
        height:100%; margin:0; 
    }
    #mainNav, .footer {
        background-color: black!important;
        color: white;
    }
    .footer {
        align: bottom;
        margin-top:auto;
    }
    body {
        background-image: url("{{asset('img/background.png')}}");
        display: flex;
        flex-direction:column;
    }
</style>
@endsection

@section ("content")
<section>

</section>

@endsection