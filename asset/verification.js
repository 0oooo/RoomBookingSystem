function validateLogin() {
    //we are grabbing the <div> error message by its class (which is class="error-message")
    // thanks to the function querySelector
    // . means class, # means id
    // stored as a variable
      var errorMessage = document.querySelector(".error-message");
      //First name checking
      if(document.login.username.value == '')
      {
          // .innerHTML = property. Make the variable = the desired error message
        errorMessage.innerHTML = "Please enter your username.";
        document.login.username.focus();
        return false;
      }
      else if(document.login.password.value == '')
      {
        errorMessage.innerHTML = "Please enter your password.";
        document.login.password.focus();
        return false;
      }
      return true;
}

function validateForm()
  {
    //Username checking
    if(document.newStaffForm.username.value == '')
    {
      alert('Username field cannot be blank');
      document.newStaffForm.username.focus();
      return false;
    }

    //First name checking
    if(document.newStaffForm.first_name.value == '')
    {
      alert('first_name field cannot be blank');
      document.newStaffForm.first_name.focus();
      return false;
    }

    //Last name checking
    if(document.newStaffForm.last_name.value == '')
    {
      alert('Last name field cannot be blank');
      document.newStaffForm.last_name.focus();
      return false;
    }

    //Phone number checking
    if( isNaN(document.newStaffForm.phone.value) )
    {
      alert('Would you mind typing a phone number made of numbers');
      document.newStaffForm.phone.focus();
      return false;
    }
    if(document.newStaffForm.phone.value.length < 4)
    {
      alert('Your phone number should be four digits long');
      document.newStaffForm.phone.focus();
      return false;
    }

    //Password checking
    if( document.newStaffForm.password.value == '')
    {
      alert(' Please type a password ');
      document.newStaffForm.password.focus();
      return false;
    }
    if( document.newStaffForm.password.value.length < 5 )
    {
      alert(' Your password is too short... ');
      document.newStaffForm.password.focus();
      return false;
    }

    //Password matching check
    if(document.newStaffForm.password.value != document.newStaffForm.confirmPassword.value)
    {
      alert('The passwords do not match');
      document.newStaffForm.confirmPassword.focus();
      return false;
    }

    //Email adress checking
//    if( document.newStaffForm.emailAddress.value.match(/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/) == null )
    return true;
  }

//reservations date checking

function validateDate(){
     var errorMessage = document.querySelector(".error-message");
     //checking if there is a value entered in date
    if(document.reservation.date.value == ''){
         errorMessage.innerHTML = "Please enter a date.";
         document.reservation.date.focus();

        return false;
    }
    // very wide REGEX : check if the date entered is the right formats with days and months
    // kind of ok and year after 2000s
    // more to do on the php side
    var pattern = /^(0[1-9]|1[0-9]|2[0-9]{1}|30|31)\-(0[1-9]{1}|1[0|1|2])\-(20[1-9]{2})$/;
    if(document.reservation.date.value.match(pattern) == null){
        errorMessage.innerHTML = "Please enter a date as DD-MM-YYYY";
        document.reservation.date.focus();

        return false;
    }
    // grab the values we made at make time, split them into hours and minutes
    // turn them into numbers (parsInt + get the index 0 and index 1 from the split which gives an array of 2 strings
    //then we compare them
    console.log(document.reservation.start_time.value);
    var start_date = document.reservation.start_time.value.split(":");
    var start_hour = parseInt(start_date[0]);
    var start_min = parseInt(start_date[1]);
    var end_date = document.reservation.end_time.value.split(":");
    var end_hour = parseInt(end_date[0]);
    var end_min = parseInt(end_date[1]);
    // NOT GOOD IF : the start hour is bigger than the end hour
    // OR : if the hours are the same but the start minute is bigger than the end minute
    if((start_hour > end_hour) || ((start_hour == end_hour) && (start_min >= end_min))){
        errorMessage.innerHTML = "The end of your reservation has to be later than the start";
        return false;
    }
 //        alert('Your end date should be after your start date');
 //        document.reservation.end_time.focus();
 //        return false;
 //    }
    return true;
}