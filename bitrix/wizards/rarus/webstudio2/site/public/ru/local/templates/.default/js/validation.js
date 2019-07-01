'use strict';

const form = document.querySelector('.feedback__form');
const mailInput = form.querySelector('.feedback__input');
const submitBtn = form.querySelector('.feedback__btn');
const feedbackBlock = document.querySelectorAll('.feedback');

mailInput.addEventListener('blur', function (evt) {
    evt.preventDefault();

    if (!mailInput.validity.valid) {
        mailInput.classList.add('feedback__input--invalid');
        submitBtn.disabled = true;
    } else {
        mailInput.classList.remove('feedback__input--invalid');
        submitBtn.disabled = false;
    }
});

submitBtn.addEventListener('click', function (evt) {
    var Name = $('.feedback__btn').attr('name');
    var Value = $('.feedback__btn').attr('value');
    evt.preventDefault();
    if (!submitBtn.disabled) {
        $.ajax({
            url : $('.feedback__form').attr("action"),
            type: "POST",
            data: $('.feedback__form').serialize() + '&' + Name + '="' + Value + '"'
        });
        feedbackBlock.forEach(function (block) {
            block.classList.toggle('hide-js');
        });
    }
});
