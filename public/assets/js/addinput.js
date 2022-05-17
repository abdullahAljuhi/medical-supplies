$(document).ready(function(){
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML = '<div class=" mt-3 "><input type="text" id="name" placeholder="قم بكتابة اسم العلاج مثل بندول او فوار..." class=" col-12 col-md-8 mb-2 form-control-custome"name="product_name[]" autofocus><input type="text" id="name" placeholder="حدد الكمية" class="col-md-3 col-12 form-control-custome mb-2 me-1" name="quantity[]" autofocus><a href="javascript:void(0);" class="remove_button col-1 pe-2"><i class="bi fs-3 bi-dash-circle-fill text-danger"></i></a><div class="message-error col-12">يرجى ادخال ملف من نوع صورة</div></div>'; //New input field html
    var x = 1; //Initial field counter is 1
    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });
    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });

    var addButtonFile = $('.add_button_file'); //Add button selector
    var wrapper_file = $ (".field_wrapper_file");
    var fieldHTML_flie ='<div class=" mt-3 "><input type="file" id="name" placeholder="قم بكتابة اسم العلاج مثل بندول او فوار..." class=" col-12 col-md-8 mb-2 form-control-custome custom-file-input"name="images[]" autofocus><input type="text" id="name" placeholder="حدد الكمية" class="col-md-3 col-12 form-control-custome mb-2 me-1 py-2" name="quantity[]" autofocus><a href="javascript:void(0);" class="remove_button_file col-1 pe-2"><i class="bi fs-3 bi-dash-circle-fill text-danger"></i></a></div>'; //New input field html
    var x = 1; //Initial field counter is 1
    //Once add button is clicked
    $(addButtonFile).click(function(){
        //Check maximum number of input fields
        if(x < maxField){
            x++; //Increment field counter
            $(wrapper_file).append(fieldHTML_flie); //Add field html
        }
    });
    //Once remove button is clicked
    $(wrapper_file).on('click', '.remove_button_file', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });

});
