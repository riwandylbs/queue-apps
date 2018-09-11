@extends('layouts.admin_layouts.form_table')

@section('breadcrumbs')
 <div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">ADMIN GUDANG A</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href=" {{ route('gudang') }} ">Loket Gudang</a></li>
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
            <form class="form-horizontal" method="post" action=" {{ action('AdminController@setTimeStart', $queueDb->id) }} ">
                @csrf
                <div class="card-body">
                    <!-- <h4 class="card-title"></h4> -->
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label"> Date / Time</label>
                        <div class="col-sm-9">
                            <input type="text" name="check_in" class="form-control" id="fname" value="{{ $queueDb->date_in }}" placeholder="" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Loading Dock No.</label>
                        <div class="col-sm-9">
                            <input type="text" name="loading_dock" value=" {{ $queueDb->loading_dock }} " class="form-control" id="lname" placeholder="Loading Dock No. Here" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Vehicle Number</label>
                        <div class="col-sm-9">
                            <input type="text" name="vehicle_no" value=" {{ $queueDb->vehicle_no }} " class="form-control" id="password" placeholder="Vehicle Number Here" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email1" class="col-sm-3 text-right control-label col-form-label">Expedition Name</label>
                        <div class="col-sm-9">
                            <input type="text" name="expd_name" value=" {{ $queueDb->expd_name }} " class="form-control" id="email1" placeholder="Expedition Name Here" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Card No</label>
                        <div class="col-sm-9">
                            <input type="text" name="card_no" value=" {{ $queueDb->card_no }} " class="form-control" id="cono1" placeholder="Card No Here" readonly>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Type</label>
                        <div class="col-sm-9">
                            @if($queueDb->type != null)
                                <select class="select2 form-control custom-select" name="type" disabled>
                                    <option value=" {{ $queueDb->type }} "> {{ $queueDb->type }} </option>
                            @else
                                <select class="select2 form-control custom-select" name="type">
                                    <option value="Load">Load</option>
                                    <option value="Unload">Unload</option>
                            @endif
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Time Start</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control form-search" value="{{ !empty($queueDb->time_start) ? $queueDb->time_start : date('d-m-Y H:i:s', strtotime(now()))  }}" name="time_start" id="fname" placeholder="Time Start Here">
                            @if($queueDb->time_start == null)
                                <button type="submit" class="btn btn-default search">SET</button>
                            @endif
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Time Finish</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control form-search" value="{{ !empty($queueDb->time_start) ? date('d-m-Y H:i:s', strtotime(now())) : '' }}" name="time_finish" id="fname" placeholder="Time Finish Here">
                            @if($queueDb->time_start != null && $queueDb->time_finish == null)
                                <button type="submit" class="btn btn-default search">SET</button>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Status</label>
                        <div class="col-sm-9">
                            <input type="text" name="status" value=" {{ !empty($queueDb->status) ? $queueDb->status : 'On Progress'  }} " class="form-control" id="cono1" readonly>
                        </div>
                    </div>

                    
                </div>
               
            </form>    
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">HISTORY</h5>
                <div class="table-responsive">
                    <table id="zero_config" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Locations</th>
                                <th>Type</th>
                                <th>Status</th>
                                <th>Date Time In</th>
                                <th>Date Time Out</th>
                            </tr>
                        </thead>
                        <tbody>

                        @foreach($history as $item)
                            <tr>
                                <td> {{ $item->locations }} </td>
                                <td> {{ $item->type }} </td>
                                <td> {{ $item->status }} </td>
                                <td> {{ $item->date_in }} </td>
                                <td> {{ $item->check_out }} </td>

                            </tr>
                        
                        @endforeach
                        
                        </tbody>
                       
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
    @endsection