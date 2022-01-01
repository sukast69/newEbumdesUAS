@extends('layouts.admin.master')
@section('title', 'Pemakaian Air')
@section('content')

    <div class="page-inner">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-4">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-users"></i>
                                </span>
                            </div>
                            <select class="form-control input-square" id="squareSelect">
                                <option value="" hidden>Pilih Pengguna</option>
                                <option>1</option>
                                <option>2</option>

                            </select>
                        </div>
                    </div>
                    
                </div>
            </div>

            <div class="card-body">

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover">

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
