<div>
    <style>
        nav svg{
            height: 20px;
        }
        nav .hidden{
            display: block !important;
        }
    </style>
    <div class="container" style="padding: 30px 0 ;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                Add New Product
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('admin.products')}}" class="btn btn-success pull-right" >All Products</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if(Session::has('message'))
                            <dv class="alert alert-success" role="alert">{{Session::get('message')}}</dv>
                        @endif

                        <form class="form-horizontal" method="POST" enctype="multipart/form-data"  wire:submit.prevent="addProduct">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Product Name</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Product Name" class="form-control input-md" wire:model="name" wire:keyup="generateslug">
                                    @error('name') <p class="text-danger">{{$message}}</p>@enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Product Slug</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Category Slug" class="form-control input-md"  wire:model="slug" >
                                    @error('slug') <p class="text-danger">{{$message}}</p>@enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Short Description</label>
                                <div class="col-md-4" wire:ignore>
                                    <textarea class="form-control  input-md" id="short_description" wire:model="short_description"></textarea>
                                    @error('short_description') <p class="text-danger">{{$message}}</p>@enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Description</label>
                                <div class="col-md-4" wire:ignore>
                                    <textarea class="form-control input-md" id="description"  wire:model="description"></textarea>
                                    @error('description') <p class="text-danger">{{$message}}</p>@enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Regular Price</label>
                                <div class="col-md-4">
                                    <input type="number" placeholder="Regular Price" class="form-control input-md" wire:model="regular_price">
                                    @error('regular_price') <p class="text-danger">{{$message}}</p>@enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Sale Price</label>
                                <div class="col-md-4">
                                    <input type="number" placeholder="Sale Price" class="form-control input-md" wire:model="sale_price">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">SKU</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="SKU" class="form-control input-md" wire:model="SKU">
                                    @error('SKU') <p class="text-danger">{{$message}}</p>@enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Stock</label>
                                <div class="col-md-4">
                                    <select class="form-control input-md" wire:model="stock_status">
                                        <option value="instock">InStock</option>
                                        <option value="ouofstock">Out of Stock</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Featured</label>
                                <div class="col-md-4">
                                    <select class="form-control input-md" wire:model="featured">
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Quantity</label>
                                <div class="col-md-4">
                                    <input type="number" placeholder="Quantity" class="form-control input-md" wire:model="quantity">
                                    @error('quantity') <p class="text-danger">{{$message}}</p>@enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Product Image</label>
                                <div class="col-md-4">
                                    <input type="file" class="input-file" wire:model="image" >
                                    @error('image') <p class="text-danger">{{$message}}</p>@enderror
                                    @if($image)
                                        <img src="{{$image->temporaryUrl()}}" width="120">
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Category</label>
                                <div class="col-md-4">
                                    <select class="form-control input-md" wire:model="category_id" >
                                        <option >Select category</option>
                                        @foreach($categories as $category)
                                            <option value={{$category->id}}>{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id') <p class="text-danger">{{$message}}</p>@enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label"></label>
                                <div class="col-md-4">
                                    <input href="" class="btn btn-primary" type="submit" value="Submit">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        $(function(){
           tinymce.init({
               selector:'#short_description',
               plugins: 'a11ychecker advcode casechange export formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
               toolbar: 'a11ycheck addcomment showcomments casechange checklist code export formatpainter pageembed permanentpen table',
               toolbar_mode: 'floating',
               tinycomments_mode: 'embedded',
               tinycomments_author: 'Author name',
               setup:function(editor){
                   editor.on('Change',function(e){
                       tinyMCE.triggerSave();
                       var sd_data = $('#short_description').val();
                       @this.set('short_description',sd_data);
                   });
               }
           });
            tinymce.init({
                selector:'#description',
                plugins: 'a11ychecker advcode casechange export formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
                toolbar: 'a11ycheck addcomment showcomments casechange checklist code export formatpainter pageembed permanentpen table',
                toolbar_mode: 'floating',
                tinycomments_mode: 'embedded',
                tinycomments_author: 'Author name',
                setup:function(editor){
                    editor.on('Change',function (e){
                        tinyMCE.triggerSave();
                        var d_data = $('description').val();
                    @this.set('description',d_data);
                    });
                }
            });
        });
    </script>
@endpush
