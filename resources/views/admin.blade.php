@extends('main')

@section('styles')
  @include('css.admin')
  @yield('style')
@endsection

@include('components.left-bar')
@section('body')

<div class="manten">
  @yield('breadcrumb')

  <div class="col-sm-12">
    <div class="search">
      @yield('search')
    </div>

    <div class="main-btns">
      @yield('main-buttons')
    </div>
  </div>

  <div class="contenidor">
    @yield('container')
  </div>

</div>

@endsection

@section('scripts')
  @include('js.admin')
  @yield('script')
@endsection
