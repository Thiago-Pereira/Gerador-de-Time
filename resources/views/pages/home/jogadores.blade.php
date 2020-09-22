@extends('base.index')
@section('content')
	

	@component('base.componentes.navbar')
    @endcomponent
	@component('pages.home.componentes.segmentos', ["jogadores" => $jogadores])
	@endcomponent

@endsection

	