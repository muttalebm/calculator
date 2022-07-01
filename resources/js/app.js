import './bootstrap';

document.addEventListener("DOMContentLoaded", function (event) {
    let body = document.querySelector('body');
    let result = document.querySelector('#result');


    let clear = document.querySelector('#clear');
    let history = document.querySelector('#history');
    let equalTo = document.querySelector('#equalTo');
    let delete_single_num = document.querySelector('#delete_single_num');

    let Normal_btn = document.querySelectorAll('#Normal_btn');

    let equationArray = [];
    let initial_value = "";

    Normal_btn.forEach((Normal_btn, index) => {
        Normal_btn.addEventListener('click', function () {
            let text = this.innerHTML;
            if (this.dataset.type === "operator" && equationArray[equationArray.length - 1].type === "operator") {
                return false
            } else {
                equationArray.push({
                    value: text,
                    type: this.dataset.type
                });
                result.innerHTML = equationArray.map((item) => {
                    return item.value
                }).join(' ');
            }

        });
    });

    /*equal to button action*/
    equalTo.addEventListener('click', function () {
        if (result.innerHTML != "") {
            console.log(window.axios)
            axios({
                url: '/api/calculate',
                method: "post",
                data: {
                    equation: equationArray
                },
                auth:{
                    username:process.env.MIX_API_BASIC_AUTH_USER,
                    password:process.env.MIX_API_BASIC_AUTH_PASSWORD
                }
            }).then((resolve) => {
                result.innerHTML = resolve.data.result
            })
                .catch((reject) => {
                    console.log(reject.data)
                })

        } else {
            alert('please enter any Number');
        }
    });


    /*clear all number*/
    clear.addEventListener('click', function () {
        result.innerHTML = "";
        equationArray = [];
    });

    /*delete single number*/
    delete_single_num.addEventListener('click', function () {
        equationArray.pop()
        result.innerHTML = equationArray.map((item) => {
            return item.value
        }).join(' ');

    });

});
