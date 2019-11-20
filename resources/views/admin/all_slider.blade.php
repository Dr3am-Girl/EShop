@extends('admin.admin_layout')
@section('admin_content')

    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="index.html">Home</a>
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="#">Tables</a></li>
    </ul>
    <p class="alert-success">
        <?php
        $message=Session::get('message');
        echo $message;
        Session::put('message',null);


        ?>


    </p>
    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon user"></i><span class="break"></span>Slider</h2>
                <div class="box-icon">

                </div>
            </div>
            <div class="box-content">


                <table class="table table-striped table-bordered bootstrap-datatable datatable">
                    <thead>
                    <tr>

                        <th>slider id</th>
                        <th>slider image</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>

                    @foreach($manage_slider as $single_slider)
                        <tbody>
                        <tr>
                            <td>{{$single_slider->slider_id}}</td>
                            <td>
                                <img src="{{URL::to($single_slider->slider_image)}}" style="height:80px;width:80px;">slider
                            <td class="center">
                                @if($single_slider->publication_status==1)
                                    <span class="label label-success">Active</span>
                                @else
                                    <span class="label label-success">Unactive</span>
                                @endif
                            </td>
                            <td class="center">
                                @if($single_slider->publication_status==1)

                                    <a class="btn btn-danger" href="{{URL::to('/unactive_slider/'.$single_slider->slider_id)}}">
                                        <i class="halflings-icon white thumbs-down"></i>
                                    </a>
                                @else

                                    <a class="btn btn-success" href="{{URL::to('/active_slider/'.$single_slider->slider_id)}}">
                                        <i class="halflings-icon white thumbs-up"></i>
                                    </a>
                                @endif

                                <a class="btn btn-danger" href="{{URL::to('/delete_slider/'.$single_slider->slider_id)}}">
                                    <i class="halflings-icon white trash"></i>
                                </a>
                            </td>
                        </tr>

                        </tbody>
                    @endforeach
                </table>
            </div>
        </div><!--/span-->

    </div><!--/row-->

@endsection
