<?php include 'header.php'; ?>
<div class="container mt-5">
        <h2 class="text-center text-primary">Cart Item List</h2>
        <table class="table table-bordered text-center">
            <tr>
                <th class="text-left">Product Name</th>
                <th>Unit Price</th>
                <th>Quantity</th>
                <th>Price</th>
            </tr>
          
            <tr>
            <td class="text-left"></td>
                <td></td>
                <td class="text-center"></td>
                <td class="text-right pr-5" style="width: 15%;">BDT <span class="price"></span> </td>
            </tr>
          
            
        </table>
        <table class="table table-bordered w-50" style="margin-left: 50%;">
            <tr>
                <td>Subtotal Total</td>
                <td class="text-right pr-3">BDT <span class="subTotal"></span></td>
            </tr>
            <tr>
                <td>Delivery Charge</td>
                <td class="text-right pr-3">BDT <span class="deliveryCharge">50.00</span> </td>
            </tr>
            <tr>
                <td>Total Price</td>
                <td class="text-right pr-3">BDT <span class="totalPrice"></span></td>
            </tr>
        </table>
        <div style="margin-bottom: 4rem!important;">
        <a href="" class="float-right btn btn-primary w-25 btn-block">Checkout</a>
        </div>
        
    </div>


<?php include 'footer.php'; ?>