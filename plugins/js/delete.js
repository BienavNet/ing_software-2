function Delete(element)
{
    let prueba = document.querySelector('#delete');
    let id = element.parentElement.parentElement.children[0].innerText;


    prueba.attributes[0].value+=id;


}