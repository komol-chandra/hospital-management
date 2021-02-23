@extends('backend.layouts.app')
@section('content')
@section('title', '|  Doctor Report')
@section('header-title', 'Doctor Report')
@section('breadcrumb', ' Doctor Report')
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-bd lobidrag">
            <div class="panel-heading">
                <div class="btn-group"> 
                      
                </div>        
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="panel-header">
                        <div class="col-sm-12 col-xs-12">
                            <h4>Filter By Date</h4>
                            <form action="/admin/doctor-report/search" method="post" id="searchData">@csrf
                                <div class="col-md-5"><label for="">Starting</label><input type="date" name="starting"></div>
                                <div class="col-md-5"><label for="">Ending</label><input type="date" name="ending"></div>
                                <div class="col-md-2"><button type="submit" class="btn btn-success">Search</button></div>
                                
                            </form>
                            {{-- <div class="dataTables_length">
                                <label>Display 
                                    <select name="example_length">
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select> records per page</label>
                            </div> --}}
                        </div><br>
                        {{-- <div class="col-sm-4 col-xs-12">
                            <div class="dataTables_length">    
                            </div>
                        </div> --}}
                        {{-- <div class="col-sm-4 col-xs-12">
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
                        </div> --}}
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Doctor Name</th>
                                <th>Department</th>
                                <th>Number of Appointment</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @forelse($doctors as $key => $value)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>
                                    <img src="/{{ $value->picture ?? 'backend/files/profile.jpg' }}" class="img-circle" alt="User Image" height="50" width="50">
                                </td>
                                <td>{{ $value->name ?? null }}</td>
                                <td>{{ $value->departments->name ?? null }}</td>
                                <td>{{ $value->mobile ?? null}}</td>
                                <td class="text-center">
                                    @if($value->status == 1)
                                    <i class="fa fa-circle" style="color:green"></i>
                                    @else
                                    <i class="fa fa-circle" style="color:red"></i>
                                    @endif
                                </td>
                                <td>
                                    @if($value->status == 1)
                                    <a class="btn btn-danger btn-xs" id="status" href="/admin/doctor/status/{{ $value->id }}"><i class="fa fa-refresh"></i></a>
                                    @else
                                    <a class="btn btn-info btn-xs" id="status" href="/admin/doctor/status/{{ $value->id }}"><i class="fa fa-refresh"></i></a>
                                    @endif
                                    <form method="post" id="deleteForm">
                                        @method('delete')
                                        @csrf
                                    </form>
                                    <a class="btn btn-danger btn-xs" onclick="event.preventDefault(); Delete({{ $value->id }});"><i class="fa fa-trash-o"></i></a>
                                    <a class="btn btn-info btn-xs" href="{{url('admin/doctor/'.$value->id)}}"><i class="fa fa-eye"></i></a> 
                                    <a class="btn btn-info btn-xs" href="{{url('admin/doctor/'.$value->id.'/edit')}}"><i class="fa fa-pencil"></i></a>   
                                </td>
                                
                            </tr>
                            @empty
                            <tr>
                                <td>NO DATA</td>
                                <td>NO DATA</td>
                                <td>NO DATA</td>
                                <td>NO DATA</td>
                                <td>NO DATA</td>
                                <td>NO Action</td>
                                
                            </tr>
                            @endforelse --}}
                                
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
    // $(document).ready(function () {
    //     $(this).on("submit", "#searchData ", function (e) {
    //     e.preventDefault();
    //     let data = $(this).serializeArray();
    //     $.ajax({
    //         url: `/admin/doctor-report/search`,
    //         data: data,
    //         type: "post",
    //         dataType: "json",
    //     });
    // });



    // console.log("ready");
    // dataList();
    // $(".dataList").on("click", ".page-link", function (e) {
    //     e.preventDefault();
    //     let page_link = $(this).attr("href");
    //     dataList(page_link);
    // });
    // $(document).on("keyup", ".search", function () {
    //     dataList();
    // });
// });
// function dataList(page_link = "/admin/dataList") {
//     let search = $(".search").val();
//     $.ajax({
//         url: page_link,
//         data: { search: search },
//         type: "get",
//         datatype: "html",
//         success: function (response) {
//             $(".dataList").html(response);
//         },
//     });
// }
</script>
@endsection