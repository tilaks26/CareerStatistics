@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add/Update Resources</div>
                <div class="panel-body">
                    
                    <form class="form-horizontal" id="form1" role="form" method="POST" action="{{ route('admin.store') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Company Name</label>

                            <div class="col-md-6">
                                <select id="name" class="form-control" name="name" data-parsley-required="true">
                                    @foreach ($names as $name) 
                                    {
                                        <option value="{{ $name->name }}">{{ $name->name }}</option>
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

                        <div class="form-group{{ $errors->has('link') ? ' has-error' : '' }}">
                            <label for="link" class="col-md-4 control-label">Link</label>

                            <div class="col-md-6">
                                <input id="link" type="text" class="form-control" name="link" value="{{ old('link') }}" required autofocus>

                                @if ($errors->has('link'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('link') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" id="submit1" name="store_submit" class="btn btn-primary">
                                    Store
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Delete Resources</div>
                <div class="panel-body">
                    <form class="form-horizontal" id="form2" role="form" method="POST" action="{{ route('admin.remove') }}">
                        {{ csrf_field() }}

                        <input name="_method" type="hidden" value="PUT">

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Company Name</label>

                            <div class="col-md-6">
                                <select id="name" class="form-control" name="name" data-parsley-required="true">
                                    @foreach ($rnames as $name) 
                                    {
                                        <option value="{{ $name->name }}">{{ $name->name }}</option>
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


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" name="remove_submit" class="btn btn-primary">
                                    Remove
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
            alert("External resource successfully updated!");
        }
        else if ({{ $error }} == 1)
        {
            alert("External resource successfully stored!");
        }
        else if ({{ $error }} == 3)
        {
            alert("External resource successfully deleted!");
        }
    });
</script>
@endsection