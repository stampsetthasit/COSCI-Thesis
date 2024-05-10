// Set the date we're counting down to
var countDownDate = new Date("May 21, 2024 00:00:00").getTime();

// Update the countdown every 1 second
var x = setInterval(function () {
  // Get the current date and time
  var now = new Date().getTime();

  // Calculate the distance between now and the countdown date
  var distance = countDownDate - now;

  // Calculate days, hours, minutes and seconds remaining
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result
  document.getElementById("days").innerHTML = days;
  document.getElementById("hours").innerHTML = hours;
  document.getElementById("minutes").innerHTML = minutes;
  document.getElementById("seconds").innerHTML = seconds;

  // If the countdown is finished, display a message
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("days").innerHTML = 0;
    document.getElementById("hours").innerHTML = 0;
    document.getElementById("minutes").innerHTML = 0;
    document.getElementById("seconds").innerHTML = 0;
  }
}, 1000);

document.addEventListener("DOMContentLoaded", function () {
  const ticketDescriptions = {
    ticketCinema: {
      major: "KEEP ROLLING THESIS",
      description:
        "Welcome To KeeprollingTHESIS Exhibition 2024 “Way Down To CINEMA Town” The City of Real Life Movie Night เมืองแห่งภาพยนตร์ที่มีแต่ความอิสระ และความเป็นตัวเอง ของเหล่าตัวละครในภาพยนตร์ทั้ง 10 เรื่อง และเหล่าผู้สร้างแห่งโลกภาพยนตร์ พร้อมทั้งผู้ชมที่หากหลากหลาย ใช้ชีวิตร่วมกันอยู่ท่ามกลางยุคแห่งความรุ่งเรือง และหรูหราของวงการภาพยนตร์พร้อมแล้วที่จะเปิดให้ผู้ที่หลงใหลในภาพยนตร์ในยุคปัจจุบันได้เข้ามาร่วมใช้ชีวิต และเรียนรู้ไปกับพวกเรา ในวันที่ 17-19 พฤษภาคมนี้",
      majorGallery: "cinema",
      majorThai: "สาขาภาพยนตร์และสื่อดิจิทัล",
      majorEng: "Cinema and Digital Media",
      logoSrc: "resources/images/2024/logoMajor/Cinema.png",
      facebookUrl: "https://www.facebook.com/KeepRollingThesis?mibextid=LQQJ4d",
      instagramUrl:
        "https://www.instagram.com/keeprollingthesis?igsh=aHJ1MTE5cWR0NGc=",
      gradientClass: "gradient-text-cinema",
      // galleryUrl: "#",
    },
    ticketCommu: {
      major: "DeBugging Station",
      description:
        "การปรับแก้ระบบที่ติด Bug ให้กลับไปทำงานได้ตามปกติเปรียบเสมือน ปัญหาสุดท้ายที่ The Last Station ที่ได้ทำการแก้ไขจุดบกพร่องเพื่อที่จะให้ผลงานพร้อมที่จะแสดงผลงานต่าง ๆ ให้ผู้อื่นได้เห็น ซึ่งพวกเราจะเป็น Debugger ที่เป็นเครื่องมือที่ใช้หา Bug (ปัญหาต่าง ๆ)",
      majorGallery: "commu",
      majorThai: "วิชาเอกคอมพิวเตอร์เพื่อการสื่อสาร",
      majorEng: "Computer for Communication",
      logoSrc: "resources/images/2024/logoMajor/Commu.png",
      facebookUrl: "https://www.facebook.com/CommuteluThesis",
      instagramUrl: "https://www.instagram.com/commuthesis/",
      gradientClass: "gradient-text-commu",
      // galleryUrl: "https://www.google.com/",
    },
    ticketInno: {
      major: "INNOVERSE Platform",
      description:
        "การเรียนในแต่ละปีนั้นเป็นเหมือนเกมที่ต้องไปในจุดถึงเส้นชัยในแต่ละด่าน โดยต้องใช้ทักษะด้านต่าง ๆ ความรู้ และความพยายามเป็นอย่างมาก ซึ่งนิสิตอินโนนั้นเปรียบเสมือนตัวละครในเกม Arcade ที่มีทักษะโดดเด่นแตกต่างกันไป แต่คนต่างนำทักษะที่ตัวเองมีมาช่วยฝ่าฝันอุปสรรคไปได้ และธีสิสก็เหมือนด่านสุดท้ายที่แต่ละคนจะได้ขึ้นไปเป็น Master ของสิ่งที่ตนเองถนัด และจบเกมไปได้อย่างสวยงาม",
      majorGallery: "inno",
      majorThai: "วิชาเอกการสื่อสารเพื่อการจัดการนวัตกรรม",
      majorEng: "Innovation Management Communication",
      logoSrc: "resources/images/2024/logoMajor/Inno.png",
      facebookUrl: "https://www.facebook.com/innocosciswu?mibextid=ZbWKwL",
      instagramUrl:
        "https://www.instagram.com/inno.cosci?igsh=ZjBxMG0xYXptYmV5",
      gradientClass: "gradient-text-inno",
      // galleryUrl: "#",
    },
    ticketHealth: {
      major: "SHOC(K)CO FACTORY",
      description:
        '"Facto Shock-Co" หรือ โรงงานผลิตสื่อสร้างสรรค์เพื่อสุขภาพ ที่รวบรวมเรื่องราวสุด Shock เกี่ยวกับสุขภาพที่คุณอาจไม่เคยรู้มาก่อน…เพราะพวกเราเชื่อว่า "สุขภาพเป็นเรื่องของทุกคน"',
      majorGallery: "health",
      majorThai: "วิชาเอกการสื่อสารเพื่อสุขภาพ",
      majorEng: "Health Communication",
      logoSrc: "resources/images/2024/logoMajor/Health.png",
      facebookUrl:
        "https://www.facebook.com/HealthThesisExhibition.COSCI?mibextid=LQQJ4d",
      instagramUrl:
        "https://www.instagram.com/healthcom.cosci?igsh=MThhajFzZ3FsZ2JtOQ==",
      gradientClass: "gradient-text-health",
      // galleryUrl: "#",
    },
    ticketTourism: {
      major: "THEAW KROB ROD",
      description:
        "สถานี 'เที่ยว ครบ รส' พร้อมพาทุกคนค้นพบรสชาติของการท่องเที่ยวต้นตำรับ จากวัตถุดิบล้ำค่า 13 ของดี 13 จังหวัด ไม่มีซ้ำ! จะดี จะฟินแค่ไหนถ้าได้ชิมและได้ชิลในคราวเดียวกัน เพราะมากกว่าปลายทาง 'ความอร่อย' ยังมีระหว่างทางรอคอยให้ทุกคนได้สัมผัส ",
      majorGallery: "tour",
      majorThai: "วิชาเอกการสื่อสารเพื่อการท่องเที่ยว",
      majorEng: "Tourism Communication",
      logoSrc: "resources/images/2024/logoMajor/Tour.png",
      facebookUrl: "https://www.facebook.com/TourismThesisExhibition",
      instagramUrl:
        "https://www.instagram.com/tourismthesis?igsh=OXJqYmc3dTN4OXNo&utm_source=qr",
      gradientClass: "gradient-text-tour",
      // galleryUrl: "#",
    },
    ticketCyber: {
      major: "Chill Monument",
      description:
        "ศูนย์รวมความชิลที่สถานีสุดท้าย สถานีสุดท้ายก่อนก้าวออกไปสู่โลกแห่งการทำงานนั้น ไม่จำเป็นต้องเต็มไปด้วยความกดดันเสมอไป อนุสาวรีย์ชิลจะเป็นสัญลักษณ์ของการใช้ชีวิตอย่างเรียบง่าย และมีความสุข เติมเต็มชีวิตของเราด้วยผลงานที่ตอบโจทย์ไลฟ์สไตล์ของคุณ",
      majorGallery: "cyber",
      majorThai: "วิชาเอกการจัดการธุรกิจไซเบอร์",
      majorEng: "Cyber Business Management",
      logoSrc: "resources/images/2024/logoMajor/Cyber.png",
      facebookUrl: "#",
      instagramUrl: "https://www.instagram.com/cyberchillmonument/",
      gradientClass: "gradient-text-cyber",
      // galleryUrl: "#",
    },
    ticketMulti: {
      major: "End of One - Third",
      description:
        "เมื่อเด็กปีสี่ที่ใกล้จะจบการศึกษาและพร้อมออกเดินทางไปยังโลกกว้าง ณ ชานชาลาหนึ่งส่วนสาม จึงเปรียบดั่งสถานที่สุดท้าย หรือ บทสรุปของนิสิตที่ต้องร่วมสร้างสรรค์ผลงานธีสิส ก่อนจะแยกย้ายกันไปเติบโต",
      majorGallery: "multi",
      majorThai: "วิชาเอกการออกแบบสื่อปฎิสัมพันธ์และมัลติมีเดีย",
      majorEng: "Interactive and Multimedia Design",
      logoSrc: "resources/images/2024/logoMajor/Multi.png",
      facebookUrl: "https://www.facebook.com/Multi.Xhibition",
      instagramUrl: "https://www.instagram.com/endofonethird.exhibition",
      gradientClass: "gradient-text-multi",
      // galleryUrl: "#",
    },
  };

  const gradientClasses = [
    "gradient-text-cinema",
    "gradient-text-commu",
    "gradient-text-inno",
    "gradient-text-health",
    "gradient-text-tour",
    "gradient-text-cyber",
    "gradient-text-multi",
  ];

  // Element selectors
  const descriptionDiv = document.querySelector(".contain-description");
  const majorLogoImg = document.querySelector(".img-major");
  const facebookLink = document.getElementById("facebookLink");
  const instagramLink = document.getElementById("instagramLink");
  const galleryLink = document.getElementById("galleryLink");
  const scrollWrapper = document.querySelector(".horizontal-scroll-wrapper");
  const dotsContainer = document.querySelector(".dots-container");
  const images = scrollWrapper.querySelectorAll(".image-container");

  function updateGradient(element, newGradientClass) {
    element.classList.remove(...gradientClasses);
    element.classList.add(newGradientClass);
  }

  function updateDescriptionAndLinks(ticketId) {
    updateDescriptionContent(ticketId);
    updateSocialLinks(ticketId);
  }

  function updateDescriptionContent(ticketId) {
    const { major, description, majorThai, majorEng, logoSrc, gradientClass } =
      ticketDescriptions[ticketId];

    descriptionDiv.querySelector(".head-ticket-description").textContent =
      major;
    descriptionDiv.querySelector(".ticket-description").textContent =
      description;
    descriptionDiv.querySelector(".major-thai").textContent = majorThai;
    descriptionDiv.querySelector(".major-eng").textContent = majorEng;
    majorLogoImg.src = logoSrc;
    galleryLink.onclick = () =>
      show_gallery(ticketDescriptions[ticketId].majorGallery);

    updateGradient(
      descriptionDiv.querySelector(".head-ticket-description"),
      gradientClass
    );
    updateGradient(
      descriptionDiv.querySelector(".ticket-description.major-thai"),
      gradientClass
    );
    updateGradient(
      descriptionDiv.querySelector(".ticket-description.major-eng"),
      gradientClass
    );
  }

  function updateSocialLinks(ticketId) {
    const { facebookUrl, instagramUrl } = ticketDescriptions[ticketId];
    facebookLink.href = facebookUrl;
    instagramLink.href = instagramUrl;
  }

  function addTicketListeners() {
    Object.keys(ticketDescriptions).forEach((ticketId) => {
      const ticketElement = document.getElementById(ticketId);
      if (ticketElement) {
        ticketElement.addEventListener("click", () => {
          updateDescriptionAndLinks(ticketId);
        });
      }
    });
  }

  function initDotsAndImages() {
    images.forEach((img, index) => {
      const dot = document.createElement("span");
      dot.classList.add("dot");
      if (index === 0) dot.classList.add("active");

      dot.addEventListener("click", () => {
        scrollToImage(index);
      });

      dotsContainer.appendChild(dot);
    });
  }

  function updateActiveDot(activeIndex) {
    const dots = dotsContainer.querySelectorAll(".dot");
    dots.forEach((dot) => dot.classList.remove("active"));

    if (dots[activeIndex]) {
      dots[activeIndex].classList.add("active");
    }
  }

  function scrollToImage(index) {
    const targetImage = images[index];
    scrollWrapper.scrollLeft =
      targetImage.offsetLeft - scrollWrapper.offsetLeft;
    updateActiveDot(index);
    const ticketId = images[index].id;
    updateDescriptionAndLinks(ticketId);
  }

  function handleScroll() {
    const activeIndex = getMostProminentImage();
    updateActiveDot(activeIndex);
    const ticketId = images[activeIndex].id;
    updateDescriptionAndLinks(ticketId);
  }

  function getMostProminentImage() {
    let closestImageIndex = 0;
    let minDistance = Number.MAX_VALUE;

    images.forEach((img, index) => {
      const imgCenter = img.offsetLeft + img.offsetWidth / 2;
      const scrollCenter =
        scrollWrapper.scrollLeft + scrollWrapper.offsetWidth / 2;
      const distance = Math.abs(scrollCenter - imgCenter);

      if (distance < minDistance) {
        closestImageIndex = index;
        minDistance = distance;
      }
    });

    return closestImageIndex;
  }

  addTicketListeners();
  initDotsAndImages();
  scrollWrapper.addEventListener("scroll", handleScroll);
  updateDescriptionAndLinks(images[0].id); // Initialize with the first image's data
});

/* ========== Image Gallery ========== */
var sideScroll = document.getElementById("sideScroll");
var showImage = document.getElementById("showImg");
var numIndex = 0;
var currentGalleryLoadingToken = null;

function show_gallery(majorCode) {
  $("#divLoad").show();
  while (sideScroll.hasChildNodes()) {
    sideScroll.removeChild(sideScroll.firstChild);
  }
  showImage.style.backgroundImage = "url()";

  // Generate a new unique token for this loading session
  const thisLoadingToken = Math.random();
  currentGalleryLoadingToken = thisLoadingToken;

  setTimeout(function () {
    if (currentGalleryLoadingToken !== thisLoadingToken) {
      // If the token has changed, do not proceed with setting the gallery
      return;
    }
    set_gallery(majorCode, thisLoadingToken);
    $("#divLoad").hide();
  }, 1000);
}

function set_gallery(majorCode, loadingToken) {
  const path = "resources/images/2024/thesis_collection/";
  let imageIndex = 1;

  sideScroll.innerHTML = "";
  loadNextImage();

  function loadNextImage() {
    if (currentGalleryLoadingToken !== loadingToken) {
      // Stop loading more images if the token has changed
      return;
    }
    const imgPath = `${path}${majorCode}_${imageIndex}.webp`;
    const imgElement = new Image();

    imgElement.onload = function () {
      if (currentGalleryLoadingToken !== loadingToken) {
        // If the token has changed during image load, do not append it
        return;
      }
      appendImage(imgPath);
      imageIndex++;
      setTimeout(loadNextImage, 500); // Delay next image loading
    };

    imgElement.onerror = function () {
      console.error(
        "No more images to load or failed to load image at index: " + imageIndex
      );
      // Optionally stop further attempts if a certain condition is met
    };

    imgElement.src = imgPath;
  }

  function appendImage(imgPath) {
    const divSide = document.createElement("div");
    divSide.style.backgroundImage = `url(${imgPath})`;
    divSide.classList.add("sideImg");
    divSide.onclick = function () {
      document
        .querySelectorAll(".sideImg.imgShow")
        .forEach((element) => element.classList.remove("imgShow"));
      this.classList.add("imgShow");
      showImage.style.backgroundImage = `url(${imgPath})`;
      updateIndex(this);
    };
    sideScroll.appendChild(divSide);

    if (imageIndex === 1) {
      divSide.click(); // Automatically click the first image
    }
  }

  function updateIndex(selectedElement) {
    const sideImages = Array.from(document.getElementsByClassName("sideImg"));
    numIndex = sideImages.indexOf(selectedElement);
  }

  $("#divGallery").show();
}

// Close modal
$(".galleryClose").click(function () {
  $("#divGallery").hide();
  sideScroll.innerHTML = "";
});

document.addEventListener("DOMContentLoaded", function () {
  const scrollWrapper = document.querySelector(".horizontal-scroll-wrapper");
  const images = scrollWrapper.querySelectorAll(".image-container img");

  function updateImageOpacity() {
    const center = scrollWrapper.scrollLeft + scrollWrapper.offsetWidth / 2;

    images.forEach((img) => {
      const imgCenter = img.offsetLeft + img.offsetWidth / 2;
      const distance = Math.abs(center - imgCenter);
      const maxDistance = scrollWrapper.offsetWidth / 2; // Maximum distance from center to side of the scroll area
      const opacity = Math.max(1 - distance / maxDistance, 0.5); // Opacity ranges from 0.5 to 1
      img.style.opacity = opacity;
    });
  }

  scrollWrapper.addEventListener("scroll", updateImageOpacity);
  updateImageOpacity(); // Initial call to set the opacity properly
});
