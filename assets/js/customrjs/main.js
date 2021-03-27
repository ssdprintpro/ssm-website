const mainBlock = document.getElementsByTagName("main")[0],
  header = document.getElementsByClassName("fixed-top")[0],
  scrollBtns = document.querySelectorAll(".scrolling-btn"),
  loadingDiv = document.querySelector("#preloder");

window.onload = () => {
  loadingDiv.style.display = "none";
};

$applyNowButton = $(".applynow");
$appluNowContainerClose = $(".close");
const applyNowForm = document.getElementById("apply-now-form");

let headerHeight = header.offsetHeight;

function scrollToBlock() {
  event.preventDefault();
  let e = event.target.dataset.scrollto,
    t = document.getElementById(e);
  window.scrollTo(0, t.offsetTop - headerHeight);
}

(mainBlock.style.marginTop = headerHeight + "px"),
  scrollBtns.forEach((e) => {
    e.addEventListener("click", scrollToBlock);
  });

const resetApplyNowForm = () => {
  applyNowForm.reset();
  $appluNowContainerClose.click();
};

$applyNowButton.click(function () {
  $("#overlay").addClass("visible");
});

$appluNowContainerClose.click(function () {
  $("#overlay").removeClass("visible");
});

applyNowForm.addEventListener("submit", (e) => {
  e.preventDefault();
  loadingDiv.style.display = "block";
  let formData = new FormData(applyNowForm);
  let data = {
    name: formData.get("name"),
    phno: formData.get("phno"),
    email: formData.get("Email"),
    inst: formData.get("institute"),
    message: formData.get("Message"),
    applyNow: "apply",
  };
  $.post("/controllers/responceController.php", data, (responce) => {
    console.log(responce);
    if (responce == 1) {
      alert("Your responce is recorded, Out executives will contact you");
      loadingDiv.style.display = "none";
      resetApplyNowForm();
    } else {
      alert("Your responce could not be recorded, Please try after some time");
      loadingDiv.style.display = "none";
      resetApplyNowForm();
    }
  });
});

// function submits(e){
//   $s=$(e).parent().parent()
//   // console.log($s);
// // console.log('called');
// $name=$($s).find(' input[name="name"]').val();
// $cono=$($s).find(' input[name="cono"]').val();
// $Message=$($s).find(' input[name="Message"]').val();
// $Email=$($s).find(' input[name="Email"]').val();
// $inst=$($s).find('#institute').val();
// $.post('./applynow.php',{enq: 'True', name: $name, cono: $cono,Message: $Message, Email: $Email,institute:$inst  },function(data){
//   // console.log(data);
//   if(data=='inserted'){
//       window.alert('Your messare is received, We will contact you as soon as possible');
//       $($s)[0].reset();
//       $('.close').click();

//   }else{
//       window.alert('Message not sent');
//   }
// });
// }

//   url scroller
// let url = window.location.href;
// let id = url.split('#');
// console.log(id);

// if(id.length>1){
//     t = document.getElementById(id[id.length-1]);
//     window.scrollTo(0, t.offsetTop - headerHeight);
// }
