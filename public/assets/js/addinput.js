$(document).ready(function(){
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML = '<div class=" mt-3 "><input type="text" name="products[]" placeholder="قم بكتابة اسم العلاج مثل بندول او فوار..."   class=" col-11 form-control-custome" value=""/><a href="javascript:void(0);" class="remove_button col-1 pe-2"><i class="bi fs-3 bi-dash-circle-fill text-danger"></i></a></div>'; //New input field html
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
  });
