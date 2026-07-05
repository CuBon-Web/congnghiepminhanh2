// const { integer } = require("vuelidate/lib/validators");

function toggleFilter(e){
    if (e.checked) {
       e.removeAttribute("checked");
    } else {
       e.setAttribute("checked", "checked");
    }
    var page = $('#hidden_page').val();
    fetch_data(page)
       
}
function sortby(){
    var page = $('#hidden_page').val();
    fetch_data(page);
}
function edValueKeyPress()
{
    var edValue = document.getElementById("filter-khoanggia-tu");
    var s = parseInt(edValue.value) ;
    document.getElementById("filter-khoanggia-den").value = parseInt(s+1000000);
    
}
function priceRange(){
    var page = $('#hidden_page').val();
    fetch_data(page)
}
   function fetch_data(page){
    var checkedBoxes = getCheckedBoxes("fillter");
    var sortby = document.querySelector('input[name="sortBy"]:checked').value;
    var pricemin = parseInt(document.getElementById("filter-khoanggia-tu").value);
    var pricemax = parseInt(document.getElementById("filter-khoanggia-den").value);

    var cate = $('#cate_slug').val();
    var type = $('#type_slug').val();
    var typetwo = $('#type_two_slug').val();
    console.log(type);
    jQuery.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    jQuery.ajax({
        url: "/filter.html?page="+page+"",
        method: "POST",
        data: {
            'cate': cate,
            'type': type,
            'typetwo':typetwo,
            'sortby':sortby,
            'pricemin':pricemin,
            'pricemax':pricemax,
            'fillter':checkedBoxes
        },
        success: function (response) {
          $(".product-list-filter").html(response.html);
          var element = document.getElementById("pagination_main");
          if (element !== null){
            element.classList.add("d-none");
            }
            if ($('.sidebar_mobi').hasClass('openf')){
                $('#body_overlay').removeClass('d-none');
                colLeft.classList.remove("active");
                menuButton.classList.remove("active");
                $('body').addClass('modal-open');
            }
        },
    });
   }

   $(document).on('click', '#pagination .pagination a', function(event){
        event.preventDefault();
        var checkedBoxes = getCheckedBoxes("fillter");
        var page = $(this).attr('href').split('page=')[1];
        $('#hidden_page').val(page);
        fetch_data(page);
   });

   function getCheckedBoxes(chkboxName) {
    var checkboxes = document.getElementsByName('fillter');
    var checkboxesChecked = [];
    for (var i=0; i<checkboxes.length; i++) {
       if (checkboxes[i].checked) {
          checkboxesChecked.push(checkboxes[i].value);
       }
    }
    return checkboxesChecked.length > 0 ? checkboxesChecked : null;
    }