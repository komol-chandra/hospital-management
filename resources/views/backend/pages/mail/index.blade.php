@extends('backend.layouts.app')
@section('content')
@section('title', '|  Mail')
@section('header-title', 'Mail')
@section('breadcrumb', ' Mail')
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-bd lobidrag">
            <div class="panel-heading">
                <div class="btn-group"> 
                    <a class="btn btn-success" href="{{ url('/admin/mail/create') }}"> <i class="fa fa-plus"></i> Add Mail
                    </a>  
                </div>        
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="panel-header">
                        <div class="col-sm-4 col-xs-12">
                            <div class="dataTables_length">
                                <label>Display 
                                    <select name="example_length">
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select> records per page</label>
                            </div>
                        </div>
                        <div class="col-sm-4 col-xs-12">
                            <div class="dataTables_length">    
                            </div>
                        </div>
                        <div class="col-sm-4 col-xs-12">
                            <div class="dataTables_length">
                                <div class="input-group custom-search-form">
                                    <input type="search" class="form-control" placeholder="search..">
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary" type="button">
                                            <span class="glyphicon glyphicon-search"></span>
                                        </button>
                                    </span>
                                </div><!-- /input-group -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>created By</th>
                                <th>created Date</th>
                                <th>Send To</th>
                                <th>Subject</th>
                                <th>Message</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($data as $key => $value)
                            <tr>
                                <td>{{ $value->user->name ?? null }}</td>
                                <td>{{ $value->today_date ?? null }}</td>
                                <td>{{ $value->mail_to ?? null}}</td>
                                <td>{{ $value->subject ?? null}}</td>
                                <td>{!! $value->message ?? null !!}</td>
                                <td>
                                    <form method="post" id="deleteForm">
                                        @method('delete')
                                        @csrf
                                    </form>
                                    <a class="btn btn-danger btn-xs" onclick="event.preventDefault(); Delete({{ $value->id }});"><i class="fa fa-trash-o"></i></a>
                                    <a class="btn btn-info btn-xs" href="{{url('admin/notice/'.$value->id)}}"><i class="fa fa-eye"></i></a>    
                                </td>
                                
                            </tr>
                            @empty
                            <tr>
                                <td>NO DATA</td>
                                <td>NO DATA</td>
                                <td>NO DATA</td>
                                <td>NO DATA</td>
                                <td>NO Action</td>
                                
                            </tr>
                            @endforelse
                                
                            
                        </tbody>
                    </table>
                </div>
                {{ $data->links() }}
            </div>
        </div>
    </div>
</div>
<script>
    function Delete(id){
    var id=id;
    iziToast.question({
        timeout: 20000,
        close: true,
        overlay: true,
        displayMode: 'once',
        id: 'question',
        zindex: 999,
        title: 'Wait!',
        message: 'Are you sure? Once Deleted Can\'t be undone!',
        position: 'center',
        buttons: [
            ['<button><b>YES</b></button>', function () {
                var $form = $("#deleteForm").closest('form');
                $form.attr('action','/admin/mail/'+id);
                $form.submit()
            }, true],
            ['<button>NO</button>', function (instance, toast) {
                instance.hide({ transitionOut: 'fadeOut' }, toast, 'button');
            }],
        ],
    });
}
</script>
@endsection