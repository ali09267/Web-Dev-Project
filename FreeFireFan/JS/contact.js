function validateForm(){
     let nameInput=document.getElementById("nameID").value.trim();
        let emailInput=document.getElementById("emailID").value.trim();
    let subjectInput=document.getElementById("subjectID").value.trim();
        let msgInput=document.getElementById("msgID").value.trim();

        let message=document.getElementById("message");

        if(msgInput==="" || subjectInput==="" || emailInput==="" || nameInput===""){
           alert("Kindly fill all the rquired credentials");
 return false;
        }
        return true;
}