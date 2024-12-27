const pulldownMenu = document.getElementById("pulldownmenu");
const chapter = document.getElementById("chapter");

pulldownMenu.style.visibility = "hidden";

function chapterSelection(){
    if (pulldownMenu.style.visibility === "visible") {
        pulldownMenu.style.visibility = "hidden";
    } else {
        pulldownMenu.style.visibility = "visible";
    }

}

function selectChapter(chapterElement) {
    const selectedChapter = chapterElement.innerText;

    const chapterText = document.getElementById('chapter');
    chapterText.innerText = selectedChapter;

    const pulldownMenu = document.getElementById('pulldownmenu');
    pulldownMenu.style.visibility = "hidden";
}