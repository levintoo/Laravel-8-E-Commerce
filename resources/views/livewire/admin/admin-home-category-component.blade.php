<div>
    <style>
        nav svg{
            height: 20px;
        }
        nav .hidden{
            display: block !important;
        }
    </style>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6">
                            All Categories
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('admin.addcategories')}}" class="btn btn-success pull-right">Add New Category</a>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    @if(Session::has('message'))
                        <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                    @endif
                        <form class="form-horizontal" wire:submit.prevent="">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Choose Category</label>
                                <div class="col-md-4">
                                    <select name="categories[]" class="form-control sel_categories" multiple="multiple">
                                        @foreach($categories as $category)
                                            <option class="form-control input-md" value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">No Of Products</label>
                                <div class="col-md-4">
                                    <input class="form-control input-md" name="" type="number">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label"></label>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
