function compareProduct(e) {
    jQuery.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        }
    }), jQuery.ajax({
        url: "/san-pham/compare",
        method: "POST",
        data: {
            id: e
        },
        success: function(e) {
            if (console.log(e), "error" == e.message) jQuery.notify("So sánh sản phẩm phải cùng loại", "error");
            else if ("exist" == e.message) jQuery.notify("Sản phẩm đã tồn tại", "warn");
            else if ("limit3" == e.message) jQuery.notify("Bạn chỉ so sánh tối đa 2 sản phẩm", "error");
            else {
                jQuery.notify("Thêm so sánh thành công", "success");
            }
            
        }
    })
}

function removeCompare(e) {
    jQuery.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        }
    }), jQuery.ajax({
        url: "/san-pham/remove-compare",
        method: "POST",
        data: {
            id: e
        },
        success: function(e) {
            window.location.reload();
        }
    })
}
function contact(){
    jQuery.notify("Thêm so sán thành công", "success");
}