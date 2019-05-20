
    <h3 class="text-center">Product update</h3>
    <form action="./create" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?=$product->id ?>">
        <div class="form-group">
            <label for="">Product Name</label>
            <input type="text" class="form-control" name="name">
        </div>
        <div class="form-group">
            <label for="">Slug</label>
            <input type="text" class="form-control" name="slug">
        </div>

        <div class="form-group">
            <label for="">Description</label>
            <textarea name="description" class="form-control" cols="30" rows="5"></textarea>
        </div>

        <div class="form-group">
            <label for="">Short Description</label>
            <textarea name="short_description" class="form-control" cols="30" rows="5"></textarea>
        </div>

        <div class="form-group">
            <label for="">Price</label>
            <input type="number" class="form-control" name="price" >
        </div>
        <div class="form-group">
            <label for="">Stock</label>
            <input type="number" class="form-control" name="stock" >
        </div>

        <div class="form-group">
            <label for="">Image</label>
            <img src="<?= $product->image ?>" width="100" alt="">
            <input type="file" class="form-control" name="image">
        </div>

        <div class="form-group">
            <label for="">Status</label>
            <select name="status" class="form-control">

                <option value="1" >Active</option>
                <option value="0" >Inactive</option>

            </select>
        </div>

        <div class="form-group">
            <label for="">Category</label>
            <select name="category_id" class="form-control">
                <?php foreach ($categories as $key => $cate): ?>

                <option 
                
                ><?=$cate->name ?></option>

                <?php endforeach ?>
            </select>
        </div>
        <div class="form-group">
            <label for="">User</label>
            <select name="user_id" class="form-control">
                <?php foreach ($users as $key => $u): ?>

                <option value="<?=$u->id?>"><?=$u->username ?></option>

                <?php endforeach ?>
            </select>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-success btn-block">Submit</button>
        </div>
    
    
    </form>
