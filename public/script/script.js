import {} from './page-flip.browser.js';

const htmlParentElement = document.getElementById('book');
const settings = {
    width: 400, // required parameter - base page width
    height: 600,  // required parameter - base page height
    showCover: true
}
const pageFlip = new St.PageFlip(htmlParentElement, settings);

//const pageFlip = new PageFlip(htmlParentElement, settings);
pageFlip.loadFromHTML(document.querySelectorAll('.my-page'));


function manageNextButtons(context){
    const nextButtons = context.querySelectorAll('.btn-next')
    nextButtons.forEach(button => {
        button.getElementProperty
        button.addEventListener("click", () => {
            pageFlip.flipNext();} );
    });
}

function managePrevButtons(context){
    const prevButtons = context.querySelectorAll('.btn-prev')
    prevButtons.forEach(button => {
        button.addEventListener("click", () => {
            pageFlip.flipPrev();} );
    });
}

function manageAttackButtons(context){
    const attackButtons = context.querySelectorAll('.btn-attack')
    attackButtons.forEach (button => {
        button.addEventListener("click", async () => {
            const page1 = document.getElementById("next-page1");
            const response1 = await fetch("./test_chapter1.php");
            page1.innerHTML = await response1.text();
            
            const page2 = document.getElementById("next-page2");
            const response2 = await fetch("./test_chapter2.php");
            page2.innerHTML = await response2.text();

            manageNextButtons(page1);
            manageNextButtons(page2);
            managePrevButtons(page1);
            managePrevButtons(page2);
            pageFlip.flipNext();
        } );
    });
    
}

manageNextButtons(document);
managePrevButtons(document);
manageAttackButtons(document);





                    


