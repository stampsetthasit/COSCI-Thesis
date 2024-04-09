document.addEventListener("DOMContentLoaded", function () {
  const ticketDescriptions = {
    ticketCommu: {
      major: "DeBugging Station",
      description:
        "การปรับแก้ระบบที่ติด Bug ให้กลับไปทำงานได้ตามปกติเปรียบเสมือน ปัญหาสุดท้ายที่ The Last Station ที่ได้ทำการแก้ไขจุดบกพร่อง เพื่อที่จะให้ผลงานพร้อมที่จะแสดงผลงานต่าง ๆ ให้ผู้อื่นได้เห็น ซึ่งพวกเราจะเป็น Debugger ที่เป็นเครื่องมือที่ใช้หา Bug (ปัญหาต่าง ๆ)",
      majorThai: "วิชาเอกคอมพิวเตอร์เพื่อการสื่อสาร",
      majorEng: "Computer for Communication",
    },
    ticketCinema: {
      major: "KEEP ROLLING THESIS",
      description:
        "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam ut sem lobortis, venenatis nulla ac, cursus lacus. Suspendisse vitae ullamcorper dui. Maecenas aliquet vulputate turpis, non porttitor mauris molestie sit amet.",
      majorThai: "สาขาภาพยนตร์และสื่อดิจิทัล",
      majorEng: "Cinema and Digital Media",
    },
    ticketCyber: {
      major: "Chill Monument",
      description:
        "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam ut sem lobortis, venenatis nulla ac, cursus lacus. Suspendisse vitae ullamcorper dui. Maecenas aliquet vulputate turpis, non porttitor mauris molestie sit amet.",
      majorThai: "วิชาเอกการจัดการธุรกิจไซเบอร์",
      majorEng: "Cyber Business Management",
    },
    ticketHealth: {
      major: "SHOC(K)CO FACTORY",
      description:
        "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam ut sem lobortis, venenatis nulla ac, cursus lacus. Suspendisse vitae ullamcorper dui. Maecenas aliquet vulputate turpis, non porttitor mauris molestie sit amet.",
      majorThai: "วิชาเอกการสื่อสารเพื่อสุขภาพ",
      majorEng: "Health Communication",
    },
    ticketInno: {
      major: "INNOVERSE Platform",
      description:
        "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam ut sem lobortis, venenatis nulla ac, cursus lacus. Suspendisse vitae ullamcorper dui. Maecenas aliquet vulputate turpis, non porttitor mauris molestie sit amet.",
      majorThai: "วิชาเอกการสื่อสารเพื่อการจัดการนวัตกรรม",
      majorEng: "Innovation Management Communication",
    },
    ticketMulti: {
      major: "End of One - Third",
      description:
        "พาร์ทในช่วงชีวิตแต่ละคนคงไม่พ้น ชีวิตการเรียน การทำงาน และ แก่ตายไป ในเมื่อเด็กปี 4 ที่กำลังจะจบการศึกษาในเร็ววันนี้ เพื่อจะออกไปทำงานในโลกที่กว้างกว่าเดิม ซึ่งนี่อาจเป็น Station สุดท้ายของใครหลายคนในชีวิตการเรียน และ Thesis นี้จะเป็นบทสรุป ของ 1 ส่วน 3",
      majorThai: "วิชาเอกการออกแบบสื่อปฎิสัมพันธ์และมัลติมีเดีย",
      majorEng: "Interactive and Multimedia Design",
    },
    ticketTourism: {
      major: "THEAW KROB ROD",
      description:
        "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam ut sem lobortis, venenatis nulla ac, cursus lacus. Suspendisse vitae ullamcorper dui. Maecenas aliquet vulputate turpis, non porttitor mauris molestie sit amet.",
      majorThai: "วิชาเอกการสื่อสารเพื่อการท่องเที่ยว",
      majorEng: "Tourism Communication",
    },
  };

  // Function to change the description
  function changeDescription(ticketId) {
    const descriptionDiv = document.querySelector(".contain-description");
    descriptionDiv.querySelector(".head-ticket-description").textContent =
      ticketDescriptions[ticketId].major;

    // For the detailed description
    descriptionDiv.querySelector(".ticket-description").textContent =
      ticketDescriptions[ticketId].description;
    descriptionDiv.querySelector(".major-thai").textContent =
      ticketDescriptions[ticketId].majorThai;
    descriptionDiv.querySelector(".major-eng").textContent =
      ticketDescriptions[ticketId].majorEng;
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
