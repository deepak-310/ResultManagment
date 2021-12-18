'use strict';

// const btnTeacher=document.querySelector('.btn');
// const btnHome=document.querySelector('.home_link')
// const text=document.querySelector('.text')

// const openHome = function () {
//     text.classList.remove('hidden');
//   };

// btnHome.addEventListener('click',openHome);

const admin=document.querySelector('.btn_admin');
const left=document.querySelector('.left');
const right=document.querySelector('.right');
const teacher=document.querySelector('.btn_teacher');
const icon_position_1=document.querySelector('.icon-1');
const icon_position_2=document.querySelector('.icon-2');
const home=document.querySelector('.home_link');
const login=document.querySelector('.login_link');
const text=document.querySelector('.text')
const signin=document.querySelector('.login');

const switch_side=function(){
    left.classList.add('switch_right');
    right.classList.add('switch_left');
    icon_position_1.classList.add('icon_left');
    icon_position_2.classList.add('icon_left');
    admin.classList.add('color');
    teacher.classList.remove('color');
};

const normal=function(){
    left.classList.remove('switch_right');
    right.classList.remove('switch_left');
    icon_position_1.classList.remove('icon_left');
    icon_position_2.classList.remove('icon_left');
    admin.classList.remove('color');
    teacher.classList.add('color');
};

const openHome=function(){
    text.classList.remove('hidden');
    signin.classList.add('hidden');
};

const openLogin=function(){
    text.classList.add('hidden');
    signin.classList.remove('hidden');
};

home.addEventListener('click',openHome);
login.addEventListener('click',openLogin);
admin.addEventListener('click',switch_side);
teacher.addEventListener('click',normal);