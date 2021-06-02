

<?php if (!empty($errors)):?>
    <div class="alert alert-danger">
    <?php foreach($errors as $error):?>
        <div>
        <?php echo $error ?>
        </div>
    <?php endforeach; ?>
    </div>
    <?php endif; ?>
    <div class="p-3 mb-2 bg-light text-dark"style="background-image: var(--bs-gradient)" >

    <form action="" method="POST" enctype="multipart/form-data">
    <?php if($product['Image']):?>
         <img src="/<?php echo $product['Image']?>" class="update-image">

    <?php endif; ?>

    <div class="form-group">
    <label> Product Image </label>
    </br>
    <input type="file" name="Image">
  </div>
  <div class="form-group">
    <label> Product Title </label>
    <input type="text" name="Title"  class="form-control" value=<?php echo $product['Title']?> >
  </div>
  <div class="form-group">
    <label> Product Description </label>
    <textarea  class="form-control summernote" name="Describtion" value=<?php echo $product['Describtion']?> > </textarea>
  </div>
  <div class="form-group">
    <label> Product Price </label>
    <input type="number" step=".01" class="form-control" name="Price" value=<?php echo $product['Price']?> >
  </div>
  </br>
<button type="submit" class="btn btn-primary">Submit</button>

</form>
</div>

<Script>
        $(document).ready(function () {
            $('.summernote').summernote({
                height: 250
            });
        });
</Script>

   