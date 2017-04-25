@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Manage Users</div>
                <div class="panel-body">
                    <form class="form-horizontal" id ="form" role="form" method="POST" action="{{ route('admin.delete') }}">
                        {{ csrf_field() }}

                        <input name="_method" type="hidden" value="PUT">

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <select id="name" class="form-control" name="name" data-parsley-required="true">
                                <option value="default" selected="selected">--Select Username--</option>
                                    @foreach ($names as $name) 
                                    {
                                        <option value="{{ $name->username }}">{{ $name->username }}</option>
                                    }
                                    @endforeach
                                </select>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('position') ? ' has-error' : '' }}">
                            <label for="position" class="col-md-4 control-label">Job Position</label>

                            <div class="col-md-6">
                                <select id="position" class="form-control" name="position" data-parsley-required="true">
                                @foreach ($positions as $position) 
                                    {
                                        <option value="{{ $positions->position }}">{{ $positions->position }}</option>
                                    }
                                    @endforeach
                                </select>

                                @if ($errors->has('position'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('position') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Delete
                                </button>
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
    $(document).ready(function(){    
        if({{ $error }} == 0)
        {
            alert("Record successfully deleted!");
        }

        $("#name").on("change",function(){
            var x_value = $("#name").val();
            
            $.ajax({
                url:'/careerstatistics/public/admin/company',
                data: { "username" : x_value, "_token": "{{ csrf_token() }}" },
                dataType: 'json',
                type: 'POST',
                success: function(data){
                    $("#position").html(data.msg);               
                },
                error: function(data){
                    $("#position").html(data.msg);
                },
            });

        });

    });

</script>
@endsection