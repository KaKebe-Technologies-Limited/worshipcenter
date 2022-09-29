
// show/hide faq answer
const faqs = document.querySelectorAll('.faq');

faqs.forEach(faq =>{
    faq.addEventListener('click', () =>{
        faq.classList.toggle('open');


        // icon change  
        const icon = faq.querySelector('.faq_icon i');
        if(icon.className ==='uil uil-plus'){
            icon.className = "uil uil-minus"
        }else{
            icon.className = "uil uil-plus"
        }
    })
})
