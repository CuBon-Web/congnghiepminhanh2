function formatNumber(num) {
    return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
}
function shopnow(proId,qty,variant,status_variant) {
    jQuery.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    if(qty == 0){
            var qty = $( "#inputqty"+proId ).val();
            jQuery.ajax({
                url: "/update-cart",
                method: "POST",
                data: {
                    'quantity': qty,
                    'id': proId,
                },
                success: function (response) {
                    // console.log(response);
                    var html = '';
                    var total = 0;
                    var qtys = 0;
                    Object.keys(response).forEach(function (key){
                        html += '<tr >';
                        html += '<td class="product-thumbnail"><a href="#"><img src="'+response[key].image+'" alt="product1"></a></td>';
                        html += '<td class="product-name" data-title="Product"><a href="#">'+JSON.parse(response[key].name)[0].content+'</a></td>';
                        html += '<td class="product-price" data-title="Price">'+formatNumber(response[key].price)+'đ</td>';
                        html += '<td class="product-quantity" data-title="Quantity">';
                        html +=    '<div class="quantity">'
                        html +=     '<input type="text" name="quantity" onkeyup="addToCart('+response[key].idpro+',0)" id="inputqty'+response[key].idpro+'" value="'+response[key].quantity+'" title="Qty" class="qty" size="4">'
                        html +=      '</div>'
                        html +=  '</td>';
                        html +='<td class="product-subtotal" data-title="Total">'+ formatNumber(response[key].price * response[key].quantity)+'đ</td>';
                        html +='<td class="product-remove" data-title="Remove">';
                        html +=    '<a href="javascript:;" onclick="removeCartList('+response[key].idpro+')">';
                        html +=        '<i class="ti-close"></i>';
                        html +=    '</a>';
                        html += '</td>';
                        html += '</tr>';
                        total += response[key].price * response[key].quantity
                        qtys += parseInt(response[key].quantity)
                    });
                    html += '<tr>'
                    html +=        	'<td class="product-thumbnail">Tổng:</td>'
                    html +=            '<td class="product-name" data-title="Product"></td>'
                    html +=            '<td class="product-price" data-title="Price"></td>'
                    html +=            '<td class="product-quantity" data-title="Quantity"></td>'
                    html +=          	'<td class="product-subtotal" data-title="Total">'+formatNumber(total)+'đ</td>'
                    html +=            '<td class="product-remove" data-title="Remove"></td>'
                    html +=        '</tr>'
                    console.log(html)
                    $("#list_cart_checkout").html(html);
                    $('.cart_count').html(qtys);
                    // $(".cart_list").append("<b>Appended text</b>");
                },
            });
        
    }else{
        var qty = $( "#inputqty").val();
        if(status_variant ==1){
            var price = $('#price-send-car').val();
        }else{
            var price = 0;
        }
        var variant_pass = "";
        if ( JSON.parse(variant).length > 0 && status_variant==1) {
            var value_variant = "";
            JSON.parse(variant).forEach((element,key) => {
                var t = document.querySelector('input[name="option-'+key+'"]:checked').value;
                value_variant += t+'-';
             });
            var variant_pass = value_variant.substring(0, value_variant.length-1)
        }
        jQuery.ajax({
            url: "/add-to-cart",
            method: "POST",
            data: {
                'quantity': qty,
                'product_id': proId,
                'variant':variant_pass,
                'price':price
            },
            success: function (response) {
                window.location.href = '/gio-hang.html';
            },
        });
    }
}
function addToCart(proId,variant,status_variant) {
    jQuery.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    }); 
        var qty = $( "#inputqty").val();
        var variant_pass = "";
        if(status_variant ==1){
            var price = $('#price-send-car').val();
        }else{
            var price = 0;
        }
        if ( JSON.parse(variant).length > 0 && status_variant==1) {
            var value_variant = "";
            JSON.parse(variant).forEach((element,key) => {
                var t = document.querySelector('input[name="option-'+key+'"]:checked').value;
                value_variant += t+'-';
             });
            var variant_pass = value_variant.substring(0, value_variant.length-1)
        }
        jQuery.ajax({
            url: "/add-to-cart",
            method: "POST",
            data: {
                'quantity': qty,
                'product_id': proId,
                'variant':variant_pass,
                'price':price
            },
            success: function (response) {
                // console.log(response);
                var total = 0;
                var qtys = 0;
                var updateqty = '';
                Object.keys(response).forEach(function (key){
                   
                    total += (response[key].price - (response[key].price*(response[key].discount/100))) * response[key].quantity
                    qtys += parseInt(response[key].quantity)
                });
               
                $('.cart_count').html(qtys);
                jQuery.notify("Đã thêm sản phẩm vào giỏ hàng", "success");
            },
        });
}
function removeCart(cart_id) {
    jQuery.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
        jQuery.ajax({
            url: "/remove-from-cart",
            method: "POST",
            data: { 
                'id': cart_id
            },
            success: function (response) {
                var html = '';
                var total = 0;
                var qtys = 0;
                Object.keys(response).forEach(function (key){
                    html += '<div class="d-flex cart__basket__item product mb-4 rounded ux-card position-relative clearfix">';
                    html +=     '<img src="'+ response[key].image +'" class="js-img position-absolute" alt="undefined">';
                    html +=     '<div class="col-12 d-flex p-0">';
                    html +=         '<p class="item-title clearfix mb-2">';
                    html +=         '<a href="#" title="'+JSON.parse(response[key].name)[0].content+'" class="js-titlte font-weight-bold">'+JSON.parse(response[key].name)[0].content+'</a>';
                    if (response[key].status_variant == 1){
                        html +=             '<span class="js-variant-titlte d-block">'+ response[key].variant +'</span>';
                    }
                    html +=         '</p>';
                    if (response[key].status_variant == 1){
                        html +=         '<span class="js-price price font-weight-bold ml-auto text-right clearfix">'+ formatNumber(response[key].price) +'₫</span>';
                    }
                    else{
                       if(response[key].discount > 0){
                        html +=         '<span class="js-price price font-weight-bold ml-auto text-right clearfix">'+ formatNumber(response[key].discount) +'₫</span>';
                       }else{
                        html +=         '<span class="js-price price font-weight-bold ml-auto text-right clearfix">'+ formatNumber(response[key].price) +'₫</span>';
                       }
                    }
                    html +=     '</div>';
                    html +=     '<div class="js-number-input number-input d-inline-flex rounded">';
                    html +=         '<button class="position-relative m-0 border-0 " onclick="qtyminus('+ response[key].idpro +')"></button>';
                    html +=         '<input class="js-quantity text-center" readonly="" min="1" name="Lines" value="'+ response[key].quantity +'" size="2" type="number" id="quantity-'+ response[key].idpro +'">';
                    html +=         '<button class="position-relative m-0 border-0" onclick="qtyplus('+ response[key].idpro +')"></button>';
                    html +=     '</div>';
                    html +=     '<button class="btn btn-outline-danger remove ml-auto" onclick="removeCart('+ response[key].idpro +')" title="Xoá" data-variantid="69812894">Xoá</button>';
                    html += '</div>';
                    if (response[key].status_variant == 1){
                        total += response[key].price * response[key].quantity
                    }else{
                        if(response[key].discount > 0){
                            total += response[key].discount * response[key].quantity
                        }else{
                            total += response[key].price * response[key].quantity
                        }
                    }
                    qtys += response[key].quantity
                });
                $('.cart_count').html(qtys);
                $(".cart_list").html(html);
                $(".total-price").html(formatNumber(total)+'₫');
            },
        });
}
function removeCartList(cart_id) {
    jQuery.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
        jQuery.ajax({
            url: "/remove-from-cart",
            method: "POST",
            data: {
                'id': cart_id
            },
            success: function (response) {
                var html = '';
                var total = 0;
                var qtys = 0;
                Object.keys(response).forEach(function (key){
                    $(".car-box-"+cart_id).remove();
                    total += (response[key].price - (response[key].price*(response[key].discount/100))) * response[key].quantity
                });
                $('.cart_count').html(qtys);
                $(".total-price").html(formatNumber(total)+"₫");
            },
        });
}
function qtyminus(id){
    var quantity = parseInt($('#quantity-'+id).val());
    if(quantity > 1){
        $('#quantity-'+id).val(quantity - 1)
    }else{
        $('#quantity-'+id).val(1)
    }
    jQuery.ajax({
        url: "/update-cart",
        method: "POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            'quantity': $('#quantity-'+id).val(),
            'id': id,
        },
        success: function (response) {
            // console.log(response);
            var html = '';
            var total = 0;
            var qtys = 0;
            Object.keys(response).forEach(function (key){
                    html += '<div class="d-flex cart__basket__item product mb-4 rounded ux-card position-relative clearfix">';
                    html +=     '<img src="'+ response[key].image +'" class="js-img position-absolute" alt="undefined">';
                    html +=     '<div class="col-12 d-flex p-0">';
                    html +=         '<p class="item-title clearfix mb-2">';
                    html +=         '<a href="#" title="'+response[key].name+'" class="js-titlte font-weight-bold">'+response[key].name+'</a>';
                    if (response[key].status_variant == 1){
                        html +=             '<span class="js-variant-titlte d-block">'+ response[key].variant +'</span>';
                    }
                    html +=         '</p>';
                    if (response[key].status_variant == 1){
                        html +=         '<span class="js-price price font-weight-bold ml-auto text-right clearfix">'+ formatNumber(response[key].price) +'₫</span>';
                    }
                    else{
                       if(response[key].discount > 0){
                        html +=         '<span class="js-price price font-weight-bold ml-auto text-right clearfix">'+ formatNumber(response[key].discount) +'₫</span>';
                       }else{
                        html +=         '<span class="js-price price font-weight-bold ml-auto text-right clearfix">'+ formatNumber(response[key].price) +'₫</span>';
                       }
                    }
                    html +=     '</div>';
                    html +=     '<div class="js-number-input number-input d-inline-flex rounded">';
                    html +=         '<button class="position-relative m-0 border-0 " onclick="qtyminus('+ response[key].idpro +')"></button>';
                    html +=         '<input class="js-quantity text-center" readonly="" min="1" name="Lines" value="'+ response[key].quantity +'" size="2" type="number" id="quantity-'+ response[key].idpro +'">';
                    html +=         '<button class="position-relative m-0 border-0" onclick="qtyplus('+ response[key].idpro +')"></button>';
                    html +=     '</div>';
                    html +=     '<button class="btn btn-outline-danger remove ml-auto" onclick="removeCart('+ response[key].idpro +')" title="Xoá" data-variantid="69812894">Xoá</button>';
                    html += '</div>';
                    if (response[key].status_variant == 1){
                        total += response[key].price * response[key].quantity
                    }else{
                        if(response[key].discount > 0){
                            total += response[key].discount * response[key].quantity
                        }else{
                            total += response[key].price * response[key].quantity
                        }
                    }
                    
                    qtys += response[key].quantity
            });
            $('.cart_count').html(qtys);
            $(".cart_list").html(html);
            $(".total-price").html(formatNumber(total)+'₫');
        },
    });
    
}
function qtyplus(id){
    var quantity = parseInt($('#quantity-'+id).val());
        $('#quantity-'+id).val(quantity + 1)
        jQuery.ajax({
            url: "/update-cart",
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                'quantity': $('#quantity-'+id).val(),
                'id': id,
            },
            success: function (response) {
                // console.log(response);
                var html = '';
                var total = 0;
                var qtys = 0;
                Object.keys(response).forEach(function (key){
                    html += '<div class="d-flex cart__basket__item product mb-4 rounded ux-card position-relative clearfix">';
                    html +=     '<img src="'+ response[key].image +'" class="js-img position-absolute" alt="undefined">';
                    html +=     '<div class="col-12 d-flex p-0">';
                    html +=         '<p class="item-title clearfix mb-2">';
                    html +=         '<a href="#" title="'+response[key].name+'" class="js-titlte font-weight-bold">'+response[key].name+'</a>';
                    if (response[key].status_variant == 1){
                        html +=             '<span class="js-variant-titlte d-block">'+ response[key].variant +'</span>';
                    }
                    html +=         '</p>';
                    if (response[key].status_variant == 1){
                        html +=         '<span class="js-price price font-weight-bold ml-auto text-right clearfix">'+ formatNumber(response[key].price) +'₫</span>';
                    }
                    else{
                       if(response[key].discount > 0){
                        html +=         '<span class="js-price price font-weight-bold ml-auto text-right clearfix">'+ formatNumber(response[key].discount) +'₫</span>';
                       }else{
                        html +=         '<span class="js-price price font-weight-bold ml-auto text-right clearfix">'+ formatNumber(response[key].price) +'₫</span>';
                       }
                    }
                    html +=     '</div>';
                    html +=     '<div class="js-number-input number-input d-inline-flex rounded">';
                    html +=         '<button class="position-relative m-0 border-0 " onclick="qtyminus('+ response[key].idpro +')"></button>';
                    html +=         '<input class="js-quantity text-center" readonly="" min="1" name="Lines" value="'+ response[key].quantity +'" size="2" type="number" id="quantity-'+ response[key].idpro +'">';
                    html +=         '<button class="position-relative m-0 border-0" onclick="qtyplus('+ response[key].idpro +')"></button>';
                    html +=     '</div>';
                    html +=     '<button class="btn btn-outline-danger remove ml-auto" onclick="removeCart('+ response[key].idpro +')" title="Xoá" data-variantid="69812894">Xoá</button>';
                    html += '</div>';
                    if (response[key].status_variant == 1){
                        total += response[key].price * response[key].quantity
                    }else{
                        if(response[key].discount > 0){
                            total += response[key].discount * response[key].quantity
                        }else{
                            total += response[key].price * response[key].quantity
                        }
                    }
                    
                    qtys += response[key].quantity
                });
                
                $('.cart_count').html(qtys);
                $(".cart_list").html(html);
                $(".total-price").html(formatNumber(total)+'₫');
            },
        });
}
function qtyplushome(id){
    var quantity = parseInt($('#inputqty-'+id).val());
        $('#inputqty-'+id).val(quantity+1)
        jQuery.ajax({
            url: "/update-cart",
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                'quantity': $('#inputqty-'+id).val(),
                'id': id,
            },
            success: function (response) {
                // console.log(response);
                var html = '';
                var total = 0;
                var qtys = 0;
                Object.keys(response).forEach(function (key){
                    html +=               '<div class="ajaxcart__inner ajaxcart__inner--has-fixed-footer cart_body items">';
                    html +=                   '<div class="ajaxcart__row">';
                    html +=                       '<div class="ajaxcart__product cart_product" data-line="1">';
                    html +=                           '<a href="javascript:;" class="ajaxcart__product-image cart_image" title="'+JSON.parse(response[key].name)[0].content+'">';
                    html +=                                    '<img width="80" height="80" src="'+response[key].image+'" alt="Samsung Galaxy Note 21">';
                    html +=                            '</a>';
                    
                    html +=                          ' <div class="grid__item cart_info">';
                    html +=                               '<div class="ajaxcart__product-name-wrapper cart_name">';
                    html +=                                   '<a href="javascript:;" class="ajaxcart__product-name h4" title="'+JSON.parse(response[key].name)[0].content+'">'+JSON.parse(response[key].name)[0].content+'</a>';
                    html +=                               '</div>';
                    html +=                               '<div class="grid">';
                    html +=                                   '<div class="grid__item one-half cart_select cart_item_name">';
                    html +=                                       '<label class="cart_quantity">Số lượng x'+ response[key].quantity +'</label>';
                    html +=                                       '<div class="ajaxcart__qty input-group-btn">';
                    html +=                                  '</div>';
                    html +=                              '</div>';
                    html +=                              '<div class="grid__item one-half text-right cart_prices">';
                    html +=                                  '<span class="cart-price">'+ formatNumber((response[key].price - (response[key].price*(response[key].discount/100)))) +'₫</span>';
                    html +=                              '</div>';
                    html +=                          '</div>';
                    html +=                      '</div>';
                    html +=                  '</div>';
                    html +=              '</div>';
                    html +=          '</div>';
                    total += (response[key].price - (response[key].price*(response[key].discount/100))) * response[key].quantity
                    qtys += parseInt(response[key].quantity)
                    var price = formatNumber((response[key].price - (response[key].price*(response[key].discount/100))) * response[key].quantity)+"₫";
                    $('#cartprice-'+key).html(price);
                });
                html +=          '<div class="ajaxcart__footer ajaxcart__footer--fixed cart-footer">';
                html +=              '<div class="ajaxcart__subtotal">';
                html +=                  '<div class="cart__subtotal">';
                html +=                      '<div class="cart__col-6">Tổng tiền:</div>';
                html +=                      '<div class="text-right cart__totle">';
                html +=                             '<span class="total-price">'+formatNumber(total)+'₫</span>';
                html +=                       '</div>';
                html +=                  '</div>';
                html +=              '</div>';
                html +=              '<div class="cart__btn-proceed-checkout-dt">';
                html += '<div class="row">';
                html += '<div class="col-6">';
                html +=    '<a href="/gio-hang.html" class="buttons btn btn-default " title="Xem chi tiết">Xem chi tiết</a>';
                html += '</div>';
                html += '<div class="col-6">';
                html +=    '<a href="/thanh-toan.html" type="button" class="button btn btn-default" title="Thanh toán">Thanh toán</a>';
                html += '</div>';
                html += '</div>';
                html +=              '</div>';
                html +=          '</div>';
                $('.cart_count').html(qtys);
                $(".cart_list").html(html);
                $(".total-price").html(formatNumber(total)+"₫" );
            },
        });
}
function qtyminusshome(id){
    var quantity = parseInt($('#inputqty-'+id).val());
    if(quantity > 1){
        $('#inputqty-'+id).val(quantity - 1)
    }else{
        $('#inputqty-'+id).val(1)
    }
        jQuery.ajax({
            url: "/update-cart",
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                'quantity': $('#inputqty-'+id).val(),
                'id': id,
            },
            success: function (response) {
                // console.log(response);
                var html = '';
                var total = 0;
                var qtys = 0;
                Object.keys(response).forEach(function (key){
                    html +=               '<div class="ajaxcart__inner ajaxcart__inner--has-fixed-footer cart_body items">';
                    html +=                   '<div class="ajaxcart__row">';
                    html +=                       '<div class="ajaxcart__product cart_product" data-line="1">';
                    html +=                           '<a href="javascript:;" class="ajaxcart__product-image cart_image" title="'+JSON.parse(response[key].name)[0].content+'">';
                    html +=                                    '<img width="80" height="80" src="'+response[key].image+'" alt="Samsung Galaxy Note 21">';
                    html +=                            '</a>';
                    
                    html +=                          ' <div class="grid__item cart_info">';
                    html +=                               '<div class="ajaxcart__product-name-wrapper cart_name">';
                    html +=                                   '<a href="javascript:;" class="ajaxcart__product-name h4" title="'+JSON.parse(response[key].name)[0].content+'">'+JSON.parse(response[key].name)[0].content+'</a>';
                    html +=                               '</div>';
                    html +=                               '<div class="grid">';
                    html +=                                   '<div class="grid__item one-half cart_select cart_item_name">';
                    html +=                                       '<label class="cart_quantity">Số lượng x'+ response[key].quantity +'</label>';
                    html +=                                       '<div class="ajaxcart__qty input-group-btn">';
                    html +=                                  '</div>';
                    html +=                              '</div>';
                    html +=                              '<div class="grid__item one-half text-right cart_prices">';
                    html +=                                  '<span class="cart-price">'+ formatNumber((response[key].price - (response[key].price*(response[key].discount/100)))) +'₫</span>';
                    html +=                              '</div>';
                    html +=                          '</div>';
                    html +=                      '</div>';
                    html +=                  '</div>';
                    html +=              '</div>';
                    html +=          '</div>';
                    total += (response[key].price - (response[key].price*(response[key].discount/100))) * response[key].quantity
                    qtys += parseInt(response[key].quantity)
                    var price = formatNumber((response[key].price - (response[key].price*(response[key].discount/100))) * response[key].quantity)+"₫";
                    $('#cartprice-'+key).html(price);
                });
                html +=          '<div class="ajaxcart__footer ajaxcart__footer--fixed cart-footer">';
                html +=              '<div class="ajaxcart__subtotal">';
                html +=                  '<div class="cart__subtotal">';
                html +=                      '<div class="cart__col-6">Tổng tiền:</div>';
                html +=                      '<div class="text-right cart__totle">';
                html +=                             '<span class="total-price">'+formatNumber(total)+'₫</span>';
                html +=                       '</div>';
                html +=                  '</div>';
                html +=              '</div>';
                html +=              '<div class="cart__btn-proceed-checkout-dt">';
                html += '<div class="row">';
                html += '<div class="col-6">';
                html +=    '<a href="/gio-hang.html" class="buttons btn btn-default " title="Xem chi tiết">Xem chi tiết</a>';
                html += '</div>';
                html += '<div class="col-6">';
                html +=    '<a href="/thanh-toan.html" type="button" class="button btn btn-default" title="Thanh toán">Thanh toán</a>';
                html += '</div>';
                html += '</div>';
                html +=              '</div>';
                html +=          '</div>';
                $('.cart_count').html(qtys);
                $(".cart_list").html(html);
                $(".total-price").html(formatNumber(total)+"₫" );
            },
        });
}