'use strict';

const admin=document.querySelector('.btn_admin');
const left=document.querySelector('.left');
const right=document.querySelector('.right');
const teacher=document.querySelector('.btn_teacher');
const home=document.querySelector('.home_link');
const login=document.querySelector('.login_link');
const text=document.querySelector('.text')
const signin=document.querySelector('.login');
//------changes-----
//comment the foll 2 lines or delete it
// const icon_position_1=document.querySelector('.icon-1');
// const icon_position_2=document.querySelector('.icon-2');
const overlay=document.querySelector('.overlay');
//------changes-----


const closeLogin=function(){
    text.classList.remove('hidden');
    signin.classList.add('hidden');
    //------changes-----
    overlay.classList.add('hidden');
    //------changes-----
}

const switch_side=function(){
    left.classList.add('switch_right');
    right.classList.add('switch_left');
    teacher.classList.remove('color');
    admin.classList.add('color');
    //-----changes-----//
    //comment the foll 2 lines or delete it and add the foll id name to line number 61 of index.html 
    // icon_position_1.classList.add('icon_left');
    // icon_position_2.classList.add('icon_left');
    document.getElementById("img").style.borderRadius = "5px 0 0 5px";
    //---changes----//
};

const normal=function(){
    left.classList.remove('switch_right');
    right.classList.remove('switch_left');
    admin.classList.remove('color');
    teacher.classList.add('color');
    //------changes-----
    //comment the foll 2 lines or delete it
    // icon_position_1.classList.remove('icon_left');
    // icon_position_2.classList.remove('icon_left');
    //----changes-------
};

const openHome=function(){
    text.classList.remove('hidden');
    signin.classList.add('hidden');
};

const openLogin=function(){
    text.classList.add('hidden');
    signin.classList.remove('hidden');
    //------changes-----
    overlay.classList.remove('hidden');
    //------changes-----
};

home.addEventListener('click',openHome);
login.addEventListener('click',openLogin);
admin.addEventListener('click',switch_side);
teacher.addEventListener('click',normal);
//------changes-----
overlay.addEventListener('click',closeLogin);
//------changes-----





