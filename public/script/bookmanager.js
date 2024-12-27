import { } from './page-flip.browser.js';

// Nouveau namespace:
window.bookmanager = {}



// Responsive

let settings = {
    width: 400,
    height: 600,
    showCover: true
}

function resizeListener() {
    let window_width;
    let window_height;
    if (window.innerWidth <= 420){
        window_width = 180;        
        window_height = 365;
    }
    else if (window.innerWidth <= 460){
        window_width =210;        
        window_height = 395;
    }
    else if (window.innerWidth <= 490){
        window_width =230;        
        window_height = 425;
    }
    else if (window.innerWidth <= 515){
        window_width =245;        
        window_height = 450;
    }
    else if (window.innerWidth <= 615){ 
        window_width = window.innerHeight/1.80;
        window_height = window.innerWidth-50;
    }
    else{
        window_width = window.innerWidth/2-15;
        if (window_width > 400) window_width = 400;
    
        window_height = window.innerHeight+55;
        if (window_height > 600) window_height = 600;
    }
    

    settings.width = window_width;
    settings.height = window_height;
}

resizeListener();

window.addEventListener("resize", resizeListener);


// Faire CTRL + F5 pour voir les modifs sur la page: 

const htmlParentElement = document.getElementById('book');

const pageFlip = new St.PageFlip(htmlParentElement, settings);

pageFlip.loadFromHTML(htmlParentElement.querySelectorAll("div"));


/**
 * load a single page into the book from a specified URL
 */
window.bookmanager.loadPage = async (url) => {
    const newBookPage = document.createElement("div");
    const html = await (await (fetch(url))).text();

    const parser = new DOMParser();
    const dom = parser.parseFromString(html, "text/html");
    const domdiv = dom.querySelectorAll(".pagediv")[0];
    const div = document.getElementById(domdiv.id);
    if(div) div.id="";


    newBookPage.innerHTML = html;

    const bookPages = Array.from(pageFlip.getPageCollection().pagesElement);
    bookPages.push(newBookPage);

    pageFlip.updateFromHtml(bookPages);

    for (let script of newBookPage.querySelectorAll("script")) {
        const newScript = document.createElement("script");
        if (script.src)
            newScript.src = script.src;
        else
            newScript.textContent = script.textContent;
        document.head.appendChild(newScript);
        document.head.removeChild(newScript);
    }
}

/**
 * load two pages into the book sequentially
 */
window.bookmanager.loadTwoPage = async (url1, url2) => {
    await window.bookmanager.loadPage(url1);
    await window.bookmanager.loadPage(url2);
}

/**
 * load two pages and automatically flip to the next page after loading
 */
window.bookmanager.loadTwoPageAndTurn = async (url1, url2) => {
    await window.bookmanager.loadTwoPage(url1, url2);
    pageFlip.flipNext();
}

/**
 * load a single page and automatically flip to the next page
 */
window.bookmanager.loadPageAndTurn = async (url) => {
    await window.bookmanager.load_page(url);
    pageFlip.flipNext();
}

/**
 * replace the current first page with a new page loaded from a URL
 */
window.bookmanager.replacePage = async (url) => {
    const newBookPage = document.createElement("div");

    newBookPage.innerHTML = await (await (fetch(url))).text();

    const bookPages = Array.from(pageFlip.getPageCollection().pagesElement);
    bookPages[0] = newBookPage;

    pageFlip.updateFromHtml(bookPages);

    for (let script of newBookPage.querySelectorAll("script")) {
        const newScript = document.createElement("script");
        if (script.src)
            newScript.src = script.src;
        else
            newScript.textContent = script.textContent;
        document.head.appendChild(newScript);
        document.head.removeChild(newScript);
    }
}

/**
 * flip to the next page in the book
 */
window.bookmanager.flipNext = () => pageFlip.flipNext();

/**
 * refresh a specific page section using a POST method
 */
window.bookmanager.refreshDivWithPostMethod = async(lien,formData,elementid) => {
    try {
        const response = await fetch(lien, {
            method: "POST",
            body: formData,
        });
        await refreshPageWithResponse(response,elementid);
    } catch(e){

    }
}

/**
 * refresh a specific page section using a GET method
 */
window.bookmanager.refreshDivWithGetMethod = async(lien,elementid) => {
    try {
        const response = await fetch(lien);
        await refreshPageWithResponse(response,elementid);

    } catch(e){

    }
}

/**
 * update the content of a div with the new response HTML
 */
async function refreshPageWithResponse(response,elementid){


    if (response.ok) {


        const html = await response.text();


        const div = document.getElementById(elementid);
        div.innerHTML="";




        const parser = new DOMParser();
        const dom = parser.parseFromString(html, "text/html");
        const domdiv = dom.querySelectorAll(".pagediv")[0];
        for(let child of domdiv.children){
            div.appendChild(child.cloneNode(true))
        }

        for (let script of dom.querySelectorAll("script")) {
            const newScript = document.createElement("script");
            if (script.src)
                newScript.src = script.src;
            else
                newScript.textContent = script.textContent;
            document.head.appendChild(newScript);
            document.head.removeChild(newScript);
        }

    }
}
