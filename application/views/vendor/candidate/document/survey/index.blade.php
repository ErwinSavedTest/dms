@extends('layouts.app')
@section('page_title', 'Candidates')

@section('content')
    <div class="page-inner">
        <div style="text-align: right"><?= $breadcrumb ?></div>
        <br/>
        <div class="page-section">
            <div class="card card-fluid">
                <!-- .card-header -->
                <div class="card-header">
                    <!-- .nav-tabs -->

                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item">
                            <a href="<?= site_url("vendor/candidate/document/survey/index"); ?>" class="nav-link show active">
                               Candidates TSSR
                            </a>
                        </li>
                    </ul><!-- /.nav-tabs -->
                </div><!-- /.card-header -->
                <!-- .card-body -->
                <div class="card-body">
                    <form method='post' action="<?= base_url() ?>vendor/candidate/document/survey/index">
                        <div class="input-group input-group-alt">
                            <!-- .input-group -->
                            <div class="input-group has-clearable">
                                <button id="clear-search" type="button" class="close" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times-circle"></i></span></button>
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><span class="oi oi-magnifying-glass"></span></span>
                                </div>
                                <input type='text' name='search' value='<?= $search ?>' class='form-control' placeholder='Search Candidate Name' autocomplete="off">
                            </div><!-- /.input-group -->
                            <!-- .input-group-append -->
                            <div class="input-group-append">
                                <button class="btn btn-secondary" type='submit' name='submit' value='Cari'>Filter</button>
                            </div><!-- /.input-group-append -->
                        </div>
                    </form>
                    <br/>
                    <!-- .table-responsive -->
                    <div class="table-responsive">
                        <!-- .table -->
                        <table class="table">
                            <thead>
                            <tr>
                                <th> No </th>
                                <th> Vendor Name </th>
                                <th> WBS ID </th>
                                <th> Candidate Name</th>
                                <th> Create At</th>
                                <th> Status</th>
                                <th style="width:100px; min-width:100px;">  </th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach($candidates as $key => $candidate)
                                <tr>
                                    <td class="align-middle"> {{ $i++ }} </td>
                                    <td class="align-middle"> {{ $candidate->vendor_name }} </td>
                                    <td class="align-middle"> {{ $candidate->wbs_id }} </td>
                                    <td class="align-middle"> {{ $candidate->candidate_name }} </td>
                                    <td class="align-middle"> {{ date('d-M-Y', strtotime($candidate->created_at)) }} </td>
                                    <td class="align-middle"> {{ $candidate->status_revision }} </td>
                                    <td class="align-middle text-center">
                                      @if(empty($candidate->status_revision))
                                          <a href="<?= site_url("vendor/candidate/document/survey/choose/".$candidate->id.""); ?>" class="btn btn-sm btn-icon btn-secondary"><i class="fa fa-check" title="Choose Candidate" onClick="javascript:return confirm('Choose This Candidate ?');"></i> <span class="sr-only">Choose</span></a>
                                      @endif
                                          <a target="_blank" href="<?= site_url("vendor/candidate/document/survey/download/".$candidate->path.""); ?>" class="btn btn-sm btn-icon btn-secondary"><i class="fa fa-file-upload" title="Preview"></i> <span class="sr-only">Download</span></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="dataTables_paginate paging_simple_numbers" id="myTable_paginate">
                            <?= $pagination; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection