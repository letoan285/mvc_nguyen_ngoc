<??>
    <h3 class="text-center">Product List</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>STT</th>
                <th>Image</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Category</th>
                <th>
                    <a class="btn btn-sm btn-success" href="./products/create">Create</a>
                </th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($products as $key => $product): ?>
            <tr>
                <td><?= $key+1; ?></td>
                <td><img src="<?= $product->image ?>" width="100" alt=""></td>
                <td><a href="./products/detail?id=<?=$product->id ?>"> <?= $product->name; ?> </a></td>
                <td><?= $product->price; ?></td>
                <td><?=  $product->getCateName($product->category_id) ; ?></td>
                <td>
                    <a class="btn btn-sm btn-primary" href="edit.php?id=<?=$product->id ?>">Sua</a>
                    <a class="btn btn-sm btn-danger" href="./delete.php?id=<?=$product->id?>">Xoa</a>
                </td>
            </tr>
            
        <?php endforeach ?>

        </tbody>
    </table>
