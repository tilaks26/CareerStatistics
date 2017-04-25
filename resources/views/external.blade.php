@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">External Resources</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="GET" action="{{ route('external.show') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('resources') ? ' has-error' : '' }}">
                            <div class="col-md-6">
                                <table class="table table-hover table-condensed" >
                                    <tr>
                                        <th class="col-md-3">Name</th>
                                        <th class="col-md-3">Link</th>
                                    </tr>
                                    <?php  
                                        foreach ($resources as $resource) {
                                        ?>
                                        <tr>
                                            <td class="col-md-3">{{ $resource->name }}</td>
                                            <td class="col-md-3"><a href="{{ $resource->link }}">{{ $resource->link }}</td>
                                        </tr>
                                        <?php
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