import { } from './page-flip.browser.js';

// Nouveau namespace:
window.bookmanager = {}



const htmlParentElement = document.getElementById('book');
// Faire CTRL + F5 pour voir les modifs sur la page: 
const settings = {
    width: 400,
    height: 600,
    showCover: true
}
const pageFlip = new St.PageFlip(htmlParentElement, settings);

pageFlip.loadFromHTML(htmlParentElement.querySelectorAll("div"));

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

window.bookmanager.loadTwoPage = async (url1, url2) => {
    await window.bookmanager.loadPage(url1);
    await window.bookmanager.loadPage(url2);
}

window.bookmanager.loadTwoPageAndTurn = async (url1, url2) => {
    await window.bookmanager.loadTwoPage(url1, url2);
    pageFlip.flipNext();
}

window.bookmanager.loadPageAndTurn = async (url) => {
    await window.bookmanager.load_page(url);
    pageFlip.flipNext();
}

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


window.bookmanager.flipNext = () => pageFlip.flipNext();


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



window.bookmanager.refreshDivWithGetMethod = async(lien,elementid) => {
    try {
        const response = await fetch(lien);
        await refreshPageWithResponse(response,elementid);

    } catch(e){

    }
}

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
