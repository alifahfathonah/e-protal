@extends('layouts.app')

@section('content')

<div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-home" aria-hidden="true"></i><a href="{{route('dashboard')}}">Dashboard</a></li>
                <li><i class="fa fa-home" aria-hidden="true"></i><a href="javascript:avoid(0)">Manage Slider</a></li>
            </ul>
        </div>
    </div>
   <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    <div class="row animated fadeInUp">
        <div class="row">
            <div class="col-sm-12 col-md-12">
                @include('includes.message')
                <div class="panel b-primary bt-md">
                    <div class="panel-content">
                        <div class="row">
                            <div class="col-xs-6">
                                <h4>Manage Product</h4>
                            </div>
                            <div class="col-xs-6 text-right">
                                <a href="{{route('add-product')}}" class="btn btn-primary">Add Product</a>
                            </div>
                        </div>
                       <div class="table-responsive">
                                <table id="basic-table" class="data-table table table-striped nowrap table-hover table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>Sl No</th>
                                        <th>Title</th>
                                        <th>Price</th>
                                        <th>Sub Title</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php($i = 1)
                                    @foreach($product as $row)
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td>{{ $row->title }}</td>
                                        <td>{{ $row->price }}</td>
                                        <td>{{ $row->sub_title }}</td>
                                        <td>{{ $row->desc }}</td>
                                        <td><img style="width: 60px" src="{{ asset('uploads/'.$row->image) }}" alt=""></td>
                                        <td>
                                            <input type="checkbox" data-toggle="toggle" data-size="mini" data-on="Active" data-off="Inactive" id="sliderStatus" data-id="{{ $row->id }}" {{ $row->status == 1 ? 'checked':''}}>
                                        </td>
                                        <td>
                                              @if( $row->status == 1)
                                            <a href="{{route('inactive-product',$row->id)}}" class="btn btn-danger btn-xs"><i class="fa fa-close"></i></a>
                                            @else
                                            <a href="{{route('active-product',$row->id)}}" class="btn btn-info btn-xs"><i class="fa fa-check-square-o"></i></a>
                                            @endif
                                            <a href="{{route('edit-product',$row->id)}}" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></a>
                                            <a href="{{route('delete-product',$row->id)}}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>
                                        </td>
                                    </tr>
                                    @php($i++)
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
 
    </div>

@endsection