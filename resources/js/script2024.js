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
    ticketCommu: {
      major: "DeBugging Station",
      description:
        "การปรับแก้ระบบที่ติด Bug ให้กลับไปทำงานได้ตามปกติเปรียบเสมือน ปัญหาสุดท้ายที่ The Last Station ที่ได้ทำการแก้ไขจุดบกพร่อง เพื่อที่จะให้ผลงานพร้อมที่จะแสดงผลงานต่าง ๆ ให้ผู้อื่นได้เห็น ซึ่งพวกเราจะเป็น Debugger ที่เป็นเครื่องมือที่ใช้หา Bug (ปัญหาต่าง ๆ)",
      majorThai: "วิชาเอกคอมพิวเตอร์เพื่อการสื่อสาร",
      majorEng: "Computer for Communication",
      logoSrc: "resources/images/2024/logoMajor/Commu.png",
    },
    ticketCinema: {
      major: "KEEP ROLLING THESIS",
      description:
        "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam ut sem lobortis, venenatis nulla ac, cursus lacus. Suspendisse vitae ullamcorper dui. Maecenas aliquet vulputate turpis, non porttitor mauris molestie sit amet.",
      majorThai: "สาขาภาพยนตร์และสื่อดิจิทัล",
      majorEng: "Cinema and Digital Media",
      logoSrc: "resources/images/2024/logoMajor/Cinema.png",
    },
    ticketCyber: {
      major: "Chill Monument",
      description:
        "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam ut sem lobortis, venenatis nulla ac, cursus lacus. Suspendisse vitae ullamcorper dui. Maecenas aliquet vulputate turpis, non porttitor mauris molestie sit amet.",
      majorThai: "วิชาเอกการจัดการธุรกิจไซเบอร์",
      majorEng: "Cyber Business Management",
      logoSrc: "resources/images/2024/logoMajor/Cyber.png",
    },
    ticketHealth: {
      major: "SHOC(K)CO FACTORY",
      description:
        "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam ut sem lobortis, venenatis nulla ac, cursus lacus. Suspendisse vitae ullamcorper dui. Maecenas aliquet vulputate turpis, non porttitor mauris molestie sit amet.",
      majorThai: "วิชาเอกการสื่อสารเพื่อสุขภาพ",
      majorEng: "Health Communication",
      logoSrc: "resources/images/2024/logoMajor/Health.png",
    },
    ticketInno: {
      major: "INNOVERSE Platform",
      description:
        "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam ut sem lobortis, venenatis nulla ac, cursus lacus. Suspendisse vitae ullamcorper dui. Maecenas aliquet vulputate turpis, non porttitor mauris molestie sit amet.",
      majorThai: "วิชาเอกการสื่อสารเพื่อการจัดการนวัตกรรม",
      majorEng: "Innovation Management Communication",
      logoSrc: "resources/images/2024/logoMajor/Inno.png",
    },
    ticketMulti: {
      major: "End of One - Third",
      description:
        "พาร์ทในช่วงชีวิตแต่ละคนคงไม่พ้น ชีวิตการเรียน การทำงาน และ แก่ตายไป ในเมื่อเด็กปี 4 ที่กำลังจะจบการศึกษาในเร็ววันนี้ เพื่อจะออกไปทำงานในโลกที่กว้างกว่าเดิม ซึ่งนี่อาจเป็น Station สุดท้ายของใครหลายคนในชีวิตการเรียน และ Thesis นี้จะเป็นบทสรุป ของ 1 ส่วน 3",
      majorThai: "วิชาเอกการออกแบบสื่อปฎิสัมพันธ์และมัลติมีเดีย",
      majorEng: "Interactive and Multimedia Design",
      logoSrc: "resources/images/2024/logoMajor/Multi.png",
    },
    ticketTourism: {
      major: "THEAW KROB ROD",
      description:
        "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam ut sem lobortis, venenatis nulla ac, cursus lacus. Suspendisse vitae ullamcorper dui. Maecenas aliquet vulputate turpis, non porttitor mauris molestie sit amet.",
      majorThai: "วิชาเอกการสื่อสารเพื่อการท่องเที่ยว",
      majorEng: "Tourism Communication",
      logoSrc: "resources/images/2024/logoMajor/Tour.png",
    },
  };

  // Function to change the description
  function changeDescription(ticketId) {
    const descriptionDiv = document.querySelector(".contain-description");

    descriptionDiv.querySelector(".head-ticket-description").textContent =
      ticketDescriptions[ticketId].major;
    descriptionDiv.querySelector(".ticket-description").textContent =
      ticketDescriptions[ticketId].description;
    descriptionDiv.querySelector(".major-thai").textContent =
      ticketDescriptions[ticketId].majorThai;
    descriptionDiv.querySelector(".major-eng").textContent =
      ticketDescriptions[ticketId].majorEng;

    const majorLogoImg = document.querySelector(".img-major");
    majorLogoImg.src = ticketDescriptions[ticketId].logoSrc;
  }

  Object.keys(ticketDescriptions).forEach(function (ticketId) {
    const ticketElement = document.getElementById(ticketId);
    if (ticketElement) {
      ticketElement.addEventListener("click", function () {
        changeDescription(ticketId);
      });
    }
  });
});
