@extends('layout')

@section('content')
<div id="#content" class="site-content">
    <div class="container">
        <!--page title-->
        <div class="page_title_area row">
            <div class="col-md-12">
                <div class="bredcrumb">
                    <ul>
                        <li><a href="#">Home</a>
                        </li>
                        <li class="active"><a href="#">LOẠI SẢN PHẨM</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--/.page title-->

        <!--Login-Page-->
        <div class="login-page">
            <div class="row">
                <div class="col">
                    <div class="cart-total">
                        <h3 class="">SẢN PHẨM</h3>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                <th>
                                    ID
                                </th>
                                <th>
                                    Tên
                                </th>
                                <th>
                                    Slug
                                </th>
                                <th>
                                   Giá
                                </th>
                                <th>
                                    Mô tả
                                 </th>
                                 <th>
                                    Hình
                                 </th>
                                 <th>
                                    Lượt xem
                                 </th>
                                 <th>
                                    Trạng thái
                                 </th>
                                 <th>
                                    Ngày tạo
                                 </th>
                                 <th>
                                    Ngày cập nhật
                                 </th>
                                <th>
                                </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($list as $item)
                                <tr>
                                    <td>
                                        {{$item->id}}
                                    </td>
                                    <td>
                                        {{$item->name}}
                                    </td>
                                    <td>
                                        {{$item->slug}}
                                    </td>
                                    <td>
                                        {{$item->price}}
                                    </td>
                                    <td>
                                        {{$item->description}}
                                    </td>
                                    <td>
                                       <img src="{{$item->image}}" alt="" style="width:90px;margin-left:auto;margin-right:auto;display:block;">
                                    </td>
                                    <td>
                                        {{$item->viewers}}
                                    </td>
                                    
                                        @if($item->status==0)
                                        <td>
                                            <p>Ẩn</p>
                                        </td>
                                        @else
                                            <td>
                                                <p>Hiện</p>
                                            </td>
                                        @endif
                                    
                                    <td>
                                        {{$item->created_at}}
                                    </td>
                                    <td>
                                        {{$item->updated_at}}
                                    </td>
                                    <td>
                                    <button type="button" class="btn btn-dark btn-icon-text"><a href="{{route('products.edit',['id' => $item->id])}}">Sửa</a></button>
                                    <button type="button" class="btn btn-warning btn-icon-text"><a href="{{route('delete',['id' => $item->id])}}">Xóa</a></button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            </table>
                            {!! $list->links('name') !!}
                        <a href="{{route('add')}}"><button type="submit" class="details-btn btn">THÊM</button></a>
                    </div>
                    <!--losin-->
                </div>
                <!--col-md-6-->


            </div>
            <!--row-->
        </div>
        <!--/.login-page-->

    </div>
    <!--/.container-->
</div>
@endsection
