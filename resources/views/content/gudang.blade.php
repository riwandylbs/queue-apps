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
            <form class="form-horizontal">
                <div class="card-body">
                    <!-- <h4 class="card-title"></h4> -->
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label"> Date / Time</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="fname" value="{{ date('d-m-Y H:i:s', strtotime(now())) }}" placeholder="" Disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Loading Dock No.</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="lname" placeholder="Loading Dock No. Here">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Vehicle Number</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="password" placeholder="Vehicle Number Here">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email1" class="col-sm-3 text-right control-label col-form-label">Expedition Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="email1" placeholder="Expedition Name Here">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Card No</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="cono1" placeholder="Card No Here">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Type</label>
                        <div class="col-sm-9">
                            <select class="select2 form-control custom-select" style="width: 100%; height:36px;">
                                <option value="-">Load</option>
                                <option value="-">Unload</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Time Start</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control form-search" value="{{ date('d-m-Y H:i:s', strtotime(now())) }}" name="search_vehicle" id="fname" placeholder="Vehicle Number Here">
                            <button type="submit" class="btn btn-default search">SET</button>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Time Finish</label>
                        <div class="col-sm-9 date" id="datetimepicker1" data-target-input="nearest">
                            <input type="text" class="form-control form-search datetimepicker-input" data-target="#datetimepicker1" />
                            <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Status</label>
                        <div class="col-sm-9">
                            <input type="text" name="status" value="On Progress" class="form-control" id="cono1" readonly>
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
                                <th>Location</th>
                                <th>Type</th>
                                <th>Status</th>
                                <th>Date Time In</th>
                                <th>Date Time Out</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td>System Architect</td>
                                <td>Edinburgh</td>
                                <td>61</td>
                                <td>2011/04/25</td>
                                <td>$320,800</td>
                            </tr>
                        
                        </tbody>
                       
                    </table>
                </div>

            </div>
        </div>
    <!-- </div> -->
@endsection