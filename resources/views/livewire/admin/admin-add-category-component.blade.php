<div>
     <div class="row" style="padding: 30px 0;">
         <div class="col-md-12">
             <div class="panel panel-default">
                 <div class="panel-heading">
                     <div class="row">
                         <div class="col-md-6">
                             Add New Categories
                         </div>
                         <div class="col-md-6">
                             <a href="{{route('admin.categories')}}" class="btn btn-success">All Categories</a>
                         </div>
                     </div>
                 </div>
                 <div class="panel-body">

                     <form class="form-horizontal" wire:submit.prevent="storeCategory">
                         <div class="form-group">
                             <label class="col-md-4 control-label">Category Name</label>
                             <div class="col-md-4">
                                 <input type="text" placeholder="Category Name" class="form-control input-md" wire:model="name" wire:keyup="generateslug"/>
                             </div>
                         </div>
                         <div class="form-group">
                             <label class="col-md-4 control-label">Category Slug</label>
                             <div class="col-md-4">
                                 <input type="text" placeholder="Category Slug" class="form-control input-md"  wire:model="slug" />
                             </div>
                         </div>
                         <div class="form-group">
                             <label class="col-md-4 control-label">Category Name</label>
                             <div class="col-md-4">
                                 <button type="submit" class="btn btn-primary">Submit</button>
                             </div>
                         </div>
                     </form>
                 </div>
             </div>
         </div>
     </div>
</div>
