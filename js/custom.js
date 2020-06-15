


$('.addtocart').click(function(){
    var productId = this.dataset.productid;
    var thisBtn = this;
    if(cart['products'][productId]){
      var quantity = cart['products'][productId]['quantity'] + 1;
      var qhtml = '<h5 class="addtocartQuantity" style="text-align: center;"><button class="minusBtn" data-minusBtn = '+productId+'>-</button> <input type="text" value="'+quantity+'" id="q'+productId+'" class="text-center" style="width: 60px;">  <button class="plusBtn" data-plusbtn="'+productId+'">+</button> </h5>';
    }else{
      var qhtml = '<h5 class="addtocartQuantity" style="text-align: center;"><button class="minusBtn" data-minusBtn = '+productId+'>-</button> <input type="text" value="1" id="q'+productId+'" class="text-center" style="width: 60px;">  <button class="plusBtn" data-plusbtn="'+productId+'">+</button> </h5>';
    }
    $.ajax({
      url: 'cart.php',
      method: 'POST',
      data: {productId: productId, addtocart: 'yes' },
      cache: false,
      success: function(data){
          $(thisBtn).parent().html(qhtml);
          // $('.card-footer').parent.html('<h4>hjkhhkjh</h4>');
          // $('.addtocartQuantity' [hh=44]).css('display', 'block');
        run();
      }
    });
  });

  function run(){
      $('.minusBtn').click(function(){
        var productId = this.dataset.minusbtn;
        var quantity = $('#q'+productId).val();
        quantity = quantity - 1;
        if(quantity < 1){
          quantity = 0;
        }
        $('#q'+productId).val(quantity);
        
        $.ajax({
          url: 'cart.php',
          method: 'POST',
          data: {productId: productId, quantityBtn: 'Minus Btn'},
          cache: false,
          success: function(data){
            console.log('dsfffff');
            
          } 
        })
        
      });
     
      $('.plusBtn').click(function(){
        var productId = this.dataset.plusbtn;
        var quantity = $('#q'+productId).val();
        quantity = parseInt(quantity) + 1;
        $('#q'+productId).val(quantity);
        $.ajax({
          url: 'cart.php',
          method: 'POST',
          data: {productId: productId, quantityBtn: 'Plus Btn'},
          cache: false,
          success: function(data){
            // console.log(data);
            
          } 
        })
        
      });
  }

 