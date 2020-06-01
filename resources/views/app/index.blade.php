@extends('layouts.backend')

@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">
                    EyeWear-Boutique
                </h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item"> EyeWear-Boutique</li>
                        <li class="breadcrumb-item" aria-current="page">
                            <a class="link-fx" href="">Dashboard</a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="block">
            <ul class="nav nav-tabs nav-tabs-block nav-justified" data-toggle="tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" href="#btabs-animated-fade-install">Installation Guide</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#btabs-animated-fade-lense">Lenses</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#btabs-animated-fade-coating">Coating</a>
                </li>
{{--                <li class="nav-item ml-auto">--}}
{{--                    <a class="nav-link" href="#btabs-animated-fade-settings">--}}
{{--                        <i class="si si-settings"></i>--}}
{{--                    </a>--}}
{{--                </li>--}}
            </ul>
            <div class="block-content tab-content overflow-hidden">
                <div class="tab-pane fade active show" id="btabs-animated-fade-install" role="tabpanel">
                    <h4 class="font-w400">Installation Guide</h4>
                 <p>Add Url '/install?shop=Your Shop Name' In Link</p>
                </div>
                <div class="tab-pane fade" id="btabs-animated-fade-lense" role="tabpanel">
                    <h4 class="font-w400">Lenses <button style="float: right" class="text-white btn btn-primary btn-sm" data-toggle="modal" data-target="#lens_create_modal">Add New Lens</button></h4>


                    <div class="modal fade" id="lens_create_modal" tabindex="-1" role="dialog" aria-labelledby="modal-block-normal" aria-modal="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="block block-themed block-transparent mb-0">
                                    <div class="block-header bg-primary-dark">
                                        <h3 class="block-title">New Lens</h3>

                                        <div class="block-options">
                                            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                                <i class="fa fa-fw fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <form action="{{route('lens.save')}}" method="post">
                                        @csrf
                                        <div class="block-content font-size-sm">
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <div class="form-material">
                                                        <label for="material-error">Name</label>
                                                        <input required class="form-control" type="text"  name="name"
                                                               placeholder="Enter Title here">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <div class="form-material">
                                                        <label for="material-error">Description</label>
                                                        <textarea required class="js-summernote" name="description"
                                                                  placeholder="Please Enter Description here !"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <div class="form-material">
                                                        <label for="material-error">Price</label>
                                                        <input required class="form-control" type="number" step="any"  name="price"
                                                               placeholder="Lens Price">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="block-content block-content-full text-right border-top">
                                            <a type="button" class="btn btn-sm btn-light" data-dismiss="modal">Close</a>
                                            <button type="submit" class="btn btn-sm btn-primary" >Save</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                    @if(count($lenses) > 0)
                    <div class="table-responsive">
                        <table class="table table-borderless table-hover table-vcenter">
                            <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Name</th>
                                <th >Description</th>
                                <th>Price</th>
                                <th class="text-right"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($lenses as $index => $item)
                                <tr>
                                    <td>{{$index+1}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{!! $item->description !!}</td>
                                    <td>{{number_format($item->price,2)}}</td>
                                    <td class="text-right">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#lens_edit_modal{{$index}}">
                                                <i class="fa fa-fw fa-pencil-alt"></i>
                                            </button>
                                            <button onclick="window.location.href='{{route('lens.delete',$item->id)}}'" type="button" class="btn btn-sm btn-danger js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Delete Lens">
                                                <i class="fa fa-fw fa-times"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <div class="modal fade" id="lens_edit_modal{{$index}}" tabindex="-1" role="dialog" aria-labelledby="modal-block-normal" aria-modal="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="block block-themed block-transparent mb-0">
                                                <div class="block-header bg-primary-dark">
                                                    <h3 class="block-title">Edit Lens</h3>

                                                    <div class="block-options">
                                                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                                            <i class="fa fa-fw fa-times"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <form action="{{route('lens.update',$item->id)}}" method="post">
                                                    @csrf
                                                    <div class="block-content font-size-sm">
                                                        <div class="form-group">
                                                            <div class="col-sm-12">
                                                                <div class="form-material">
                                                                    <label for="material-error">Name</label>
                                                                    <input required class="form-control" type="text"  name="name"
                                                                           placeholder="Enter Title here" value="{{$item->name}}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-sm-12">
                                                                <div class="form-material">
                                                                    <label for="material-error">Description</label>
                                                                    <textarea required class="js-summernote" name="description"
                                                                              placeholder="Please Enter Description here !">{!! $item->description !!}</textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-sm-12">
                                                                <div class="form-material">
                                                                    <label for="material-error">Price</label>
                                                                    <input required class="form-control" type="number" step="any"  name="price"
                                                                           placeholder="Lens Price" value="{{$item->price}}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="block-content block-content-full text-right border-top">
                                                        <a type="button" class="btn btn-sm btn-light" data-dismiss="modal">Close</a>
                                                        <button type="submit" class="btn btn-sm btn-primary" >Save</button>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @endforeach

                            </tbody>
                        </table>
                    </div>
                        @else
                        <p class="text-center"> No Lens Available</p>
                    @endif

                </div>
                <div class="tab-pane fade" id="btabs-animated-fade-coating" role="tabpanel">
                    <h4 class="font-w400">Coatings
                        <button style="float: right" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#coating_create_modal">Add New Coating</button></h4>
                    <div class="modal fade" id="coating_create_modal" tabindex="-1" role="dialog" aria-labelledby="modal-block-normal" aria-modal="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="block block-themed block-transparent mb-0">
                                    <div class="block-header bg-primary-dark">
                                        <h3 class="block-title">New Coating</h3>

                                        <div class="block-options">
                                            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                                <i class="fa fa-fw fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <form action="{{route('coating.save')}}" method="post">
                                        @csrf
                                        <div class="block-content font-size-sm">
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <div class="form-material">
                                                        <label for="material-error">Name</label>
                                                        <input required class="form-control" type="text"  name="name"
                                                               placeholder="Enter Title here">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <div class="form-material">
                                                        <label for="material-error">Description</label>
                                                        <textarea required class="js-summernote" name="description"
                                                                  placeholder="Please Enter Description here !"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <div class="form-material">
                                                        <label for="material-error">Price</label>
                                                        <input required class="form-control" type="number" step="any"  name="price"
                                                               placeholder="Lens Price">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="block-content block-content-full text-right border-top">
                                            <a type="button" class="btn btn-sm btn-light" data-dismiss="modal">Close</a>
                                            <button type="submit" class="btn btn-sm btn-primary" >Save</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                    @if(count($coatings) > 0)
                        <div class="table-responsive">
                            <table class="table table-borderless table-hover table-vcenter">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>Name</th>
                                    <th >Description</th>
                                    <th>Price</th>
                                    <th class="text-right"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($coatings as $index => $item)
                                    <tr>
                                        <td>{{$index+1}}</td>
                                        <td>{{$item->name}}</td>
                                        <td>{!! $item->description !!}</td>
                                        <td>{{number_format($item->price,2)}}</td>
                                        <td class="text-right">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#coating_edit_modal{{$index}}">
                                                    <i class="fa fa-fw fa-pencil-alt"></i>
                                                </button>
                                                <button onclick="window.location.href='{{route('coating.delete',$item->id)}}'" type="button" class="btn btn-sm btn-danger js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Delete Lens">
                                                    <i class="fa fa-fw fa-times"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="coating_edit_modal{{$index}}" tabindex="-1" role="dialog" aria-labelledby="modal-block-normal" aria-modal="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="block block-themed block-transparent mb-0">
                                                    <div class="block-header bg-primary-dark">
                                                        <h3 class="block-title">Edit Lens</h3>

                                                        <div class="block-options">
                                                            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                                                <i class="fa fa-fw fa-times"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <form action="{{route('coating.update',$item->id)}}" method="post">
                                                        @csrf
                                                        <div class="block-content font-size-sm">
                                                            <div class="form-group">
                                                                <div class="col-sm-12">
                                                                    <div class="form-material">
                                                                        <label for="material-error">Name</label>
                                                                        <input required class="form-control" type="text"  name="name"
                                                                               placeholder="Enter Title here" value="{{$item->name}}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-sm-12">
                                                                    <div class="form-material">
                                                                        <label for="material-error">Description</label>
                                                                        <textarea required class="js-summernote" name="description"
                                                                                  placeholder="Please Enter Description here !">{!! $item->description !!}</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-sm-12">
                                                                    <div class="form-material">
                                                                        <label for="material-error">Price</label>
                                                                        <input required class="form-control" type="number" step="any"  name="price"
                                                                               placeholder="Lens Price" value="{{$item->price}}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="block-content block-content-full text-right border-top">
                                                            <a type="button" class="btn btn-sm btn-light" data-dismiss="modal">Close</a>
                                                            <button type="submit" class="btn btn-sm btn-primary" >Save</button>
                                                        </div>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                @endforeach


                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="text-center"> No Coating Available</p>
                    @endif
                </div>
{{--                <div class="tab-pane fade" id="btabs-animated-fade-settings" role="tabpanel">--}}
{{--                    <h4 class="font-w400">Settings Content</h4>--}}
{{--                    <p>Content fades in..</p>--}}
{{--                </div>--}}
            </div>
        </div>
    </div>

    @endsection
