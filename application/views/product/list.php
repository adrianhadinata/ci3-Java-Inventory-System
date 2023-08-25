<h2 class="text-center">LIST ALL PRODUCT</h2>
<a href="<?= base_url('index.php/ProductController/Add') ?>">
    <button type="button" class="btn btn-primary">+ Add New Product</button>
</a>
<?= $this->session->flashdata('message'); ?>
<table class="table table-hover mt-5">
    <thead>
        <tr>
            <th class="text-center">No.</th>
            <th class="text-center">Name</th>
            <th class="text-center">Qty.</th>
            <th class="text-center">Price (Rp.)</th>
            <th class="text-center" colspan="2">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 0; ?> 
        <?php foreach($list as $product) { ?>
            <?php $no += 1; ?>
            <tr>
                <td class="text-center"><?= $no ?></td>
                <td class="text-center"><?= $product->name ?></td>
                <td class="text-center"><?= $product->quantity ?></td>
                <td class="text-center"><?= $product->price ?></td>
                <td class="text-end">
                    <a href="<?= base_url('index.php/ProductController/Edit_page/' . $product->id) ?>">
                        <button class="btn btn-info">Edit</button>
                    </a>
                </td>
                <td class="text-start">
                    <a href="<?= base_url('index.php/ProductController/Remove/' . $product->id) ?>">
                        <button class="btn btn-danger">Delete</button>
                    </a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>