<div class="p-3 mb-2 bg-dark text-light border border-secondary" style="background-image: var(--bs-gradient)"> 

<h1> Product List </h1>
</div>
<div class="p-3 mb-2 bg-light text-dark"style="background-image: var(--bs-gradient)"  >
<p>
       <a href ="/products/Create"  class="btn btn-success">Create product </a>
</p>

   <form>
   
   <div class="input-group mb-3">
  <input type="text" class="form-control" placeholder="Search For Products" name="search" value="<?php echo $search ?>">
  <button class="btn btn-outline-primary" type="submit" >Search</button>
   </div>

   
   </form>

    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Image</th>
      <th scope="col">Title</th>
      <th scope="col">Price</th>
      <th scope="col">DateTime</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
   <?php foreach($products as $i=> $product) :?>
   <tr>
      <th scope="row"><?php echo $i+1 ;?></th>
      <td>
      <?php if($product['Image']): ?>
        <img src="/<?php echo $product['Image'];?>" class="thumb-image">
      <?php endif;?>
      </td>
      <td><?php echo $product['Title']?></td>
      <td><?php echo $product['Price']?></td>
      <td><?php echo $product['DateTime']?></td>
      <td>
      <a href="/products/Update?id=<?php echo $product['id']?>" class="btn btn-sm btn-outline-primary">Update</a>
      <form style="display: inline-block"method="POST" action="/products/delete">

      <input type="hidden" name="id" value="<?php echo $product['id']?>">
      <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>

      </form>
     </td>
    </tr>

  <?php endforeach; ?>
   
  </tbody>
  </div>
</table>
