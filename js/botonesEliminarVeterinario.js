$(document).ready(function()
{
   $("input").click(function() 
   {
    var value = $(this).attr("name");
    
    alert(value);
   });
});