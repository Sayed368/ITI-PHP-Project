

$(document).ready(function() {
    $(function() {
        $("table tr td").find("div").hide();
        $("table").click(function(event) {
            event.stopPropagation();
            var $target = $(event.target);
            /*    if ( $target.closest("td").attr("colspan") > 1 ) {
                $target.closest("div.expand").slideUp();
            } else { */
                $target.closest("tr").next().find("div").slideToggle();
            /*  }   */                  
        });
    });



//     $(".delivery").click(function()
//     {
  
//       var item_id = $(this).attr("data-id");
//       var table = $(this).attr("data-table");
//       var field = $(this).attr("data-field");
//       var value =$(this).attr("value_id");
      
  
//         $.ajax({
//           type:"GET",
//           url:"<?php echo BUA.'inc/update.php'; ?>",
//         //   url:"inc/update.php",
//           data:{item_id:item_id,table:table,field:field,value:value},
//           dataType:"JSON",
//           success:function(data)
//           {
//               // console.log(data.message);
//               if(data.message == "success")
//               {
//                 alert("Updated Success");
//               }
//               else 
//               {
//                 // alert("Error");
//               }
              
//           }
//         })
  
//     });
//   $(".done").click(function()
//     {
//       console.log("hellllo");
  
//       var item_id = $(this).attr("data-id");
//       var table = $(this).attr("data-table");
//       var field = $(this).attr("data-field");
//       var value =$(this).attr("value_id");
  
//         $.ajax({
//           type:"GET",
//           url:"<?php echo BUA.'inc/update.php'; ?>",
//         //   url:"inc/update.php",
//           data:{item_id:item_id,table:table,field:field,value:value},
//           dataType:"JSON",
//           success:function(data)
//           {
//               // console.log(data.message);
//               if(data.message == "success")
//               {
//                 alert("Success");
//               }
//               else 
//               {
//                 // alert("Error");
//               }
              
//           }
//         })
  
//     });
  
      



    


});
    






