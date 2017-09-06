@extends('layouts.master')
@section('content')
    @if(Session()->has('thongbao'))
        <div class="alert alert-success">
            {!! Session::get('thongbao') !!}
        </div>
    @endif
     <table class="table  table-striped table-bordered table-hover dataTable no-footer" id="editable_table" role="grid" aria-describedby="editable_table_info">
        <thead>
            <tr role="row">
                <th class="wid-20 sorting_asc" tabindex="0" rowspan="1" colspan="1" aria-controls="editable_table" aria-sort="ascending" aria-label="Username: activate to sort column descending" style="width: 155.5px;">Tên</th>
                <th class="wid-25 sorting" tabindex="0" rowspan="1" colspan="1" aria-controls="editable_table" aria-label="E-Mail: activate to sort column ascending" style="width: 258.5px;">E-Mail</th>
                <th class="wid-10 sorting" tabindex="0" rowspan="1" colspan="1" aria-controls="editable_table" aria-label="Gender: activate to sort column ascending" style="width: 65.5px;">Phone</th>
                <th class="wid-20 sorting" tabindex="0" rowspan="1" colspan="1" aria-controls="editable_table" aria-label="City: activate to sort column ascending" style="width: 152.5px;">Chúc vụ</th>
                <th class="wid-15 sorting" tabindex="0" rowspan="1" colspan="1" aria-controls="editable_table" aria-label="Status: activate to sort column ascending" style="width: 58.5px;">Trạng thái</th>
                <th class="wid-10 sorting" tabindex="0" rowspan="1" colspan="1" aria-controls="editable_table" aria-label="Actions: activate to sort column ascending" style="width: 67.5px;">Actions</th>
            </tr>
        </thead>
    @foreach($data as $row)
        <tbody>
            <tr role="row" class="odd">
                <td class="sorting_1">{!! $row->name !!}</td>
                <td>{!! $row->email !!}</td>
                <td>{!! $row->phone !!}</td>
                <td class="center">
                                    @if( $row->level == 0)
                                        Quản lý
                                    @else
                                        Nhân viên
                                    @endif
                </td>
                <td class="center">
                                    @if( $row->Status == 0)
                                        Đã kích hoạt
                                    @else
                                        Chưa kích hoạt
                                    @endif
                </td>
                <td>
                    <a href="{!! url('/user/edit/'.$row->id) !!}" class="edit" title=""><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                    <span style="margin: 0 10px"></span>
                    @if($row->level == 1)
                        <a class="delete hidden-xs hidden-sm"  title="" href="{!! url('/user/delete/'.$row->id.'/'.$row->id_nhom) !!}" ><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                    @endif
                </td>
            </tr>
        </tbody>
    @endforeach
        
    </table>

@endsection