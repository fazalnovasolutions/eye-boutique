@extends('layouts.backend')

@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">
                    Main Title <small class="d-block d-sm-inline-block mt-2 mt-sm-0 font-size-base font-w400 text-muted">Subtitle</small>
                </h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">Examples</li>
                        <li class="breadcrumb-item" aria-current="page">
                            <a class="link-fx" href="">Blank</a>
                        </li>
                    </ol>
                </nav>
            </div>
       </div>
    </div>
    <!-- END Hero -->

    <!-- Page Content -->
    <div class="content">
        <!-- Your Block -->
        <div class="block">
            <ul class="nav nav-tabs nav-tabs-block nav-justified" data-toggle="tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" href="#btabs-animated-fade-home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="#btabs-animated-fade-home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#btabs-animated-fade-profile">Profile</a>
                </li>
                <li class="nav-item ml-auto">
                    <a class="nav-link" href="#btabs-animated-fade-settings">
                        <i class="si si-settings"></i>
                    </a>
                </li>
            </ul>
            <div class="block-content tab-content overflow-hidden">
                <div class="tab-pane fade active show" id="btabs-animated-fade-home" role="tabpanel">
                    <h4 class="font-w400">Home Content</h4>
                    <p>Content fades in..</p>
                </div>
                <div class="tab-pane fade" id="btabs-animated-fade-profile" role="tabpanel">
                    <h4 class="font-w400">Profile Content</h4>
                    <p>Content fades in..</p>
                </div>
                <div class="tab-pane fade" id="btabs-animated-fade-settings" role="tabpanel">
                    <h4 class="font-w400">Settings Content</h4>
                    <p>Content fades in..</p>
                </div>
            </div>
        </div>
    </div>
    <!-- END Page Content -->
@endsection
