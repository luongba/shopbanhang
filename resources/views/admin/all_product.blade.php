@extends('admin_layout')
@section('admin_content')
    <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Danh sách sản phẩm
    </div>
{{--     <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
        <select class="input-sm form-control w-sm inline v-middle">
          <option value="0">Bulk action</option>
          <option value="1">Delete selected</option>
          <option value="2">Bulk edit</option>
          <option value="3">Export</option>
        </select>
        <button class="btn btn-sm btn-default">Apply</button>                
      </div>
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
        <div class="input-group">
          <input type="text" class="input-sm form-control" placeholder="Search">
          <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button">Go!</button>
          </span>
        </div>
      </div>
    </div> --}}
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th>
            <th>Tên sản phẩm</th>
            <th>Trạng thái</th>
            <th>Hình ảnh</th>
            <th>Danh mục</th>
            <th>Thương hiệu</th>
            <th>Thời gian</th>
            <th style="width:30px;"></th>
             <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($product as $value)

          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{$value->product_name}}</td>
            <td><span class="text-ellipsis">
              @if($value->brand_status == 0)
                                <p class="text text-success">Hiện </p>
                                @else
                                <p class="text text-danger">Ẩn </p>
                            @endif
            <td><img style="width: 100px; height: 100px" src="{{ asset('public/upload/product/'.$value->product_image) }}" alt=""></td>
            <td>{{$value->category->category_name}}</td>
            <td>{{$value->brand->brand_name}}</td>
            <td>{{$value->created_at}}</td>
            <td>
              <a href="{{ route('product.show',[$value->product_id]) }}" class="active" ui-toggle-class=""><input type="submit" class="btn btn-warning" value="Edit"></a></a>
              
            </td>
            <td>
                              <form action="{{ route('product.destroy',[$value->product_id]) }}" method="POST">
                                  @csrf
                                  @method('delete')
                                  <input type="submit"onclick="return confirm('Bạn có muốn xóa !!')" class="btn btn-danger" value="Delete">
                              </form>
                          </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
{{--     <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
            <li><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
          </ul>
        </div>
      </div>
    </footer> --}}
  </div>
</div>
@endsection