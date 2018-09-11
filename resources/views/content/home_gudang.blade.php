@extends('layouts.admin_layouts.form_table')

@section('breadcrumbs')
 <div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">ADMIN LOKET</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Admin Loket</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection

@section('form_loket')
<div class="row">
    <div class="col-md-12">

        <div class="card">
            <div class="card-body">
                <form action="" method="post" class="form-horizontal">
                    @csrf
                <h5 class="card-title">SEARCH VEHICLE</h5>
                <br />
                <div class="form-group row col-sm-8 align-items-left date-search">                    
                    <div class="col-lg-12 col-md-12">
                        <div class="input-group">
                            <input type="text" class="form-control datepiecker-search" name="data-list" placeholder="Date" aria-label="Recipient 's username" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2"> <i class="mdi mdi-calendar-clock"></i> </span>
                            </div>

                            <input type="text" class="form-control car-search" name="data-list" placeholder="Vehicle Number" aria-label="Recipient 's username" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2"> <i class="mdi mdi-car"></i> </span>
                            </div>
                            <button type="submit" class="btn btn-default search">Search</button>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="zero_config" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Loading Dock</th>
                                <th>Date Time In</th>
                                <th>Vehicle Number</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                        @foreach($queueDb as $item)

                            <tr>
                              <td> {{ $item->loading_dock }} </td>
                              <td> {{ $item->date_in }} </td>
                              <td> {{ $item->vehicle_no }} </td>
                              <td> {{ $item->status }} </td>
                              <td>    
                                    @if($item->status != 'on progress' && $item->status != 'done')
                                        <a href="" class="btn btn-secondary"><i class="mdi mdi-grease-pencil"></i></a> 
                                    @endif
                                    <a href="" class="btn btn-success"><i class="mdi mdi-eye"></i></a> 
                                </td>      
                            </tr>
                            </tr>

                        @endforeach
                        
                        </tbody>
                       
                    </table>
                </div>

            </div>
        </div>
    <!-- </div> -->
@endsection