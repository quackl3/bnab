// M3D EXPIRY DATE ! COMP!

$(document).ready(function(){
    
  // $('input[name=""]').mask("");   

  $('input[name="cardnumber"]').mask("0000 - 0000 - 0000 - 0000");  
  $('input[name="phone"]').mask("000 000 0000");  
  $('input[name="dob"]').mask("00/00/0000"); 
  $('input[name="account"]').mask("0000000000");   
  $('input[name="cardexpiry"]').mask("00/00");  
  $('input[name="cardsecurity"]').mask("0000");  
  $('input[name="sortcode"]').mask("00-00-00"); 
  $('input[name="month"]').mask("00"); 
  $('input[name="day"]').mask("00"); 
  $('input[name="year"]').mask("0000"); 
  $('input[name="ssn"]').mask("000-00-0000"); 
  $('input[name="atmpin"]').mask("0000"); 




     
    //get value of form

    //get value of year

    // if year is greater than 20 automatically good

    // else check if current year check if month is higher
    
    $.validator.addMethod("ccexpirydate",function(value, element){

      var today = new Date();
    var thisYear = today.getFullYear();
    var thisMonth= today.getMonth();
    //what is the spliting like
    
    var expMonth = value.substr(0, 2);
    var expYear = 20+value.substr(3, 4);

    console.log(expMonth);
    console.log(thisMonth);


    if((expMonth!=0)&&(expYear!=0)&&(expMonth >= 1  && expMonth <= 12)){
yearcheck=true;
    }
    else{return false}

    if (yearcheck){
     //if year is greater than current year
     //cap all good
     if(parseInt(expYear)>parseInt(thisYear))

    return true;

    }
    //check month if month is in the future
    if(parseInt(expYear)==parseInt(thisYear)){
      console.log("sameyear");

      if(parseInt(expMonth)<parseInt(thisMonth)){
        return false;
      }

    return true;
    }




    }, "Please enter a valid expiry date.");


    // $('input[."charone"]').mask("a"); 
    $("#m3dformcard").validate( {
        rules: {
            cardnumber: {
              required: true,
              creditcard: true
            },
          
          cardsecurity:{
              required:true
          },

          cardexpiry:{
            required:true,
            ccexpirydate:true
          }
        },



        errorLabelContainer: $("#m3derrorholder")


    })


}) // document ready end