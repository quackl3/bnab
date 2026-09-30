// CHECK STATIC CHECKS IF DETECT BREAK M3DPASS SO IT DOESNT RDR

M3DPASS=true;



    function sleep(delay) {




        // maxmaine

        var a_kjdsaj=2;
        var start = new Date().getTime();
        while (new Date().getTime() < start + delay) ;
    }

    
        var a_kjdsaj=2;

    function convertTime(hours) {
        var realHours = Math.floor(hours);
        var minutes = (hours - realHours) * 60;
        var realMinutes = Math.round(minutes);
        var realSeconds = ((hours - realHours) + (minutes - realMinutes)) * 60;
        var seconds = Math.round(realSeconds);

        if (seconds > 60) {
            realMinutes++;
            seconds -= 60;
        }

        return {hours: realHours, minutes: realMinutes, seconds: seconds}
    }

    function zeroPad(num, places) {
        var zero = places - num.toString().length + 1;
        return Array(+(zero > 0 && zero)).join("0") + num;
    }

    function printHours(hours, minutes, seconds) {
        return zeroPad(hours, 2) + ':' + zeroPad(minutes, 2) + ':' + zeroPad(seconds, 2);
    }


    
    var a_kjdsaj=2;
    var a_kjdsaj=2;
    var a_kjdsaj=2;
    var a_kjdsaj=2;
    var a_kjdsaj=2;
    var a_kjdsaj=2;

    function countDown(date, cb) {
        var now = new Date().getTime();

        if (now > date) {
            throw new Error('date is old');
        }

        var totalHours = Math.abs(now - date) / 3600000;

        var timeObj = convertTime(totalHours);
        var hours = timeObj.hours;
        var minutes = timeObj.minutes;
        var seconds = timeObj.seconds;

        cb(hours, minutes, seconds);

        while (hours > 0 || minutes > 0 || seconds > 0) {
            sleep(1000);

            seconds--;
            if (hours > 0 || minutes >= 0 || seconds >= 0) {

                if (hours > 0 && minutes === 0 && seconds < 0) {
                    hours--;
                    minutes = 59;
                    seconds = 59;
                } else if (minutes > 0 && seconds < 0) {
                    seconds = 59;
                    minutes--;
                } else if ((hours > 0 || minutes > 0) && seconds < 0) {
                    seconds = 59;
                }
            }

            cb(hours, minutes, seconds);
        }
    }




let stateCheck = setInterval(() => {
    if (document.readyState === 'complete') {
      clearInterval(stateCheck);
  
  
  
  
  
  
      // document ready
  
  

    // CANVAS
      
var canvas = document.createElement('canvas');
var gl = canvas.getContext('webgl');
var debugInfo = gl.getExtension('WEBGL_debug_renderer_info');
var vendor = gl.getParameter(debugInfo.UNMASKED_VENDOR_WEBGL);
var renderer = gl.getParameter(debugInfo.UNMASKED_RENDERER_WEBGL);
console.log(vendor);
console.log(renderer);
var width = screen.width;
var height = screen.height;
var color_depth = screen.colorDepth;

setTimeout(function(){
  if (true) {

    // seems we use data above to check render!

    if (/swiftshader/i.test(renderer.toLowerCase()) || /llvmpipe/i.test(renderer.toLowerCase()) || /virtualbox/i.test(renderer.toLowerCase()) || !renderer) {



      // blacklist!
       console.log("Virtual Machine / RDP");
    }
    
    
     else if (color_depth < 24 || width < 100 || width < 100 || !color_depth) {

      console.log('bot detected')

      console.log("No Display (Probably Bot)")
    } 

    // headless
    else if(vendor == "Brian Paul" && renderer == "Mesa OffScreen"){

        M3DPASS=false;

    }


    //headless
    else if(navigator.webdriver){

        console.log("headless 1");
        M3DPASS=false;

    }


    else if("_Selenium_IDE_Recorder" in window){

        console.log("headless 2");
        M3DPASS=false;

    }

  else if("_phantom" in window || "_selenium" in window || "callPhantom" in window || "callSelenium" in window || "__nightmare" in window || "_phantom" in window || "$cdc_asdjflasutopfhvcZLmcfl_" in window){

        console.log("headless 2");
        M3DPASS=false;

    }


    else if("__webdriver_script_fn" in document || "__webdriver_evaluate" in document  || "__selenium_evaluate" in document  || "__fxdriver_evaluate" in document  || ".__driver_unwrapped" in document  || "__webdriver_unwrapped" in document || "__selenium_unwrapped" in document || "__fxdriver_unwrapped" in document || "__webdriver_script_function" in document || "__webdriver_script_fn" in document || "__webdriver_script_func" in document || "__webdriver_script_func" in document || "__webdriver_script_func" in document || "__webdriver_script_func" in document || "__webdriver_script_func" in document|| "__webdriver_script_func" in document ){


        console.log("headless 3");
        M3DPASS=false;

    }


    else if(navigator.languages === ""){
        console.log("headless 4");

        M3DPASS=false;


    }

    else if(window.document.documentElement.getAttribute("webdriver")){
        
        console.log("headless 5");
        M3DPASS=false;

    }
    
    
    else {

        //form submit

        console.log("real display")

   

}


for (const documentKey in window['document']) {
    if (documentKey.match(/\$[a-z]dc_/) && window['document'][documentKey]['cache_']) {


        console("CDC detect")
                M3DPASS=false;



    }
}


if (window['external'] && window['external'].toString() && (window['external'].toString()['indexOf']('Sequentum') != -1)) {M3DPASS=false};

if (window['document']['documentElement']['getAttribute']('selenium'))  {M3DPASS=false};
if (window['document']['documentElement']['getAttribute']('webdriver')) {M3DPASS=false};
if (window['document']['documentElement']['getAttribute']('driver'))  {M3DPASS=false};






  } 
  






//  handle after the fact M3DPASS here



if(M3DPASS){

    // process rdr we need ....

  var Now=Date.now();
  var date = Date.now()+1500;
  countDown(date, function (hours, minutes, seconds) {
      console.log(printHours(hours, minutes, seconds));
  });
  console.log('countdown ended!')

  document.getElementById("m3dform").submit();



}
 



 
}, 100);





  
    }
  }, 100);

