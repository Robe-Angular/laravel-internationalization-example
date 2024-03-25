@php
    $host_with_locale = $_SERVER['HTTP_HOST'].'/'.App::getLocale();
    $current_url_without_prefix = Str::after(url()->current(),App::getLocale());
    if(strpos($current_url_without_prefix, '/') === 0){
        $current_url_without_prefix = Str::after($current_url_without_prefix,'/');
    }
@endphp

<a href="{{ url(App::getLocale().'/') }}"> Welcome </a>
<a href="{{ url(App::getLocale().'/another-page') }}"> Another Page </a>
<a href="{{ url('es/'.$current_url_without_prefix) }}"> es {{ url('es/'.$current_url_without_prefix) }}  {{ url()->current() }}</a> 
<a href="{{ url('en/'.$current_url_without_prefix) }}"> en </a>