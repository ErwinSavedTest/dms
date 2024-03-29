@extends('layouts.app')
@section('page_title', 'Document Setting')

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
                        'name' => 'document-setting'
                    ];
             echo form_open('admin/documentsetting/store',$data);
            ?>
                    <!-- .fieldset -->
                    <fieldset>
                        <legend>Create Document Setting</legend>

                    <div class="row">

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="tf1">Document Name</label>
                                <select class="form-control" name="document_name" required>
                                    <option value="" selected="selected">.:Choose:.</option>
                                    <option value="SITAC TSA">SITAC TSA</option>
                                    <option value="FOUNDATION and ERECTION">FOUNDATION and ERECTION</option>
                                    <option value="FENCE">FENCE</option>
                                    <option value="RFI">RFI</option>
                                    <option value="PAT">PAT</option>
                                    <option value="ADD REDUCE">ADD REDUCE</option>
                                    <option value="ABD">ABD</option>
                                    <option value="HAND OVER">HAND OVER</option>
                                    <option value="BAST">BAST</option>
                                </select>
                            </div>
                        </div>

                      <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dynamic_field">
                                <tr>
                                    <td>
                                        <select name="group_id[]" class="custom-select js-example-basic-single" required="">
                                            <option value="" selected="selected">Select Role</option>
                                            @foreach ($roles as $role)
                                                 <option value="{{ $role->id }}">{{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <select  name="document_type[]" class="custom-select js-example-basic-single" required="">
                                            <option value="" selected="selected">Type</option>
                                            <option value="Prepared">Prepared</option>
                                            <option value="Acknowledge">Acknowledge</option>
                                            <option value="Acknowledge">Approved</option>
                                            <option value="Reviewed & Supervised">Reviewed & Supervised</option>
                                            <option value="Handed Over">Handed Over</option>
                                            <option value="Checked">Checked</option>
                                            <option value="Review">Review</option>
                                        </select>
                                    </td>
                                    <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
                                </tr>
                            </table>
                        </div>
                      </div>

                    </div>

                        <div class="publisher-actions">
                            <div class="publisher-tools mr-auto">
                            </div>
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
    <script type="text/javascript">
        $(document).ready(function(){
            var i=1;

            $('#add').click(function(){
                i++;
                $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added">' +
                    '<td>' + '<select name="group_id[]" class="custom-select" required="">\n' +
                    '<option value="" selected="selected">Select Role</option>' +
                    @foreach ($roles as $role)
                       '<option value="{{ $role->id }}"> {{ $role->name }} </option>'+
                    @endforeach
                    '</select></td>' +
                    '<td><select  name="document_type[]" class="custom-select" required="">\n' +
                    '    <option value="" selected="selected">Type</option>\n' +
                    '    <option value="Prepared">Prepared</option>\n' +
                    '    <option value="Acknowledge">Acknowledge</option>\n' +
                    '    <option value="Approved">Approved</option>\n' +
                    '    <option value="Reviewed & Supervised">Reviewed & Supervised</option>\n' +
                    '    <option value="Handed Over">Handed Over</option>\n' +
                    '    <option value="Checked">Checked</option>\n' +
                    '    <option value="Review">Review</option>\n' +
                    '    </select></td>' +
                    '<td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
            });

            $(document).on('click', '.btn_remove', function(){
                var button_id = $(this).attr("id");
                $('#row'+button_id+'').remove();
            });

        });
    </script>
@endsection