@extends('layouts.app')
@section('page_title', 'Pic')

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
             echo form_open('project/pic/store',$data);
            ?>
                    <!-- .fieldset -->
                    <fieldset>
                        <legend>PIC</legend>

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
                                <label  for="selDefault">Project Name</label>
                                <select name="project_id" class="custom-select js-example-basic-single">
                                    <option value="" selected="selected">Select Project Name</option>
                                    <?php
                                    foreach ($projects as $project) {
                                        echo"<option value='$project->id'> $project->wbs_id / $project->iro_number </option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="tf1">Layer</label>
                                <select class="form-control" name="layer">
                                    <option value="" selected="selected">Layer</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label  for="selDefault">Email</label>
                                <select name="username" class="custom-select js-example-basic-single">
                                    <option value="" selected="selected">Select PIC Name</option>
                                    <?php
                                    foreach ($users as $user) {
                                        echo"<option value='$user->username'> $user->email </option>";
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