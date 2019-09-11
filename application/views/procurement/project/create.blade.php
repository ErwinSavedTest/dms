@extends('layouts.app')
@section('page_title', 'Project')

@section('header')
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/select2/select2.css">
@endsection
@section('content')
    <div class="page-inner">
        <div style="text-align: right"><?= $breadcrumb ?></div>
        <br/>
        <div class="page-section">
            <div id="base-style" class="card">
                <!-- .card-body -->
                <div class="card-body">
                    <!-- .form -->
                <?php
                $data  = [
                    'class' => 'null'
                ];
                echo form_open('procurement/project/store',$data);
                ?>
                <!-- .fieldset -->
                    <fieldset>
                        <legend>Assign Project</legend>

                        @if(!empty(validation_errors()))
                            <div class="col-lg-12">
                                <div class="alert alert-warning alert-dismissible fade show">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong><?php echo validation_errors(); ?></strong>
                                </div>
                            </div>
                        @endif

                        <div class="row">

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label  for="selDefault">WBS ID / IRO</label>
                                    <select name="wbs_id" class="custom-select js-example-basic-single">
                                        <option value="" selected="selected">Select</option>
                                        <?php
                                        foreach ($projects as $project) {
                                            echo"<option value='$project->td_planning_detail_wbs_id'> $project->td_planning_detail_wbs_id / $project->tm_planning_iro_number </option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>


                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label  for="selDefault">Vendor</label>
                                    <select name="vendor_id" class="custom-select js-example-basic-single">
                                        <option value="" selected="selected">Select</option>
                                        <?php
                                        foreach ($vendors as $vendor) {
                                        echo"<option value='$vendor->id'> $vendor->name </option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                        </div>

                        <div class="publisher-actions">
                            <!-- .publisher-tools -->
                            <div class="publisher-tools mr-auto">
                            </div>
                            <!-- /.publisher-tools -->
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </fieldset>
                    <?php echo form_close();?>
                </div><!-- /.card-body -->
            </div>
        </div>
    </div>
@endsection
@section('footer')
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/select2/select2.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/select2/select2.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".js-example-basic-single").select2();
        });
    </script>
@endsection