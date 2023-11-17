
// here change input radios with payments page
$(document).ready(function() {
    $('.blr').on('click', function(){
        var $$ = $(this)
        if( !$$.is('.checked')){
            $$.addClass('checked');
            $$.next(".imgCheck").prop('checked', true);
        } else {
            $$.removeClass('checked');
            $$.next(".imgCheck").prop('checked', false);
        }
    })
});
// end other input radios


// here get id buttons and inputs
let radioPayment = document.querySelectorAll('input[name="payments"]');
let applePay = document.getElementById("applepay"),
Paypayment = document.getElementById("btnpay"),
tamara = document.getElementById("tamara"),
stc = document.getElementById("stc"),
tabby = document.getElementById("tabby");

//here codes change data
// here cards 
radioPayment[0].addEventListener("change",()=>{   
    applePay.style.display = 'none';
    tabby.style.display = 'none';
    tamara.style.display = 'none';
    stc.style.display = 'none';
    Paypayment.style.display = 'block';
});
// here apple pay
radioPayment[1].addEventListener("change",()=>{   
    applePay.style.display = 'block';
    tabby.style.display = 'none';
    tamara.style.display = 'none';
    stc.style.display = 'none';
    Paypayment.style.display = 'none';
});
// here tabby
radioPayment[2].addEventListener("change",()=>{  
    tabby.style.display = 'block';
    Paypayment.style.display = 'none';
    tamara.style.display = 'none';
    stc.style.display = 'none';
    applePay.style.display = 'none';
});
// here tamara
radioPayment[3].addEventListener("change",()=>{  
    tamara.style.display = 'block';
    tabby.style.display = 'none';
    Paypayment.style.display = 'none';
    stc.style.display = 'none';
    applePay.style.display = 'none';
});
// here stc pay
radioPayment[4].addEventListener("change",()=>{  
    tamara.style.display = 'none';
    tabby.style.display = 'none';
    Paypayment.style.display = 'none';
    stc.style.display = 'block';
    applePay.style.display = 'none';
});
