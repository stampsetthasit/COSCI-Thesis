/* ===== Load Windows ===== */
function windowLoad(numTD, numAll, thesisYear) {
  // console.log(sessionStorage.loaded);
  if (!sessionStorage.loaded) {
      sessionStorage.setItem('loaded', thesisYear);
      window.location.reload();
      // numTD = parseInt(numTD) + 1;
      // numAll = parseInt(numAll) + 1;
  }
  else if (sessionStorage.getItem('loaded') !== thesisYear) {
      sessionStorage.setItem('loaded', thesisYear);
      window.location.reload();
  }
    $('#getNumTD').text(numberWithCommas(numTD));
    $('#getNumAll').text(numAll.toLocaleString());
}


/* ===== Animation ===== */
let scrollAnimationElements = document.querySelectorAll('[data-san]');

let options = {
  rootMargin: '0px',
  threshold: .5
}

let scrollAnimationObserver = new IntersectionObserver(entries => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      // Add class to entry
      entry.target.classList.add(entry.target.dataset.san)

      // Remove the data-san attribute after 3.5 second the animation occur 
      // Remove this line below if you dont wanna remove the data-san attribute
      setTimeout(() => {
        entry.target.removeAttribute('data-san')
      }, 5000)

      // Unobserve the entry to prevent infinite loop observing
      scrollAnimationObserver.unobserve(entry.target)
    }
  })
}, options)


scrollAnimationElements.forEach(scrollAnimationElement => {
  scrollAnimationObserver.observe(scrollAnimationElement)
})



/* ===== Thesis Detail ===== */
var sld1Index = 0;
var sld2Index = 0;
// showSlides(sld1Index);

function plusSlides(n) {
  showSlides(sld1Index += n);
}

function showSlides(n) {
  // alert(n + " Test!!");
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var ttexts = document.getElementsByClassName("myDetails");
  if (n > slides.length - 1) {sld1Index = 0}
  if (n < 0) {sld1Index = slides.length - 1}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
      ttexts[i].style.display = "none";
  }
  // slides[sld1Index].style.display = "block";
  // ttexts[sld1Index].style.display = "block";
  $('.mySlides').eq(sld1Index).fadeTo("slow", 1);
  $('.myDetails').eq(sld1Index).fadeIn("slow");
  sld2Index = sld1Index + 1;
}


/* ===== Button Click ===== */
function showDetail(sindex) {
  sld1Index = sindex;
  sld2Index = sindex;
  var slides = document.getElementsByClassName("mySlides");
  var ttexts = document.getElementsByClassName("myDetails");

  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
      ttexts[i].style.display = "none";
  }
  // slides[sindex].style.display = "block";
  // ttexts[sindex].style.display = "block";
  $('.mySlides').eq(sindex).fadeTo("slow", 1);
  $('.myDetails').eq(sindex).fadeIn("slow");
}

function autoSlideShow() {
  var slides = document.getElementsByClassName("mySlides");
  $('.mySlides').hide();
  $('.myDetails').hide();
  if (sld2Index > slides.length - 1) { sld2Index = 0 }
  //$('.mySlides').eq(sld2Index).fadeIn(3000);
  $('.mySlides').eq(sld2Index).fadeTo("slow", 1);
  $('.myDetails').eq(sld2Index).fadeIn("slow");
  sld1Index = sld2Index;
  sld2Index++;
  
  setTimeout(autoSlideShow, 5100);  /* Change image every ... seconds */
}


// Add Comma to Number
function numberWithCommas(x) {
  var parts = x.toString().split(".");
  parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
  return parts.join(".");
}






