import {} from './page-flip.browser.js';

// Nouveau namespace:
window.bookmanager = {}


const htmlParentElement = document.getElementById('book');
const settings = {
    width: 400,
    height: 600,
    showCover: true
}
const pageFlip = new St.PageFlip(htmlParentElement, settings);

pageFlip.loadFromHTML(htmlParentElement.querySelectorAll("div"));

window.bookmanager.loadPage = async (url) => {   
    const newBookPage = document.createElement("div");
        
    newBookPage.innerHTML= await (await (fetch(url))).text();

    const bookPages = Array.from(pageFlip.getPageCollection().pagesElement);
    bookPages.push(newBookPage);

    pageFlip.updateFromHtml(bookPages);

    for(let script of newBookPage.querySelectorAll("script")){
        const newScript = document.createElement("script");
        if (script.src)
            newScript.src = script.src;
        else 
            newScript.textContent = script.textContent;
        document.head.appendChild(newScript);
        document.head.removeChild(newScript);
    }
}

window.bookmanager.loadTwoPage = async (url1,url2) => {   
    await window.bookmanager.loadPage(url1);
    await window.bookmanager.loadPage(url2);
}

window.bookmanager.loadTwoPageAndTurn = async (url1,url2) => {   
    await window.bookmanager.loadTwoPage(url1,url2);
    pageFlip.flipNext();
}

window.bookmanager.loadPageAndTurn = async (url) => {   
    await window.bookmanager.load_page(url);
    pageFlip.flipNext();
}

window.bookmanager.flipNext = () => pageFlip.flipNext();