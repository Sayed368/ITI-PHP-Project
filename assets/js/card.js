// let products = document.getElementsByClassName("product");

// function sum() {
//   let sum = document.getElementById("tot");
//   let arr = document.getElementsByClassName("price");
//   sum.innerText = 0;
//   for (x of arr) {
//     let txt = x.innerText;
//     sum.innerText =
//       Number(sum.innerText) + Number(txt.substring(0, txt.length - 1));
//   }
// }
// sum();

// for (let i = 0; i < products.length; i++) {
//   let elem = products[i];
//   let pu = elem.querySelector(".pu").innerText;
//   elem.addEventListener("click", e => {
//     switch (e.target.className) {
//       case "fas fa-heart":
//       case "fas fa-heart red":
//         e.target.classList.toggle("red");
//         break;
//       case "remove":
//         elem.remove();
//         break;
//       case "plus":
//         elem.querySelector(".qt").innerText++;

//         elem.querySelector(".price").innerText =
//           pu * elem.querySelector(".qt").innerText + "$";
//         sum();
//         break;
//       case "minus":
//         if (elem.querySelector(".qt").innerText > 0) {
//           elem.querySelector(".qt").innerText--;
//           elem.querySelector(".price").innerText =
//             pu * elem.querySelector(".qt").innerText + "$";
//           sum();
//         }
//         break;
//     }
//   });
// }


// $(document).ready(function() {
//     window.onscroll=function(){
//         if(window.pageYOffset>100){
//            console.log('helllllo');
            
//         }
//         else{
//            console.log('nooooooooooo');
//         }
//     }






//     $(function() {
//         $("table tr td").find("div").hide();
//         $("table").click(function(event) {
//             event.stopPropagation();
//             var $target = $(event.target);
//          /*    if ( $target.closest("td").attr("colspan") > 1 ) {
//                 $target.closest("div.expand").slideUp();
//             } else { */
//                 $target.closest("tr").next().find("div").slideToggle();
//            /*  }   */                  
//         });
//     });
//     });
    

