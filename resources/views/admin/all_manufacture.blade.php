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

    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon user"></i><span class="break"></span>Members</h2>
                <div class="box-icon">

                </div>
            </div>
            <div class="box-content">


                <table class="table table-striped table-bordered bootstrap-datatable datatable">
                    <thead>
                    <tr>
                        <th>manufacture id</th>
                        <th>manufacture name</th>
                        <th>manufacture description</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>

                    @foreach($manage_manufacture as $single_manufacture)
                        <tbody>
                        <tr>
                            <td>{{$single_manufacture->manufacture_id}}</td>
                            <td class="center">{{$single_manufacture->manufacture_name}}</td>
                            <td class="center">{{$single_manufacture->manufacture_description}}</td>

                            <td class="center">
                                @if($single_manufacture->publication_status==1)
                                    <span class="label label-success">Active</span>
                                @else
                                    <span class="label label-success">Unactive</span>
                                @endif
                            </td>
                            <td class="center">
                                @if($single_manufacture->publication_status==1)
                                    <a class="btn btn-danger" href="{{URL::to('/unactive_manufacture/'.$single_manufacture->manufacture_id)}}">
                                        <i class="halflings-icon white thumbs-down"></i>
                                    </a>
                                @else
                                    <a class="btn btn-success" href="{{URL::to('/active_manufacture/'.$single_manufacture->manufacture_id)}}">
                                        <i class="halflings-icon white thumbs-up"></i>
                                    </a>
                                @endif
                                <a class="btn btn-info" href="{{URL::to('/edit_manufacture/'.$single_manufacture->manufacture_id)}}">
                                    <i class="halflings-icon white edit"></i>
                                </a>
                                <a class="btn btn-danger" href="{{URL::to('/delete_manufacture/'.$single_manufacture->manufacture_id)}}">
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
