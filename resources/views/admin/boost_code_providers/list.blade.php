@extends('admin.layouts.baselayout')
@section('title', 'Boost Code Providers List')
@section('content')
    @include('admin.includes.navigation')
    <div class="main-container container-fluid">
        <div class="page-container">
            @include('admin.includes.sidebar')
            <div class="page-content">
                <div class="page-body">
                    <div class="row">
                        <div class="col-xs-12 col-md-12">
                            <div class="widget">

                                <div class="widget-header ">
                               <span class="widget-caption">
                                   <a href="{{route('boost_code_providers.create')}}"
                                      class="btn btn-default btn-xs shiny icon-only blue addnewbtn">
                                       <i class="fa fa-plus"></i>
                                   </a>
                                   Boost Code Providers List
                               </span>
                                </div>

                                <div class="widget-body">
                                    @if(Session::has('success'))
                                        <div class="alert alert-success fade in">
                                            {{ Session::get('success') }}
                                        </div>
                                    @endif
                                    <ul class="nav nav-tabs">
                                        <li class="active">
                                            <a data-toggle="tab" href="#cities">Cities</a>
                                        </li>
                                        <li>
                                            <a data-toggle="tab" href="#others">Others</a>
                                        </li>
                                    </ul>

                                    <div class="tab-content">
                                        <div id="cities" class="tab-pane fade in active">
                                            @if(count($cities)>0)
                                                @include('admin.boost_code_providers.partials.cities_table')
                                            @else
                                                <h3>No cities Found</h3>
                                            @endif
                                        </div>
                                        <div id="others" class="tab-pane fade">
                                            @if(count($others)>0)
                                                @include('admin.boost_code_providers.partials.others_table')
                                            @else
                                                <h3>No Other Boost Code Providers Found</h3>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop