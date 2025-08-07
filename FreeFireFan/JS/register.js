console.log("WE ARE INSIDE JS");

const nextBtns = document.querySelectorAll(".next-btn");//next btn
const prevBtns = document.querySelectorAll(".prev-btn");//prev btn
const formSteps = document.querySelectorAll(".form-step");//page of the form (panel where all input fields are set)
const progress = document.getElementById("progress");//moving line
const progressSteps = document.querySelectorAll(".progress-step");//circles

let formStepNum = 0;//this tracks on which page no: you are at in the form

nextBtns.forEach(btn => {
    
    console.log("next button clicked");

  btn.addEventListener("click", () => {//for each next btn when clicked
    if (validateStep(formStepNum)) {//are all inputs filled correctly(vlidateStep() method will return true)
      formStepNum++;//new page (page no: increases)
      updateFormSteps();//new UI
      updateProgressbar();//make line move forward
    }
  });
});

prevBtns.forEach(btn => {
  btn.addEventListener("click", () => {//for each prev btn when clicked
    formStepNum--;//prev page (by decrementing page no: by 1)
    updateFormSteps();//new UI
    updateProgressbar();//make line move backwards
  });
});

function updateFormSteps() {
  formSteps.forEach((formStep, index) => {//for each page (each step, each panel)
    formStep.classList.toggle("form-step-active", index === formStepNum);//if its position (0,1,2,etc) matches the form step number(which is actually a page number) then it will show that step and hide all other with the help of toggle method
  });
}

function updateProgressbar() {
  progressSteps.forEach((step, index) => {//for each circle
    step.classList.toggle("progress-step-active", index <= formStepNum);//fill all circles where current page number is greater or equal then positions (if we are at page 2, fill 0 and 1 circle)
  });
  const progressPercent = (formStepNum / progressSteps.length - 1) * 100;
  progress.style.width = `${progressPercent}%`;//suppose if u r on page 1 out of 4 then (1/4-1)x100 =>  (1/3)x100 =>  0.33x100  ~ 33.34%
}

function validateStep(stepIndex) {
  const inputs = formSteps[stepIndex].querySelectorAll("input");//take all inputs in current page no:
  for (let input of inputs) {//for each input 
    if (!input.checkValidity()) {//if not valid
      input.reportValidity();//report it
      return false;
    }
  }
  return true;//completly fine 
}
