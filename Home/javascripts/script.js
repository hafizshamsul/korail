const sta=document.getElementById('sta');
const des=document.getElementById('des');
const form=document.getElementById('form');
const error=document.getElementById('error');

form.addEventListener('submit',(e)=>{
   let messages=[];
   
   
   if(des.value==sta.value&&des.value>-1&&sta.value>-1){
      messages.push('Same origin and destination!');
   }
   if(sta.value==-1){
      messages.push(',Choose a start\n');
   }
   if(des.value==-1){
      messages.push('Choose a destination\n');
   }
   
   
   if(messages.length>0){
   e.preventDefault();
   error.innerText=messages;
   }
   
});