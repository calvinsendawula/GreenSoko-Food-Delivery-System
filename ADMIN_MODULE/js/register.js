$(function(){
var $registerForm = $("#form");
if($registerForm.length){
  $registerForm.validate({
    rules:{
      firstname:{
        required: true
      },
      lastname:{
        required: true
      },
      password:{
        required: true

      },
      gender:{
        required: true
      }
    },
    messages:{
      firstname:{
        required:'Please enter First Name!'
      },
      lastname:{
        required:'Please enter Last Name!'
      },
      password:{
        required:'Please enter Password!'
      },
      gender:{
        required:'Please enter Gender!'
      }
    },

  })
}
})
