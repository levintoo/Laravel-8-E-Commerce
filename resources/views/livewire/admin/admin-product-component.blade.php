<div>
    <style>
        nav svg{
            height: 20px;
        }
        nav .hidden{
            display: block !important;
        }
    </style>
{{--    If you look to others for fulfillment, you will never truly be fulfilled.--}}
    <div class="container" style="padding: 30px 0 ;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                       <div class="row">
                           <div class="col-md-6">
                               All Product
                           </div>
                           <div class="col-md-6">
                               <a href="{{route('admin.addproducts')}}" class="btn btn-success pull-right" >Add Products</a>
                           </div>
                       </div>
                    </div>
                    <div class="panel-body">
                        @if(Session::has('message'))
                            <dv class="alert alert-success" role="alert">{{Session::get('message')}}</dv>
                        @endif
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Stock</th>
                                <th>Price</th>
                                <th>Sale Price</th>
                                <th>Category</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>{{$product->id}}</td>
                                    <td>{{$product->name}}</td>
                                    <td><img src="{{asset('assets/images/products')}}/{{$product->image}}" width="60" /></td>
                                    <td>{{$product->stock_status}}</td>
                                    <td>{{$product->regular_price}}</td>
                                    <td>
                                        @php
                                        if ($product->sale_price>0){
                                                echo $product->regular_price;
                                            }else{
                                                 echo '-';
                                            };
                                        @endphp
                                    </td>
                                    <td>{{$product->category->name}}</td>
                                    <td>{{$product->created_at}}</td>
                                    <td>
                                        <a href="{{route('admin.editproduct',['product_slug'=>$product->slug])}}"  ><i class="fa fa-edit fa-2x"></i></a>
                                        <a href="#" onclick="confirm('Are you sure you want to delete this product?') || event.stopImmediatePropagation()"  style="margin-left: 10px;" wire:click.prevent="deleteProduct({{$product->id}})"><i class="fa fa-times fa-2x text-danger"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$products->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
