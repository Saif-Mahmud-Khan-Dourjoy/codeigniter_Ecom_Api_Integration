<?php foreach ($products as $value): ?>
            <div class="col-6 col-sm-4">
            <div class="card top-product-card mb-3">
            <div class="card-body">
            
            <?php 
            $type =  $value->discount_type;
            $amount = $value->discount;
            $sale = $value->sale_price;
            $title=$value->title;
            $newtitle=preg_replace('/\s+/', '_', $title);
            // echo $newtitle;
            if (!empty($amount))
            {
                if($type == "percent"){
                $price = $sale-(($sale*$amount)/100);
                    ?>
                    <span class="badge badge-success"> <?php echo $amount ?>%</span>
                <?php } else { 
            $price = $sale-$amount;?>
                <span class="badge badge-success"><?php echo $amount ?>TK</span>
            <?php 
        } } ?>
              

            <a class='product-thumbnail d-block' href='single-product.html?id=<?php echo $value->product_id; ?>'>
            <img src='<?php echo base_url(); ?>uploads/product_image/product_<?php echo $value->product_id; ?>_1.jpg' alt=''>
            </a><a class='product-title d-block' href='single-product.html?id=<?php echo $value->product_id; ?>'><?php echo $value->title ?></a>
            <p class="sale-price">৳ <?php if (!empty($amount)){ echo $price; ?><span><?php echo $value->sale_price;}else{echo $value->sale_price;} ?></span></p>
            <div class="product-rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div>
            <a href="#" data-shipping_cost="<?php echo $value->shipping_cost; ?>" data-id="<?php echo $value->product_id; ?>"  data-name="<?php echo $newtitle; ?>" data-price="<?php  if (!empty($amount)){echo $price;}else{ echo $value->sale_price;} ?>" class="add_to_cart btn btn-danger"><i class="fa fa-cart-plus"></i></a></div>
            </div>
            </div>
        <?php endforeach; ?>
        <script>
      var shoppingCart = (function() {
  // =============================
  // Private methods and propeties
  // =============================
    cart = [];

  
  // Constructor
  function Item(shipping_cost,id,name, price, count) {
    this.id=id;
    this.shipping_cost=shipping_cost;  
    this.name = name;
    this.price = price;
    this.count = count;
  }
  
  // Save cart
  function saveCart() {
    sessionStorage.setItem('shoppingCart', JSON.stringify(cart));
  }
  
    // Load cart
  function loadCart() {
    cart = JSON.parse(sessionStorage.getItem('shoppingCart'));
  }
  if (sessionStorage.getItem("shoppingCart") != null) {
    loadCart();
  }

  

  // =============================
  // Public methods and propeties 
  // =============================
  var obj = {};
  
  // Add to cart
  obj.addItemToCart = function(shipping_cost,id,name, price, count) {
    for(var item in cart) {
      if(cart[item].name === name) {
        cart[item].count ++;
        saveCart();
        return;
      }
    }
    var item = new Item(shipping_cost,id,name, price, count);
    cart.push(item);
    saveCart();
  }
  // Set count from item
  obj.setCountForItem = function(name, count) {
    for(var i in cart) {
      if (cart[i].name === name) {
        cart[i].count = count;

        break;
      }
    }
  };
  // Remove item from cart
  obj.removeItemFromCart = function(name) {
      for(var item in cart) {
        if(cart[item].name === name) {
          cart[item].count --;
          if(cart[item].count === 0) {
            cart.splice(item, 1);
          }
          break;
        }
    }
    saveCart();
  }

  // Remove all items from cart
  obj.removeItemFromCartAll = function(name) {
    for(var item in cart) {
      if(cart[item].name === name) {
        cart.splice(item, 1);
        break;
      }
    }
    saveCart();
  }

  // Clear cart
  obj.clearCart = function() {
    cart = [];
    saveCart();
  }

  // Count cart 
  obj.totalCount = function() {
    var totalCount = 0;
    for(var item in cart) {
      totalCount += cart[item].count;
    }
    localStorage.setItem('totalPro',totalCount); 
    return totalCount;
   
  }

  // Total cart
  obj.totalCart = function() {
    var totalCart = 0;
    for(var item in cart) {
      totalCart += cart[item].price * cart[item].count;
    }

    return Number(totalCart.toFixed(2));
  }

  // List cart
  obj.listCart = function() {
    var cartCopy = [];
    for(i in cart) {
      item = cart[i];
      itemCopy = {};
      for(p in item) {
        itemCopy[p] = item[p];

      }
      itemCopy.total = Number(item.price * item.count).toFixed(2);
      cartCopy.push(itemCopy)
    }
    return cartCopy;
  }

  return obj;
})();

// Add Item
$('.add_to_cart').click(function(event) {
  event.preventDefault();
  var id=$(this).data('id');
  var shipping_cost=$(this).data('shipping_cost');
  var name=$(this).data("name");
  var price=$(this).data("price");
  shoppingCart.addItemToCart(shipping_cost,id,name, price, 1);
  displayCart();
});


$('.clear-cart').click(function() {
  shoppingCart.clearCart();
  displayCart();
});

// Display item
function displayCart() {
  var cartArray = shoppingCart.listCart();
  var output = "";
  for(var i in cartArray) {
    output += "<tr>"
      + "<td>" + cartArray[i].name + "</td>" 
      + "<td>(" + cartArray[i].price + ")</td>"
      + "<td><div class='input-group'><button class='minus-item input-group-addon btn btn-primary' data-name=" + cartArray[i].name + ">-</button>"
      + "<input type='number' class='item-count form-control' data-name='" + cartArray[i].name + "' value='" + cartArray[i].count + "'>"
      + "<button class='plus-item btn btn-primary input-group-addon' data-name=" + cartArray[i].name + ">+</button></div></td>"
      + "<td><button class='delete-item btn btn-danger' data-name=" + cartArray[i].name + ">X</button></td>"
      + " = " 
      + "<td>" + cartArray[i].total + "</td>" 
      +  "</tr>";
  }
  $('.show-cart').html(output);
  $('.total-cart').html(shoppingCart.totalCart());
  $('.total-count').html(shoppingCart.totalCount());
  localStorage.setItem('TotalAmount',shoppingCart.totalCart());
}


// Delete item button
$('.show-cart').on("click", ".delete-item", function(event) {
  var name = $(this).data('name');
  shoppingCart.removeItemFromCartAll(name);
  displayCart();
})

// One Item Subtruct
$('.show-cart').on("click", ".minus-item", function(event) {
  var name = $(this).data('name')
  shoppingCart.removeItemFromCart(name);
  displayCart();
})
// One Item Add
$('.show-cart').on("click", ".plus-item", function(event) {
  var name = $(this).data('name');
  var id= $(this).data('id');
  var shipping_cost= $(this).data('shipping_cost');
  shoppingCart.addItemToCart(shipping_cost,id,name);
  displayCart();
})

// Item count input
$('.show-cart').on("change", ".item-count", function(event) {
   var name = $(this).data('name');
   var count = Number($(this).val());
  shoppingCart.setCountForItem(name, count);
  displayCart();
});

displayCart();
        </script>