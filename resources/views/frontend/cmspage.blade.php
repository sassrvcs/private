@extends('layouts.app')
@section('content')
<section class="fix-container-width cms-page" >
    <div class="container">
        {!! $page->description !!}
    </div>
</section>
@endsection
