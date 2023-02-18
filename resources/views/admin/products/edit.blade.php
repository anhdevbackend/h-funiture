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
                        <li class="active"><a href="#">THÊM LOẠI SẢN PHẨM</a>
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
                    <div class="login">
                        <h3 class="small-title">Sửa sản phẩm</h3>
                        <form action="" method="POST" class="register-form">
                            @csrf
                            
                            <div class="col-md-6 col-sm-6 no-padding-left">
                                <div class="first-name">
                                    <label for="name">Tên sản phẩm<span class="required">*</span>
                                    </label>
                                    <br>
                                    <input type="text" name="name" class="input-field" id="name" value="{{$products->name}}">
                                </div>
                            </div>
                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                            <div class="col-md-6 col-sm-6 no-padding-right">
                                <div class="last-name">
                                    <label for="slug">Slug<span class="required">*</span>
                                    </label>
                                    <br>
                                    <input type="text" name="slug" class="input-field" id="slug" value="{{$products->slug}}">
                                </div>
                            </div>
                            @error('slug')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                            <div class="col-md-6 col-sm-6 no-padding-left">
                                <div class="price">
                                    <label for="price">Giá <span class="required">*</span>
                                    </label>
                                    <br>
                                    <input type="number" name="price" value="{{$products->price}}" class="input-field"  ">
                                </div>
                            </div>
                            @error('price')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            <div class="col-md-6 col-sm-6 no-padding-right">
                                <div class="description">
                                    <label for="description">Mô tả <span class="required">*</span>
                                    </label>
                                    <br>
                                    <input type="text" name="description" class="input-field" id="confirm-email" value="{{$products->description}}">
                                </div>
                            </div>
                            @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            <div class="col-md-6 col-sm-6 no-padding-left">
                                <div class="image">
                                    <label for="description">Hình <span class="required">*</span>
                                    </label>
                                    <br>
                                    <input type="file" name="image" class="input-field" id="image">{{$products->image}}
                                </div>
                            </div>
                            @error('image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                            <div class="col-md-6 col-sm-6 no-padding-right">
                                <div class="status">
                                    <label for="description">Trạng thái <span class="required">*</span>
                                    </label>
                                    <br>
                                    <div class="">
                                        <div class="col-md-6 col-sm-12 no-padding-right">
                                            <label>
                                                <input  type="radio" name="status" id="status" value="1" {{($products->status == '1') ? 'Checked' : ''}}>
                                                Hiện
                                            </label>
                                        </div>
                                        <div class="col-md-6 col-sm-12 no-padding-right">
                                            <label>
                                                <input  type="radio" name="status" id="status" value="0" {{($products->status == '0') ? 'Checked' : ''}}>
                                                Ẩn
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @error('status')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            <div class="col-md-6 col-sm-6 no-padding-left">
                                <div class="id_category">
                                    <label for="id_category">Loại sản phẩm <span class="required">*</span>
                                    </label>
                                    <select id="id_category" name="id_category" class="">
                                        <option selected>Chọn loại sản phẩm</option>
                                        @foreach($cats as $item)
                                        <option value="{{$item->id}}" id="id_category" name="id_category">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @error('id_category')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            <div class="col-md-12 col-sm-12 no-padding-left">
                                <div class="submit">
                                    <button type="submit" class="btn-hover btn-submit">Sửa</button>
                                </div>
                            </div>
                        </form>
                        <!--register-form-->
                    </div>
                    <!--login-->
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
