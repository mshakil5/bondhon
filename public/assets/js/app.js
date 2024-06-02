var myCarousel = document.querySelector("#carouselExampleFade");
var carousel = new bootstrap.Carousel(myCarousel, {
  interval: 4000,
  wrap: true,
});


function addDonate(event) {
  let prodeccingfee = document.getElementById("prodeccingfee").value;  
  let donateVal = document.getElementById("donate").innerHTML;  
   Number(donateVal);
   Number(prodeccingfee); 
  let result = document.getElementById("donate").innerHTML = Number(prodeccingfee) + Number(donateVal)

}
