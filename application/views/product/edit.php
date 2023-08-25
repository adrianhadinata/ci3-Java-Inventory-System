<h2 class="text-center">EDIT PRODUCT</h2>
<a href="<?= base_url('index.php/ProductController') ?>">
    <button type="button" class="btn btn-danger"><- Back</button>
</a>

<?php $attr = array(
    'class' => 'mt-5'
) ?>

<?= $this->session->flashdata('message'); ?>
<?= form_open('ProductController/Edit/' . $this->uri->segment(3), $attr) ?>
  <div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" value="<?= $product["name"] ?>" name="name" class="form-control" id="name" aria-describedby="name" placeholder="Input name..." required>
  </div>
  <div class="mb-3">
    <label for="qty" class="form-label">Quantity</label>
    <input type="number" value="<?= $product["quantity"] ?>" name="qty" class="form-control" id="qty" aria-describedby="qty" placeholder="Input qty..." required>
  </div>
  <div class="mb-3">
    <label for="price" class="form-label">Price</label>
    <input type="number" value="<?= $product["price"] ?>" name="price" class="form-control" id="price" aria-describedby="price" placeholder="Input price..." required>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
<?= form_close() ?>