const validates = () =>{
   var todoitem = document.getElementById("todoitem").value.trim();
   if(todoitem === ""){
       alert("please fill the item to be aded");
       return false;
   }
}

