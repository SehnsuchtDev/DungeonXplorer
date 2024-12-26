import { } from './page-flip.browser.js';

// Nouveau namespace:
window.bookmanager = {}

/////////////////////////////////////////////////////////////////////

let settings = {
    width: 400,
    height: 600,
    showCover: true
}

function resizeListener() {
    let window_width;
    let window_height;
    if (window.innerWidth <= 615){
        console.log("dans if");

        window_width = window.innerHeight/1.80;
        //if (window_width > 400) window_width = 400;
        
        window_height = window.innerWidth-50;
        //if (window_height > 600) window_height = 600;
    }
    else{
        console.log("dans else");
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


/////////////////////////////////////////////////////////////////////

const htmlParentElement = document.getElementById('book');
// Faire CTRL + F5 pour voir les modifs sur la page: 

const pageFlip = new St.PageFlip(htmlParentElement, settings);

pageFlip.loadFromHTML(htmlParentElement.querySelectorAll("div"));

window.bookmanager.loadPage = async (url) => {
    const newBookPage = document.createElement("div");

    newBookPage.innerHTML = await (await (fetch(url))).text();

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

window.bookmanager.displayHeroData = () => {
    document.getElementById("hero-data").classList.remove("hidden");
}

window.bookmanager.flipNext = () => pageFlip.flipNext();




