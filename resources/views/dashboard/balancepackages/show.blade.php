@extends('layouts.master')
@section('css')
@endsection
@section('content')
@include('partial.page-header')
    <!-- row -->
  @include('dashboard.balancepackages.single')
    <!-- End Row -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!--Internal  Contact js -->
    <script src="{{URL::asset('assets/js/contact.js')}}"></script>
@endsection