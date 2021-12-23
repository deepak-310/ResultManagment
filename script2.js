// change password 
const addchangepassword=document.querySelector('#c_password');
const changepassword=document.querySelector('.change_password');
const cancelchangepass=document.querySelector('#changepasswordCancel');
addchangepassword.addEventListener('click',function(){
    openchangepass();

});
cancelchangepass.addEventListener('click',function(){
    closechangepass();
});


changepassword.addEventListener('click', function(e){
  if(e.target !== this) return;
  closechangepass();
});

document.addEventListener('keydown', function(e){
  if(e.key === 'Escape') {
    closechangepass();
  }
});
function openchangepass() {
  changepassword.classList.add('show_change_password');
}
function closechangepass() {
  changepassword.classList.remove('show_change_password');
}
