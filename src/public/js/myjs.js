$(document).on('click', '.delete', function () {
    let id = $(this).attr('data-id');
    $('#id').val(id);
});

$('.portfolio-menu ul li').click(function () {
    $('.portfolio-menu ul li').removeClass('active');
    $(this).addClass('active');

    let selector = $(this).attr('data-filter');
    $('.portfolio-item').isotope({
        filter: selector
    });
    return false;
});

$(document).ready(function () {
    let popup_btn = $('.popup-btn');
    popup_btn.magnificPopup({
        type: 'image',
        gallery: {
            enabled: true
        }
    });
});

const inputAll = document.querySelectorAll('.class input');

const token = document.querySelector('input[name="csrf-token"]').getAttribute('content');

const url = document.querySelector('.class').getAttribute('action');

inputAll.forEach(input => input.addEventListener('click', function () {
    let points = this.dataset.itemValue;
    let hotelId = document.querySelector('.hide').getAttribute('data-set-value');
    fetch(url, {
        headers: {
            "Content-Type": "application/json",
            "Accept": "application/json, text-plain, */*",
            "X-Requested-With": "XMLHttpRequest",
            "X-CSRF-TOKEN": token
        },
        method: 'POST',
        credentials: "same-origin",
        body: JSON.stringify({
            points: points,
            hotel_id: hotelId
        })
    })
        .then(response => {
            return response.text();
        })
        .then(text => {
            return console.log(text);
        })
        .catch(function (error) {
            console.log(error);
        });
}))

const urlGetMethod = document.querySelector('input[name="get-rate"]').getAttribute('content');
const urlGetMethodNew = document.querySelector('input[name="get-rate"]').getAttribute('content');

fetch(urlGetMethod)
    .then((response) => {
        return response.json();
    })
    .then((data) => {
        let rate = data;
        let roundRate = Math.round(rate)
        console.log(rate);
        console.log(roundRate);

        let element = document.querySelector('.star[data-item-value="' + roundRate + '"]');
        console.log(element);

        element.setAttribute('checked', true);

        let span = document.querySelector('#exact-rating');

        span.textContent = rate;
    });
inputAll.forEach(input => {
    input.addEventListener('click', () => setTimeout(function () {
        fetch(urlGetMethodNew)
            .then((response) => {
                return response.json();
            })
            .then((data) => {
                let rateNew = data;
                let roundRateNew = Math.round(rateNew)
                console.log(rateNew);
                console.log(roundRateNew);

                let element = document.querySelector('.star[data-item-value="' + roundRateNew + '"]');
                console.log(element);

                element.setAttribute('checked', true);

                let span = document.querySelector('#exact-rating');

                span.textContent = rateNew;
            },);
    }, 1000));
})

function disabledInput () {
    let id = document.querySelector('#for-rate').getAttribute('data-set');
    if (id === 'no-auth') {
        let inputs = document.querySelectorAll('input[type=radio]');
        for( let i = 0; i < inputs.length; i++ ){
            inputs[i].setAttribute('disabled', true);
        }
    }
}

disabledInput();

