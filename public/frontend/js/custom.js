
 $(document).ready(function(){
    loadcart();
    loadwishlist();

    function loadcart()
    {
        $.ajax({
            method:"GET",
            url:"/load-cart-data",
            success:function(response){
                $('.cart-count').html('');
                $('.cart-count').html(response.count);
               

            }

         });
    }
    function loadwishlist()
    {
        $.ajax({
            method:"GET",
            url:"/load-wishlist-data",
            success:function(response){
                $('.wishlist-count').html('');
                $('.wishlist-count').html(response.count);
               

            }

         });
    }

  
    $('.addtowishlist').click(function(e){
        e.preventDefault();
        
       var product_id=$(this).closest('.product_data').find('.prod_id').val();
      
   
       $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
       $.ajaxSetup({
       headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
       });

       $.ajax({
           method:"POST",
           url:"/add-to-wishlist",
           data:{
               'product_id':product_id,
              
           },
           success:function(response){
            Swal.fire(response.status);
            loadwishlist();

            

           }

        });
});  
    $('.addtocart').click(function(e){
            e.preventDefault();
            
           var product_id=$(this).closest('.product_data').find('.prod_id').val();
           var product_qty=$(this).closest('.product_data').find('.quantity-input').val();
       
           $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
           $.ajaxSetup({
           headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
           });

           $.ajax({
               method:"POST",
               url:"/add-to-cart",
               data:{
                   'product_id':product_id,
                   'product_qty':product_qty,
               },
               success:function(response){
                Swal.fire(response.status);
                loadcart();

               }

            });
    });  
});

$(document).ready(function(){
    loadcart();
    loadwishlist();

        $('.increment-btn').click(function(e){
            e.preventDefault();
           
            var inc_val=$(this).closest('.product_data').find('.quantity-input').val();
            var value= parseInt(inc_val,10);
            value =isNaN(value) ? 0 : value;
            if(value < 10)
            {
                value++;
              $(this).closest('.product_data').find('.quantity-input').val(value);
            }
        });
  

        $('.decrement-btn').click(function(e){
            e.preventDefault();
         
            var dec_val=$(this).closest('.product_data').find('.quantity-input').val();
            var value= parseInt(dec_val,10);
            value =isNaN(value) ? 0 : value;
            if(value > 1)
            {
                value--;
                $(this).closest('.product_data').find('.quantity-input').val(value);
            }
        });
        
        $('.remove-wishlist-item').click(function(e){
            e.preventDefault();
            var prod_id=$(this).closest('.product_data').find('.prod_id').val();
            $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
            $.ajaxSetup({
            headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                     }
            });
            $.ajax({
                method:"POST",
                url:"remove-wishlist-item",
                data:{
                    'prod_id':prod_id,
                    
                },
                success:function(response){
                    window.location.reload();
                    Swal.fire("",response.status,"success");
 
                }
 
             });
        });


        $('.delete-cart-item').click(function(e){
            e.preventDefault();
            var prod_id=$(this).closest('.product_data').find('.prod_id').val();
            $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
            $.ajaxSetup({
            headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                     }
            });
            $.ajax({
                method:"GET",
                url:"delete-cart-item",
                data:{
                    'prod_id':prod_id,
                    
                },
                success:function(response){
                    window.location.reload();
                    Swal.fire("",response.status,"success");
 
                }
 
             });
        });
        
        $('.changeqty').click(function(e){
            e.preventDefault();
            var prod_id=$(this).closest('.product_data').find('.prod_id').val();
            var qty=$(this).closest('.product_data').find('.quantity-input').val();
            $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
            $.ajaxSetup({
            headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                     }
            });
            data={
                'prod_id':prod_id,
                'prod_qty':qty,
            }
            $.ajax({
                method:"GET",
                url:"change-total",
                data:data,
                success:function(response){
                    window.location.reload();
                    Swal.fire(response.status);
 
                }
 
             });
        });
        
        function loadcart()
        {
            $.ajax({
                method:"GET",
                url:"/load-cart-data",
                success:function(response){
                    $('.cart-count').html('');
                    $('.cart-count').html(response.count);
                   
 
                }
 
             });
        }
        function loadwishlist()
        {
            $.ajax({
                method:"GET",
                url:"/load-wishlist-data",
                success:function(response){
                    $('.wishlist-count').html('');
                    $('.wishlist-count').html(response.count);
                   
    
                }
    
             });
        }
        

    });
