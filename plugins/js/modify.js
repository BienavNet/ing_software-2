

function Modify(element)
{

    
    let modal = document.querySelector('#editing-modal');
    let modal_id = document.querySelector('#product_id');
    let modal_name = document.querySelector('#product_name')
    let modal_desc = document.querySelector('#product_description');
    let modal_price = document.querySelector('#product_price');
    let modal_amount = document.querySelector('#product_amount');
    //let modal_img = document.querySelector('#first_photo');

    modal_id.value = element.parentElement.parentElement.children[0].innerText;
    modal_name.value = element.parentElement.parentElement.children[1].innerText;
    modal_desc.innerText = element.parentElement.parentElement.children[2].innerText;
    modal_price.value = element.parentElement.parentElement.children[3].innerText;
    modal_amount.value = element.parentElement.parentElement.children[4].innerText;
    //modal_img.value = element.parentElement.parentElement.children.firstChild.attibutes[0].value;




}