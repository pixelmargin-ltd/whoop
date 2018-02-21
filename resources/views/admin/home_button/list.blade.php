@extends('admin.layouts.baselayout')
@section('title', 'Request By Post List')
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
                                    <span class="widget-caption">Request By Post List</span>
                                </div>

                                <div class="widget-body">
                                    @if(Session::has('success'))
                                        <div class="alert alert-success fade in">
                                            {{ Session::get('success') }}
                                        </div>
                                    @endif
                                    <ul class="nav nav-tabs">
                                        <li class="active">
                                            <a data-toggle="tab" href="#cities">Pending</a>
                                        </li>
                                        <li>
                                            <a data-toggle="tab" href="#others">Posted</a>
                                        </li>
                                    </ul>

                                    <div class="tab-content">
                                        <div id="cities" class="tab-pane fade in active">
                                            @if(count($requestByPostPending)>0)
                                                @include('admin.home_button.partials.pending_table')
                                            @else
                                                <h3>No Pending Requests Found</h3>
                                            @endif
                                        </div>
                                        <div id="others" class="tab-pane fade">
                                            @if(count($requestByPostPending)>0)
                                                @include('admin.home_button.partials.posted_table')
                                            @else
                                                <h3>No Requests have posted</h3>
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