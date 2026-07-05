function keyinputsearch(){
    setTimeout(function(){
        var keyword = document.querySelector('input[name="keywordsearch"]').value;
        jQuery.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            }
        }), jQuery.ajax({
            url: "/auto-search-product",
            method: "POST",
            data: {
                keyword: keyword
            },
            success: function(e) {
                $('.searchResult').removeClass('d-none');
                $(".searchResult_products").html(e.html);
            }
        });
     }, 200);
    
}
$(document).on('click','body *',function(){
    $('.searchResult').addClass('d-none');
});