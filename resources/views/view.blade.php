@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">View Statistics</div>
                <div class="panel-body">
                    <form class="form-horizontal" id="form" role="form" method="" action="">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('month') ? ' has-error' : '' }}">
                            <label for="month" class="col-md-4 control-label">Graduation Month</label>

                            <div class="col-md-6">
                                <select name="month" id="month">
                                    <option value="May">May</option>
                                    <option value="December">December</option>
                                </select>

                                @if ($errors->has('month'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('month') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('year') ? ' has-error' : '' }}">
                            <label for="year" class="col-md-4 control-label">Graduation Year</label>

                            <div class="col-md-6">
                                {{ Form::selectYear('year', 2010, 2019) }}

                                @if ($errors->has('year'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('year') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button id="submit" type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="dialog" title="Result" hidden="hidden">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Records</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="GET">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('users') ? ' has-error' : '' }}">
                            <div class="col-md-6">
                                <table id="table" class="table table-hover table-condensed">
                                    <col width="130">
                                    <col width="80">
                                    <tr>
                                        <th class="col-md-3">Name</th>
                                        <th class="col-md-3">Position</th>
                                        <th class="col-md-3">Email</th>
                                    </tr>
                                    <?php
                                        if (isset($users)) {
                                        foreach ($users as $user) {
                                        ?>
                                        <tr>
                                            <td class="col-md-3"><?php echo $user->username ?></td>
                                            <td class="col-md-3"><?php echo $user->position ?></td>
                                            <td class="col-md-3"><?php echo $user->email ?></td>
                                        </tr>
                                        <?php
                                        }
                                        }
                                    ?>
                                </table>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('page-js-script')
<script type="text/javascript">
    $.noConflict();
    $(document).ready(function(){
        $( "#dialog" ).dialog({
            autoOpen: false,
            maxWidth: 630,
            maxHeight: 400,
            width: 630,
            height: 400,
            modal: true,
            show: {
                effect: "blind",
                duration: 1000
            },
            hide: {
                effect: "blind",
                duration: 1000
            }
        });

        $("#form").submit(function () {
            var x_value = $("#month").val();
            var y_value = $("[name='year']").val();

            $.ajax({
                url:'/careerstatistics/public/view',
                data: { "month" : x_value, "year" : y_value, "_token": "{{ csrf_token() }}" },
                dataType: 'json',
                type: 'POST',
                success: function(data){
                    $( "#table" ).html(data.msg);
                    $( "#dialog" ).dialog( "open" );            
                },
                error: function(data){
                    $( "#table" ).html(data.msg);
                    $( "#dialog" ).dialog( "open" ); 
                },
            });
            return false;
        });
    });


</script>
@endsection