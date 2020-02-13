$(document).ready(function() {
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID

    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div style="display: inline-block"> - <input type="text" name="sizes[]" placeholder="اسم المقاس" class="llll"/> <a style="border-radius: 50%;padding: 2px 5px 0px 5px;" href="#" class="remove_field btn btn-danger"> <i class="fa fa-times"></i></a></div>'); //add input box
        }
    });
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    });


});
$(document).ready(function() {

var max_fields      = 10; //maximum input boxes allowed
var wrapper         = $(".input_fieldss_wrap"); //Fields wrapper
var add_button      = $(".add_fields_button"); //Add button ID

var x = 1; //initlal text box count
$(add_button).click(function(e){ //on add input button click
    e.preventDefault();
    if(x < max_fields){ //max input box allowed
        x++; //text box increment
        $(wrapper).append('<div style="display: inline-block"> - <input type="color" name="colors[]"> <a style="border-radius: 50%;padding: 2px 5px 0px 5px;" href="#" class="remove_fields btn btn-danger"> <i class="fa fa-times"></i></a></div>'); //add input box
    }
});

$(wrapper).on("click",".remove_fields", function(e){ //user click on remove text
    e.preventDefault(); $(this).parent('div').remove(); x--;
});

});
