$(document).ready(function(){

    var base_url = $('#base_url').val();

    $('.deletenot').click(function() {
        var token = $(this).data('token');
        var id = $(this).attr('ad');
        $.ajax({
            url: base_url + '/deletenot',
            type: 'post',
            data: '_token=' + token + '&adID=' + id,
            dataType: 'json',
        });
    });

    $('#category_id').on('change',function(e){
        console.log(e);
        var category_id = e.target.value;
        $.get( base_url + '/ajax-subcats?category_id='+ category_id,function(data){
            $('#subcategory_id').empty();
            $.each(data,function(index, subcatObj){
                $('#subcategory_id').append('<option value="'+subcatObj.id+'">'+subcatObj.name_ar+'</option>');
            });
        });
    });

    $('#category_id').on('change',function(e){
        console.log(e);
        var category_id = e.target.value;
        $.get( base_url + '/ajax-brands?category_id='+ category_id,function(data){
            $('#brand_id').empty();
            $('#brand_id').append('<option value="0">بدون ماركة</option>');
            $.each(data,function(index, subcatObj){
                $('#brand_id').append('<option value="'+subcatObj.id+'">'+subcatObj.name_ar+'</option>');
            });
        });
    });
});