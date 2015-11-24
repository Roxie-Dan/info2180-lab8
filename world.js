// if(window.XMLHttpRequest){
    
//     var xmlhttp= new XMLHttpRequest();
// }
// else {
//     xmlhttp= new ActiveXObject("Mirosoft.XMLHTTP");
// }


$(document).ready(function(){
     
            //alert($look);
      //      var $len = $look.length;
      //if($len >= 1){
     
        $('button').click(function(){
           var $look = $('#term').val();
           $.ajax({
                type: 'GET',
                url: 'world.php?lookup='+$look,
                format:'xml',
                success: function(data) {
                 
            var result= document.getElementById("result");
            alert(data);
                result.innerHTML=(data);
             // Since I used Jquery, it was not necessary to sprecify whether the response was xml or text.
                }
            });
        
   });
   //   }
   //else { return false ;} 
  $("#checkall").change(function(){ $.ajax({
                type: 'GET',
                url: 'world.php?all=true',
                success: function(data) {
                    //console.log(data);
                $("#result").text(data.text());
                }
            });
  });
});